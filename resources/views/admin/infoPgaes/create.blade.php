@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="col-auto">
        <h1 class="app-page-title">Thêm thông tin trang Web</h1>
    </div>
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="upload" class="form-label">Hình ảnh Logo (262x50)</label>
                            <input type="file" name="image"  id="inputIMG" class="form-control">
                            @error('image')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3" id="image_show">            
                            <img src="" id="show-image" alt="" width="262px" height="50px" style="transform: translateY(55%)">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="number" name="phone" class="form-control" id="phone" value="" required>
                    @error('phone')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <textarea name="address" class="form-control" id="address" cols="30" rows="10" required></textarea>
                    @error('address')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="" required>
                    @error('email')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="contentFirst" class="form-label">Nội dung đầu trang</label>
                    <input type="text" name="contentFirst" class="form-control" id="contentFirst" value="" required>
                    @error('contentFirst')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="facebook" class="form-label">Link facebook</label>
                    <input type="text" name="facebook" class="form-control" id="facebook" value="" required>
                    @error('facebook')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="instagram" class="form-label">Link instagram</label>
                    <input type="text" name="instagram" class="form-control" id="instagram" value="" required>
                    @error('instagram')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="twitter" class="form-label">Link twitter</label>
                    <input type="text" name="twitter" class="form-control" id="twitter" value="" required>
                    @error('twitter')
                        <span class="text-danger"> </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="telegram" class="form-label">Link telegram</label>
                    <input type="text" name="telegram" class="form-control" id="telegram" value="" required>
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