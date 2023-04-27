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
<body class="app app-reset-password p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="/admins/assets/images/logo.jpg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Đặt lại mật khẩu</h2>

					<div class="auth-intro mb-4 text-center">Nhập địa chỉ email của bạn dưới đây. Chúng tôi sẽ gửi email cho bạn một liên kết đến một trang nơi bạn có thể dễ dàng tạo mật khẩu mới.</div>
	
					<div class="auth-form-container text-left">
						
						<form class="auth-form resetpass-form">                
							<div class="email mb-3">
								<label class="sr-only" for="reg-email">Email</label>
								<input id="reg-email" name="reg-email" type="email" class="form-control login-email" placeholder="Nhập Email của bạn..." required="required">
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Gửi email xác nhận</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5"><a class="app-link" href="{{ route('login') }}" >Đăng nhập</a> <span class="px-2">|</span> <a class="app-link" href="{{ route('register') }}" >Đăng ký</a></div>
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

