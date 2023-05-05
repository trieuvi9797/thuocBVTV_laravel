@extends('admin.layouts.app')

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Đổi mật khẩu</h1>
            </div><!--//col-auto-->
        </div><!--//row-->
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            
            <div class="col-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        
					<div class="auth-intro mb-4 text-center">Nhập địa chỉ email của bạn dưới đây. Chúng tôi sẽ gửi email cho bạn một liên kết đến một trang nơi bạn có thể dễ dàng tạo mật khẩu mới.</div>
	
					<div class="auth-form-container text-left">
						@include('admin.layouts.alert')
						
						<form class="auth-form resetpass-form" action="{{ route('postReset.pw.Admin') }}" method="POST"> 
							@csrf               
							<div class="email mb-3">
								<label class="sr-only" for="reg-email">Email</label>
								<input id="reg-email" name="email" type="email" class="form-control login-email" placeholder="Nhập Email của bạn..." required="required">
							</div>
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Gửi email xác nhận</button>
							</div>
						</form>
						

                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div>
        </div><!--//row-->    
    </div><!--//tab-content-->
</div><!--//container-fluid-->
 
@endsection