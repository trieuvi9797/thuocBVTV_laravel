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
                        <form class="settings-form" method="POST" action="{{ route('postReset.pw.Admin') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="password_old" class="form-label">Mật khẩu cũ</label>
                                <input type="password" name="password_old" class="form-control" id="password_old" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_new" class="form-label">Mật khẩu mới</label>
                                <input type="password" name="password_new" class="form-control" id="password_new" value="" required>
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