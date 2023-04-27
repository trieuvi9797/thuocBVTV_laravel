<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="description" content="VTNN - KHAI MAI">
    <meta name="keywords" content="VTNN - KHAI MAI">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/client/Logo.jpg"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ $title }}</title> --}}

    <!-- FontAwesome JS-->
    <script defer src="/admins/assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="/admins/assets/css/portal.css">

</head> 

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="/login"><img class="logo-icon me-2" src="/admins/assets/images/logo.jpg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Đăng nhập</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="post" action="{{ route('login') }}">  
							@csrf       
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" name="email" type="email" class="form-control signin-email" :value="old('email')" placeholder="Email" required autofocus>
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Mật khẩu</label>
								<input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Mật khẩu" required autocomplete="current-password">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<label class="form-check-label" for="RememberPassword">
												Nhớ mật khẩu
											</label>
											<input class="form-check-input" type="checkbox" name="remember" id="RememberPassword" value="">
										</div>
									</div><!--//col-6-->
									<div class="col-6">
										<div class="forgot-password text-end">
											<a href="{{ route('user.forgotPass') }}">Quên mật khẩu?</a>
										</div>
									</div><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Đăng nhập</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5">Đăng ký tài khoản <a class="text-link" href="{{ route('register') }}" >tại đây</a>.</div>
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		  </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

