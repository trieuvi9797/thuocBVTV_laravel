@extends('admin.layouts.app')

@section('content')          
            
<div class="app-content pt-3 p-md-3 p-lg-4">
    <h1 class="app-page-title">Cập nhật sliders</h1>
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tiêu đề</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $slider->name }}" required>
                            @error('name')
                                <span class="text-danger"> </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="upload" class="form-label">Hình ảnh</label>
                            <input type="file" name="image"  id="inputIMG" class="form-control" value="{{ $slider->image }}">
                            @error('image')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="url" class="form-label">Link: </label>
                            <input type="text" name="url" class="form-control" id="url" value="{{ $slider->url }}" required>
                            @error('url')
                                <span class="text-danger"> </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sort_by" class="form-label">Sắp xếp: </label>
                            <input type="number" name="sort_by" class="form-control" id="sort_by" value="{{ $slider->sort_by }}" required>
                            @error('sort_by')
                                <span class="text-danger"> </span>
                            @enderror
                        </div>
                    </div>
                </div>             
                <div class="mb-3" id="image_show">            
                    <img src="{{ $slider->image }}" id="show-image" alt="" width="150px" height="150px">
                </div>
                <button type="submit" class="btn app-btn-primary" >Lưu</button>    
            </form>
        </div>
    </div>
</div><!--//app-content-->

@endsection