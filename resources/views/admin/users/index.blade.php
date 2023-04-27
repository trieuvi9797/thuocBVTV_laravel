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
                <h1 class="app-page-title mb-0">Danh sách tài khoản</h1>
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