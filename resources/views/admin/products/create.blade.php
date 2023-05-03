@extends('admin.layouts.app')
@section('content')          
            
<div class="app-content pt-3 p-md-3 p-lg-4">
    <h1 class="app-page-title">Thêm sản phẩm</h1>
    <div class="app-card app-card-settings shadow-sm p-4">
        @include('admin.layouts.alert')

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
                            <input type="file" name="image"  id="inputIMG" class="form-control">
                            @error('image')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3" id="image_show">            
                            <img src="" id="show-image" alt="" width="150px" height="150px">
                        </div>
                        
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Danh mục:</label>
                            <select name="category_id" class="form-control">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($childCategories as $item)
                                    <option value="">{{ $item->name }}</option>
                                    {{-- <option value="">{{ $item->name }}</option>   --}}
                                    @if ($item->childrents)
                                        @foreach ($item->childrents as $sub_cate)
                                            <option value="{{ $sub_cate->id }}">--{{ $sub_cate->name }}</option>  
                                            
                                        @endforeach
                                        
                                    @endif      
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá:</label>
                            <input type="number" name="price" class="form-control" id="price" min="1000" value="{{ old('price') }}" required>
                            @error('price')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>                         
                        <div class="mb-3">
                            <label for="sale" class="form-label">Khuyến mãi (%):</label>
                            <input type="number" name="sale" class="form-control" id="sale" min="0" max="100" value="{{ old('sale') }}" required >
                            
                        </div>  
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng:</label>
                            <input type="number" name="quantity" class="form-control" id="quantity" min="0" value="{{ old('quantity') }}"  required>
                            
                        </div>  
                    </div>
                </div>                   
                         
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả:</label>
                        <textarea name="description" id="description" rows="30" cols="80" class="form-control">{{ old('description') }}</textarea>
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