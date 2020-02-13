<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>EverFoodie</title>
        <!-- Fonts -->
        <!-- Fontawesome css -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,400,500,700,800,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />

        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/common.css')}}" media="all" />

        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" media="all" />
     

    </head>
    <body>
    
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
						<button class="sign_up_btn"> <a href="/register"> Sign Up</a></button>
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
					<form method="POST" action="/app/login">
                        @csrf
                        @if (session('message'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
						<div class="login_group">
							<label>Email or username</label>
							<input name="email" type="email" placeholder="Type your email or username">
						</div>
						<div class="login_group">
							<label>Password</label>
							<a href="forgot_password.html" class="forgot_pass">Forgot Password?</a>
							<input name="password" type="password" placeholder="Type your password">
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

		<script>
            (function () {
               window.Laravel = {
                   csrfToken: '{{ csrf_token() }}'
               };
               @if(Auth::check())
                 window.authUser={!! Auth::user() !!}
                 @else
                   window.authUser=false
                   
                 @endif
            })();
            </script>

    </body>
</html>
