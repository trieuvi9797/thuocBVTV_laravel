{{-- @include('admin.layouts.head') --}}
<!DOCTYPE html>
<html lang="en"> 
<head>
<title>{{ $title }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Admin Dashboard VTNN Khai Mai">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="{{ asset('/LogoVTNN.jpg') }}"> 

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('/admins/assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('/admins/assets/css/portal.css') }}">

    <!-- alert Jquery-->  
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
    <!-- App CKeditor -->  
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

{{-- <script src="{{ asset('admin/base.js') }}"></script> --}}

</head>

<body class="app app-login p-0">  
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
    		<div class="row g-0 app-auth-wrappfcontent-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4">
						<a class="app-logo" href="#">
							<img class="logo-icon me-2" src="{{ asset('/Logo-VTNN.png') }}" alt="logo">
						</a>
					</div>
					<h2 class="auth-heading text-center mb-5">Đăng nhập</h2>
			        <div class="auth-form-container text-start">	
                @include('admin.layouts.alert')
                        <form class="auth-form login-form" action="/admin/users/login/store" method="POST">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" name="signin-email" type="email" class="form-control signin-email" placeholder="Email address" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Mật khẩu</label>
								<input id="signin-password" name="signin-password" type="password" class="form-control signin-password" placeholder="Password" required="required">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" name="remember" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Nhớ mật khẩu
											</label>
										</div>
									</div><!--//col-6-->
									<div class="col-6">
										<div class="forgot-password text-end">
											<a href="#">Quên mật khẩu?</a>
										</div>
									</div><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Đăng nhập</button>
							</div>
                            @csrf
						</form>
						<div class="auth-option text-center pt-5">Đăng ký <a class="text-link" href="signup.html" >Tại đây</a>.</div>
					</div><!--//auth-form-container-->	
			    </div><!--//auth-body-->
			</div><!--//flex-column-->   
		</div>
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder">
			</div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				
			</div>
		</div><!--//auth-background-overlay-->
	</div><!--//auth-background-col-->
</div>
</body>
</html> 

