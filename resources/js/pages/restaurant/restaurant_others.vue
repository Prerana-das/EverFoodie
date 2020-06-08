<template>
    <div>
        <div class="res_profile_bg">
            <!-- ================  ================ -->
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <div class="dashboard-user" id="desh-user">
                            <h5>Average Review: <span>{{ user[0].avgreview.avgRating}}</span></h5>
                            <Form ref="formCustom" :label-width="80">      
                                <FormItem label="Description">
                                    <Input type="text"  v-model="formItem.description"></Input>
                                </FormItem>
                                <FormItem label="Average Cost">
                                    <Input type="text" number  v-model="formItem.cost"></Input>
                                </FormItem>
                                <FormItem label="Delivery Time">
                                    <Input type="text" number  v-model="formItem.delivery_time"></Input>
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
					this.s("User Updated  !")
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




