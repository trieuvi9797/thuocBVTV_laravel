<!DOCTYPE html>
<html lang="en"> 
<head>
    @include('admin.head')
</head> 
<body class="app">   	
    
    @include('admin.header')
   

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
			<div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Thêm sản phẩm</h1>
                </div>
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="setting-input-1" value="#" required>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Danh mục</label>
                                <select class="form-control" name="menu_id">
                                    {{-- @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach --}}
                                    <option value="BVTV">BVTV</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Giá bán</label>
                                <input type="text" class="form-control" id="setting-input-1" value="#" required>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Ảnh sản phẩm</label>
                                <input type="file"  class="form-control" id="upload">
                                <div id="image_show">

                                </div>
                                <input type="hidden" name="thumb" id="thumb">
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Mô tả ngắn</label>
                                <textarea id="editor1" name="description" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Mô tả chi tiết</label>
                                <textarea id="editor1" name="description" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Lưu</button>
                    @csrf
                        </form>
                    </div><!--//app-card-body-->
                </div>
            </div><!--//app-card-->
        </div>
    </div><!--//row-->
</div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' );
</script>
        @include('admin.footer')

    </body>
    </html> 
    