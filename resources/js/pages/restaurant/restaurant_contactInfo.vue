<template>
    <div>
        <div class="res_profile_bg">
            <!-- ================  ================ -->
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <div class="dashboard-user" id="desh-user">
                        <Form ref="formCustom" :label-width="80">      
                            <FormItem label="Address">
                                <Input type="text"  v-model="formItem.address"></Input>
                            </FormItem>
                            <FormItem label="Phone">
                                <Input type="number" number  v-model="formItem.phone"></Input>
                            </FormItem>
                            <FormItem>
                                <Button type="primary" @click="updateUser">Save Change</Button>
                            </FormItem>
                        </Form>

                    </div>
                    </div>
                </div>
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
                    address:authUser.address,
					phone:authUser.phone,
                    id:authUser.id
                },
				 
			}
        },
        methods: {
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
					this.s("Updated successfully!")
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




