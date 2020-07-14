<template>
    <div>
        <div class="res_profile_bg">
            <!-- ================  ================ -->
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <div class="dashboard-user" id="desh-user">
                            <Form ref="formCustom" :label-width="80">      
                                <FormItem label="Description">
                                    <!-- <Input type="text"  v-model="formItem.description"></Input> -->
                                    <Input v-model="formItem.description" type="textarea" :autosize="{minRows: 3,maxRows: 8}"></Input>
                                </FormItem>
                                <FormItem label="Average Cost">
                                    <Input type="number" v-model="formItem.cost"></Input>
                                </FormItem>
                                <FormItem label="Delivery Time">
                                    <Input type="number"  v-model="formItem.delivery_time"></Input>
                                </FormItem>
                                <FormItem label="Total Discount">
                                    <Input type="number" v-model="formItem.res_discount"></Input>
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
					cost:authUser.cost,
                    description:authUser.description,
                    delivery_time:authUser.delivery_time,
                    res_discount:authUser.res_discount,
                    id:authUser.id
                },
                user:[]
        
				 
			}
        },
        methods: {
			async restaurant_user(){
				const res = await this.callApi('get',`restaurant_user?res_id=${this.formItem.id}`)
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
				}
				else{
					this.swr();
				}
			},

		

		},
		
		 async created(){
			this.restaurant_user();
	
    	}
    }
</script>




