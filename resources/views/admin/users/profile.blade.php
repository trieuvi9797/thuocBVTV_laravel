@extends('admin.layouts.app')
@section('title', 'Tài khoản')

    
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        @include('admin.layouts.alert')

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Tài khoản của tôi</h1>
            </div><!--//col-auto-->
            
        </div>            
        <div class="col-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">  
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <h5>Tên tài khoản:</h5>
                            <h5>Email:</h5>
                            <h5>Loại tài khoản:</h5>
                        </div>
                        <div class="col-lg-8 col-md-6">
                            <h5>{{ $user->name }}</h5>
                            <h5>{{ $user->email }}</h5>
                            
                            @if ($user->user_type == 'AD')
                                <h5>Quản trị</h5>
                            @else
                                <h5>Khách hàng</h5>
                            @endif
                            
                        </div>
                    </div>     
                </div><!--//app-card-body-->		
            </div><!--//app-card-->
        </div><!--//tab-content-->
    </div><!--//container-fluid-->
</div>     
 
@endsection