@extends('admin.layouts.app')
@section('title', 'Cập nhật sản phẩm')

@section('content')
 
<div class="app-content pt-3 p-md-3 p-lg-4">
    <h1 class="app-page-title">Cập nhật sản phẩm</h1>
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form action="" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}" required>
                            @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="upload" class="form-label">Hình ảnh</label>
                            <input type="file" name="image"  id="inputIMG" class="form-control" value="{{ $product->image }}">
                            @error('image')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3" id="image_show">            
                            <img src="{{ $product->image }}" id="show-image" alt="" width="150px" height="150px">
                        </div>
                        
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Danh mục:</label>
                            <select name="category_id" class="form-control">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($category as $item)
                                    <option value="{{ $item->id }}" {{ $product->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>        
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá:</label>
                            <input type="number" name="price" class="form-control" id="price" min="1000" value="{{ $product->price }}" required>
                            @error('price')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>                         
                        <div class="mb-3">
                            <label for="sale" class="form-label">Khuyến mãi (%):</label>
                            <input type="number" name="sale" class="form-control" id="sale" min="0" max="100" value="{{ $product->sale }}" required >
                            
                        </div>  
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng:</label>
                            <input type="number" name="quantity" class="form-control" id="quantity" min="0" value="{{ $product->quantity }}"  required>
                            
                        </div>  
                    </div>
                </div>                    
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả:</label>
                    <textarea name="description" id="description" rows="30" cols="80" class="form-control">{{ $product->description }}</textarea>
                    @error('description')
                        <span class="text-dange r"> {{ $message }}</span>
                    @enderror 
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