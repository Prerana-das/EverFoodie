<template>
    <div>

    	<!-- ================== Login Area Start ================== -->
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
						<button class="sign_up_btn" onclick="location.href='register.html'">Sign Up</button>
					</div>

					<div class="right_arrow_btn">
					<img src="assets/img/right_arrow.png" alt="">
				</div>
				</div>
				<div class="login_form_area main_login">
					<div class="login_title_area">
						<h3 class="login_title">Log in</h3>
						<p class="login_sub">Log in your email or username</p>
					</div>

					<!-- ==================Form ============== -->
					<form @submit.prevent="login">
						<div class="login_group">
							<label>Email or username</label>
							<input v-model="formItem.email" type="email" placeholder="Type your email or username">
						</div>
						<div class="login_group">
							<label>Password</label>
							<a href="forgot_password.html" class="forgot_pass">Forgot Password?</a>
							<input v-model="formItem.password" type="password" placeholder="Type your password">
						</div>
						<div class="login_group _mar_t10">
							<input type="submit" value="Log in">
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
			<!-- Left End -->
			<!-- Right Start -->
			<div class="login_right">
				<div class="login_right_cont_area">
					<p class="login_right_cont">Order food online in a few clicks from your nearest restaurants in Bangladesh.Order food online from you loved restaurants and enjoy at home!!</p>
				</div>
			</div>
			<!-- Right End -->	
		</div>
		<!-- ================== Login Area Start ================== -->

    </div>
 </template>

<script>
    export default {
        data(){
            return{
                formItem:{
					email:'',
                    password:'',
                } 
            }
        },
       methods:{
            async login(){
               if(this.formItem.email=="" || this.formItem.password==''){
                    this.i("All frields are required!");
                    return;
                }
                const res = await this.callApi('post',"login",this.formItem)
                if(res.status==200){
                    this.s("login successfull !")
                      // window.location = '/'
                    this.$router.push('/')
                  
                }
                else{
                    this.swr();
                }
            },
        },
         created(){
            console.log(window.authUser)
            
        }
    }
</script>