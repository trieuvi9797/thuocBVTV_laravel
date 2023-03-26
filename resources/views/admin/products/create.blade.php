@extends('admin.layouts.app')
@section('title', 'Thêm sản phẩm')

@section('content')          
            
<div class="app-content pt-3 p-md-3 p-lg-4">
    <h1 class="app-page-title">Thêm sản phẩm</h1>
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="upload" class="form-label">Hình ảnh</label>
                            <input type="file" {{-- accept="image/*" --}}name="image"  id="upload" class="form-control" >
                            <div class="mb-3" id="image_show">            
                            
                            </div>
                            <input type="hidden" name="image" id="image">
                            @error('image')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Danh mục:</label>
                            <select name="category_id" class="form-control">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>        
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá:</label>
                            <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" required>
                            @error('price')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>                         
                        <div class="mb-3">
                            <label for="sale" class="form-label">Khuyến mãi:</label>
                            <input type="text" name="sale" class="form-control" id="sale" value="{{ old('sale') }}" required>
                            @error('sale')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>  
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng:</label>
                            <input type="text" name="quantity" class="form-control" id="quantity" value="{{ old('quantity') }}" required>
                            {{-- @error('quantity')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror --}}
                        </div>  
                    </div>
                </div>                   
                         
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả:</label>
                        <textarea name="description" id="description" rows="30" cols="80" class="form-control">{{ old('description') }}</textarea>
                        {{-- @error('description')
                            <span class="text-dange r"> {{ $message }}</span>
                        @enderror --}}
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