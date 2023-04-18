<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="description" content="VTNN - KHAI MAI">
    <meta name="keywords" content="VTNN - KHAI MAI">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/client/img/LogoVTNN.jpg"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ $title }}</title> --}}

    <!-- FontAwesome JS-->
    <script defer src="/admins/assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="/admins/assets/css/portal.css">

</head> 

<body class="app app-signup p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Đăng ký tài khoản</h2>					
	
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" method="POST" action="{{ route('register') }}">         
							@csrf
							<div class="email mb-3">
								<label class="sr-only" for="signup-v">Họ và tên:</label>
								<input id="signup-name" name="name" type="text" class="form-control signup-name" :value="old('name')" required autocomplete="name">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Email</label>
								<input id="signup-email" name="email" type="email" class="form-control signup-email" :value="old('email')" required>
							</div>
							<div class="password mb-3">
								<label class="sr-only" for="signup-password">Mật khẩu</label>
								<input id="signup-password" name="password" type="password" class="form-control signup-password" required autocomplete="new-password">
							</div>
							<div class="password mb-3">
								<label class="sr-only" for="signup-password">Xác nhận mật khẩu</label>
								<input id="signup-password" name="password_confirmation" type="password" class="form-control signup-password" required autocomplete="new-password">
							</div>
							<div class="extra mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="RememberPassword" name="remember">
									<label class="form-check-label" for="RememberPassword">
									Nhớ mật khẩu
									</label>
								</div>
							</div><!--//extra-->
							
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Đăng ký</button>
							</div>
						</form><!--//auth-form-->
						
						<div class="auth-option text-center pt-5">Bạn đã có tài khoản? <a class="text-link" href="{{ route('login') }}" >Đăng nhập tại đây</a></div>
					</div><!--//auth-form-container-->	
					
					
				    
			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
				         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			        <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
				       
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
					    <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    </div><!--//row-->
</body>
</html> 
