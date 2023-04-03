@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="col-auto">
        <h1 class="app-page-title">Sửa thông tin trang Web</h1>
    </div>
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="inputIMG" class="form-label">Hình ảnh Logo (262x50)</label>
                            <input type="file" name="logo"  id="inputIMG" class="form-control">
                            @error('logo')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3" id="image_show">            
                            <img src="{{ $infoPage->phone }}" id="show-image" alt="" width="302px" height="86px" style="transform: translateY(10%)">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="number" name="phone" class="form-control" id="phone" value="{{ $infoPage->phone }}" required>
                    @error('phone')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <textarea name="address" class="form-control" id="address" cols="30" rows="30" required>{{ $infoPage->address }}</textarea>
                    @error('address')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ $infoPage->email }}" required>
                    @error('email')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="contentFirst" class="form-label">Nội dung đầu trang</label>
                    <input type="text" name="contentFirst" class="form-control" id="contentFirst" value="{{ $infoPage->contentFirst }}" required>
                    @error('contentFirst')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="facebook" class="form-label">Link facebook</label>
                    <input type="text" name="facebook" class="form-control" id="facebook" value="{{ $infoPage->facebook }}" required>
                    @error('facebook')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="instagram" class="form-label">Link instagram</label>
                    <input type="text" name="instagram" class="form-control" id="instagram" value="{{ $infoPage->instagram }}" required>
                    @error('instagram')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="twitter" class="form-label">Link twitter</label>
                    <input type="text" name="twitter" class="form-control" id="twitter" value="{{ $infoPage->twitter }}" required>
                    @error('twitter')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="telegram" class="form-label">Link telegram</label>
                    <input type="text" name="telegram" class="form-control" id="telegram" value="{{ $infoPage->telegram }}" required>
                    @error('telegram')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
            <button type="submit" class="btn app-btn-primary" >Lưu</button>        
            </form>
        </div><!--//app-card-body-->
    </div>
</div><!--//row-->

@endsection