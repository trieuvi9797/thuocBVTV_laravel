@extends('admin.layouts.app')

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Tạo tài khoản</h1>
            </div><!--//col-auto-->
        </div><!--//row-->
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            @include('admin.layouts.alert')
            
            <div class="col-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form" method="POST" action="{{ route('register.admin') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên người dùng</label>
                                <input type="text" name="name" class="form-control" id="name" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" id="password" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="" required>
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Lưu</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div>
        </div><!--//row-->    
    </div><!--//tab-content-->
</div><!--//container-fluid-->
 
@endsection