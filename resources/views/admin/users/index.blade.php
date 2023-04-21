@extends('admin.layouts.app')
@section('title', 'Tài khoản')

    
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
            

        @if (session('message'))
            <h4 class="text-primary">{{ session('message') }}</h4>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Danh sách</h1>
            </div>
            <div class="col-auto">
                 <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <form class="table-search-form row gx-1 align-items-center">
                                <div class="col-auto">
                                    <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn app-btn-secondary">Search</button>
                                </div>
                            </form>
                            
                        </div><!--//col-->
                        <div class="col-auto">
                            
                            <select class="form-select w-auto" >
                                  <option selected value="option-1">All</option>
                                  <option value="option-2">This week</option>
                                  <option value="option-3">This month</option>
                                  <option value="option-4">Last 3 months</option>
                                  
                            </select>
                        </div>
                        <div class="col-auto">						    
                            <a class="btn app-btn-primary" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                  </svg>
                                Thêm mới
                            </a>
                        </div>
                    </div><!--//row-->
                </div><!--//table-utilities-->
            </div><!--//col-auto-->
        </div><!--//row-->
       
        <!--Tag all-->
        <div class="tab-content" id="orders-table-tab-content">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên tài khoản</th>
                                    <th>Email</th>
                                    <th>Loại tài khoản</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <?php $stt = 1; ?>
                            @foreach ($users as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $stt++ ; }}</td>                                        
                                    <td>{{ $item->name }}</td>                                        
                                    <td>{{ $item->email }}</td>  
                                    <td>
                                        @if ($item->user_type == 'AD')
                                            Quản trị
                                        @else
                                            Khách hàng
                                        @endif
                                    </td>  
                                    <td>
                                        <a href="" class="btn btn-outline-warning" style="float: right">Phục hồi mật khẩu</a>
                                    </td>
                                    <td>
                                        <form action="" id="form-delete" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger" type="submit">Xóa</button>
                                        </form>
                                    </td>                                     
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div><!--//table-responsive-->                  
                </div><!--//app-card-body-->		
            </div><!--//app-card-->
            {{ $users->links() }}
        </div><!--//tab-content-->
    </div><!--//container-fluid-->
 
@endsection