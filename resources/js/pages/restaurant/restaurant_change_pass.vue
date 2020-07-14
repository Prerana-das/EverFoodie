<template>
    <div>
        <div class="res_profile_bg">
            <!-- ================  ================ -->
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <div class="dashboard-user" id="desh-user">
                           <Form v-model="formItem">
                                <label>Old Password</label>
                                <Input class="_mar_b20" type="password" placeholder="Old Password" v-model="formItem.current_password"></Input>
                                <label>New Password</label>
                                <Input class="_mar_b20" type="password" placeholder="New Password" v-model="formItem.new_password"></Input>
                                <label>Confirm Password</label>
                                <Input class="_mar_b30" type="password" placeholder="Confirm Password" v-model="formItem.confirm_password"></Input>

                                <button @click="changePassword" class="_btn _btn_info " >Update Password</button>
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
                formItem: {
					current_password:'',
					new_password:'',
					confirm_password:'',
                }
        
				 
			}
        },
        methods: {
			async restaurant_user(){
				const res = await this.callApi('get',`restaurant_user?res_id=${this.formItem.id}`)
				if(res.status == 200){
					this.user = res.data
				}
			},

			 async changePassword(){
                if(this.formItem.current_password.trim()=='' || this.formItem.new_password.trim()=='' ||  this.formItem.confirm_password.trim()=='' ){
                    this.i("Password con't be empty!");
                        return;
                     }
                const res = await this.callApi('post','changePassword',this.formItem)
                
                if(res.status===200){
                    this.s('Password changed successfully!')  
                    // this.$router.push('/logout') 
                     window.location = '/logout'
                    // this.isLoading = false
                }
                 else{
                    this.e(res.data.msg)
                    // this.isLoading = false
                }
			}

		

		},
		
		 async created(){
			this.restaurant_user();
	
    	}
    }
</script>




