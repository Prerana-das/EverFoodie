<template>
	<div>
		<div class="content">
			<div class="container">

				<h1>Change Password</h1>
				<div class="row">
					<div class="col-md-6">
						<Form v-model="formItem">
							<label>Old Password</label>
							<Input type="password" placeholder="Old Password" v-model="formItem.current_password"></Input>
							<label>New Password</label>
							<Input type="password" placeholder="New Password" v-model="formItem.new_password"></Input>
							<label>Confirm Password</label>
							<Input type="password" placeholder="Confirm Password" v-model="formItem.confirm_password"></Input>

							<button @click="changePassword" class="_btn _btn_info " >Update Password</button>
						</Form>

		
					</div>
				</div>
			</div>
		</div>
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


			 async changePassword(){
                
                if(this.formItem.current_password.trim()=='' || this.formItem.new_password.trim()=='' ||  this.formItem.confirm_password.trim()=='' ){
                    
                    this.i("Password con't be empty!");
                    return;
                }
                const res = await this.callApi('post','changePassword',this.formItem)
                
                if(res.status===200){
                    this.s('Password changed successfully!')  
                    this.$router.push('/admin') 
                    // this.isLoading = false
                }
                 else{
                    this.e(res.data.msg)
                    // this.isLoading = false
                }
               
                
			}
			

	
		

		},
		
		 async created(){
			
    	}
    }
</script>




			