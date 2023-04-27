@extends('admin.layouts.app')

@section('content')	    

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        @if (session('message'))
            <h4 class="text-primary">{{ session('message') }}</h4>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Danh sách liên hệ</h1>
            </div>
        </div><!--//row-->
       
        <!--Tag all-->
        <div class="tab-content" id="orders-table-tab-content">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th style="width: 50px">STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Ngày gửi thông tin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1;?>
                                @foreach ($contacts as $item)
                                <tr>
                                    <td>{{ $stt++; }}</td>                                        
                                    <td>{{ $item->name }}</td>                                        
                                    <td>{{ $item->email }}</td>  
                                    <td>{{ $item->title }}</td>  
                                    <td>{{ $item->content }}</td>  
                                    <td>{{ $item->created_at }}</td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->                  
                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav aria-label="Page navigation">
                {!!  $contacts->links()  !!}
            </nav>           
        </div><!--//tab-content-->
    </div><!--//container-fluid-->

@endsection
