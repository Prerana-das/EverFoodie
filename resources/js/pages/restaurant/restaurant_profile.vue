<template>
    <div>
    <div class="res_profile_bg">
        <!-- ================  ================ -->
        <!-- DESHBOARD USER PROFILE START  -->
        <div class="container">
             <div class="row justify-content-end">
                <div class="col-md-8">
                    <div class="dashboard-user" id="desh-user">
                        <Form ref="formCustom" :label-width="80" class="res_user_pro_img">
                            <FormItem label="Image">
                                <div class="_3login_input_group">		
                                    <template>	
                                        <Upload
                                        ref="upload"
                                        type="drag"
                                        name="image"
                                        :with-credentials="true"
                                        :data="{id:1}"
                                        :on-success="handleSuccessedit"
                                        :format="['jpg','jpeg','png']"
                                        :max-size="2048"
                                        action="/app/upload">				
                                        <div style="padding: 20px 0">
                                            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                                            <p>Click or drag files here to upload</p>
                                        </div>
                                        </Upload>
                                        <Card  span="10" offset="1">
                                            <div style="text-align:center">
                                                <img  style="width: 100%;height: auto;" v-if="formItem.image" :src="formItem.image" >
                                            </div>
                                        </Card>
                                    </template> 
                                </div>
                             </FormItem>      
                            <FormItem label="Name">
                                <Input type="text"  v-model="formItem.name"></Input>
                            </FormItem>
                            <FormItem label="Email">
                                <Input type="email" number  v-model="formItem.email"></Input>
                            </FormItem>
                            <FormItem>
                                <Button type="primary" @click="updateUser">Save Change</Button>
                            </FormItem>
                        </Form>

                    </div>
                </div>
            </div>
            <!-- DESHBOARD USER PROFILE END  -->
        </div>
        </div>
        <!-- ================  ================ -->
    </div>
</template>

<script>
    export default {
        data () {
            return {
                formItem:{
                    name:authUser.name,
                    email:authUser.email,
                    image:authUser.image,
                    id:authUser.id
                },
				 
			}
        },
        methods: {
             handleSuccessedit(res, file){
				if (res) {
				this.formItem.image = res
				}
			},
			async all_user(){
				const res = await this.callApi('get','all_user')
				if(res.status == 200){
					this.user = res.data
				}
			},

			async updateUser(){
				//if(this.user_name == '') return this.i("User Type is empty!");
				const res = await this.callApi('post','edit_user',this.formItem)
				if(res.status == 200){
					this.user[this.editIndex] = _.clone(this.formItem) 
					this.s("Updated successfully !")
					this.$store.commit('setAuthuser',{
                        image: this.formItem.image
                        });
				}
				else{
					this.swr();
				}
			},

	
		},
		
		 async created(){
			this.all_user();
	
    	}
    }
</script>


