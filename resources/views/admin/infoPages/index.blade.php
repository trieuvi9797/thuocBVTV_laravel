@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Thông tin trang Web</h1>
            </div>
            <div class="col-auto">
                @foreach ($infoPage as $item)                    
                <div class="col-auto">						    
                    <a class="btn app-btn-primary" href="/admin/infoPages/edit/{{ $item->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        Thay đổi thông tin
                    </a>
                </div>
                @endforeach
            </div><!--//col-auto-->
        </div><!--//row-->
       
        <div class="tab-content" id="orders-table-tab-content">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    @foreach ($infoPage as $item)
                    <div class="table-responsive">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="md-3">
                                <div class="row">
                                    <div class="col-md-3">                            
                                        <label  class="form-label">Logo:</label>
                                    </div>
                                    <div class="col-md">
                                        <div  id="image_show">            
                                            <img src="{{ $item->logo }}" width="262px" height="50px" alt="" >                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Số điện thoại:</label>
                                <span>{{ $item->phone }} </span>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Địa chỉ:</label>
                                <span>{{ $item->address }}</span>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Email:</label>
                                <span>{{ $item->email }}</span>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Nội dung đầu trang:</label>
                                <span>{{ $item->contentFirst }}</span>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Link Feacebook:</label>
                                <span>{{ $item->facebook }}</span>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Link instagram:</label>
                                <span>{{ $item->instagram }}</span>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Link twitter:</label>
                                <span>{{ $item->twitter }}</span>
                            </div>                                
                            <div class="mb-3">
                                <label  class="form-label">Link telegram:</label>
                                <span>{{ $item->telegram }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach                                        
                </div><!--//table-responsive-->                  
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div><!--//tab-content-->
</div><!--//container-fluid-->
 
@endsection