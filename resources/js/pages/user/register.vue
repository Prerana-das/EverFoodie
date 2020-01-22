<template>
    <div>

    	<!-- ================== Register Area Start ================== -->
		<div class="login_area  _padd_tb60 _padd_t100">
			<!-- Left Start -->
			<div class="login_left">
				<div class="login_left_top">
					<div class="login_left_top_logo">
						<a href="#">
							<img src="assets/img/login_logo.jpg" alt="">
						</a>
					</div>
					<div class="login_left_top_btn">
						<button class="sign_up_btn" onclick="location.href='login.html'">Sign In</button>
					</div>

					<div class="right_arrow_btn">
					<img src="assets/img/right_arrow.png" alt="">
				</div>
				</div>
				<div class="login_form_area">
					<div class="login_title_area">
						<h3 class="login_title">Sign Up For Free</h3>
						<p class="login_sub">Log in your email or username</p>
					</div>

					<!-- ==================Form ============== -->
					<form @submit.prevent="registation">
						<div class="login_group">
							<label>Your Username</label>
							<input v-model="formItem.name" type="text" placeholder="Type your username">
						</div>
						<div class="login_group">
							<label>Your Email</label>
							<input v-model="formItem.email" type="email" placeholder="Type your email">
						</div>
						<div class="login_group">
							<label>Your Address</label>
							<input v-model="formItem.address" type="text" placeholder="Type your Address">
						</div>
						<div class="login_group">
							<label>Your Phone Number</label>
							<input v-model="formItem.phone" type="number" placeholder="Type your number">
						</div>
						<div class="login_group">
							<label>Password</label>
							<input v-model="formItem.password" type="password" placeholder="Type your password">
						</div>
						<div class="login_group">
							<label>Confirm Password</label>
							<input v-model="formItem.password_confirmation" type="password" placeholder="Type your password again">
						</div>
						<div class="login_group _mar_t10">
							<input type="submit" value="Sign up for free">
						</div> 
					</form>
					<!-- ==================Form ============== -->

					<div class="login_social_area">
						<h3 class="login_social_title">Logged In with:</h3>
						<div class="login_social">
							<div class="social_item">
								<p>
									<span class="social_icon">
										<i class="fab fa-facebook-square"></i> 
									</span>
									Facebook
								</p>
							</div>
							<div class="social_item">
								<p>
									<span class="social_icon">
										<i class="fab fa-google"></i> 
									</span>
									Google
								</p>
							</div>
							<div class="social_item">
								<p>
									<span class="social_icon">
										<i class="fab fa-twitter"></i> 
									</span>
									Twitter
								</p>
							</div>
							<div class="social_item">
								<p>
									<span class="social_icon">
										<i class="fas fa-cloud"></i> 
									</span>
									Dummy
								</p>
							</div>
						</div>
						<p class="login_social_cont">Home food delivery systems</p>
					</div>
				</div>
			</div>
			<!-- Right Start -->
			<div class="login_right">
				<div class="login_right_cont_area">
					<p class="login_right_cont">Order food online in a few clicks from your nearest restaurants in Bangladesh.Order food online from you loved restaurants and enjoy at home!!</p>
				</div>
			</div>
			<!-- Right End -->	
		</div>
		<!-- ================== Register Area End ================== -->

    </div>
</template>



<script>
    export default {
        data(){
            return{
                formItem:{
                    name:'',
					email:'',
					address:'',
					phone:'',
                    password:'',
                    password_confirmation:'',
                } 
            }
        },
        methods:{
            async registation(){
            
                if(this.formItem.name=='' ) return this.i(" Name is required!");
				if(this.formItem.email=='' ) return this.i("Email is required!");
				if(this.formItem.address=='' ) return this.i("Address is required!");
				if(this.formItem.phone=='' ) return this.i("Phone Number is required!");
                if(this.formItem.password=='' ) return this.i("Password is required!");
                if(this.formItem.password_confirmation=='' ) return this.i("Password Confirmation is required!");
                if(this.password != this.password_confirmation){
                    this.i("The password does not match.");
                    return;
                }
                const res = await this.callApi('post',"registration",this.formItem)
                if(res.status==201){
                    this.s("registration Successfull ! Please Login.");
                    this.$router.push('/')
                  
                }
                else if(res.status==422){
                    if(res.data.errors.email){
                        this.errorData.email = res.data.errors.email 
                        for(let e of res.data.errors.email  )
                            this.e(e);
                    }  
                    if(res.data.errors.password)
                    {
                        this.errorData.password = res.data.errors.password 
                        for(let e of res.data.errors.password  )
                            this.e(e);
                    }  
                    
                    if(res.data.errors.name)
                    {
                        this.errorData.name = res.data.errors.name 
                        for(let e of res.data.errors.name  )
                            this.e(e);
					}   
					 if(res.data.errors.address)
                    {
                        this.errorData.address = res.data.errors.address 
                        for(let e of res.data.errors.address  )
                            this.e(e);
                    }   
                    if(res.data.errors.phone)
                    {
                        this.errorData.phone = res.data.errors.phone 
                        for(let e of res.data.errors.phone  )
                            this.e(e);
                    }    
                }
                else{
                    this.swr();
                }
            },
        }
    }
</script>


