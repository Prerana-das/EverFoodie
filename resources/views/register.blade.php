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
						<button class="sign_up_btn"> <a href="/login"> Sign In </a></button>
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
					<form  method="POST" action="/app/registration">
                    @csrf
                        @if (session('message'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

						<div class="login_group">
							<label>Your Username</label>
							<input name="name" type="text" placeholder="Type your username">
						</div>
						<div class="login_group">
							<label>Your Email</label>
							<input name="email" type="email" placeholder="Type your email">
						</div>
						<div class="login_group">
							<label>Your Address</label>
							<input name="address" type="text" placeholder="Type your Address">
						</div>
						<div class="login_group">
							<label>Your Phone Number</label>
							<input name="phone" type="number" placeholder="Type your number">
						</div>
						<div class="login_group">
							<label>Password</label>
							<input name="password" type="password" placeholder="Type your password">
						</div>
						<div class="login_group">
							<label>Confirm Password</label>
							<input name="password_confirmation" type="password" placeholder="Type your password again">
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
