@extends('admin.layouts.app')    
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">          
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Chi tiết bài viết</h1>
        </div>
        <hr class="mb-4">
        <div class="app-card-body">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-4">
                    <div  id="image_show">            
                        <img src="{{ $post->image }}" id="show-image" alt="" width="300px" height="300px">
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="mb-3">
                            <label  class="form-label">Tiêu đề:</label>
                            <h4>{{ $post->title }}</h4>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Tác giả:</label>
                            <a>{{ $post->author }}</a>
                        </div>                        
                    </div>
                </div>
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="mb-3">
                        <label  class="form-label">Mô tả:</label>
                        {!! $post->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div><!--//tab-content-->
</div><!--//container-fluid-->
 
@endsection

