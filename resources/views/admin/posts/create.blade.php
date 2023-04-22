@extends('admin.layouts.app')
@section('content')          
            
<div class="app-content pt-3 p-md-3 p-lg-4">
    <h1 class="app-page-title">Thêm bài viết - tin tức</h1>
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-10">
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề:</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="upload" class="form-label">Hình ảnh</label>
                            <input type="file" name="image"  id="inputIMG" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="mb-3" id="image_show">            
                            <img src="" id="show-image" alt="" width="150px" height="150px">
                        </div>
                    </div>
                </div>                   
                <div class="mb-3">
                    <label for="author" class="form-label">Tác giả:</label>
                    <input type="tetx" name="author" class="form-control" id="author" min="1000" value="{{ old('author') }}" required>
                </div>                         
                <div class="mb-3">
                    <label for="description_short" class="form-label">Mô tả ngắn:</label>
                    <textarea name="description_short" id="description_short" rows="15" cols="80" class="form-control" required>{{ old('description_short') }}</textarea>
                </div>     
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả:</label>
                        <textarea name="description" id="description" rows="30" cols="80" class="form-control" required>{{ old('description') }}</textarea>
                    </div>   
                    <button type="submit" class="btn app-btn-primary" >Lưu</button>
            </form>
        </div><!--//app-card-->
    </div>
</div><!--//app-content-->
@endsection
@section('footer')
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection