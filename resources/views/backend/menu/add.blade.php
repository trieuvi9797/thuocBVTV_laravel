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
                    <h1 class="app-page-title">Thêm danh mục sản phẩm</h1>
                </div>
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Danh mục</label>
                                <input type="text" class="form-control" id="setting-input-1" value="#" required>
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Lưu</button>
                        </form>
                    </div><!--//app-card-body-->
                </div>
            </div><!--//app-card-->
        </div>
    </div><!--//row-->
</div>
        @include('admin.footer')

    </body>
    </html> 
    