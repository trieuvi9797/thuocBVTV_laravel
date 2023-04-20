@extends('admin.layouts.app')

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        @if (session('message'))
            <h4 class="text-primary">{{ session('message') }}</h4>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Danh sách đơn hàng mới</h1>
            </div>
            <div class="col-auto">
                 <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto"> 
                            <a class="btn app-btn-secondary" href="{{ route('bill.customer') }}">
                                Tất cả
                            </a>                            
                            <a class="btn app-btn-secondary" href="{{ route('bill.ship') }}">
                                Đang vận chuyển
                            </a>
                            <a class="btn app-btn-secondary" href="{{ route('bill.done') }}">
                                Đã nhận hàng
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
                                    <th style="width: 50px">Mã ĐH</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills as $bill)
                                <?php $customer = App\Models\Customer::find($bill->customer_id); ?>
                                <tr>
                                    <td>{{ $bill->id }}</td>                                        
                                    <td>{{ $customer->name }}</td>                                        
                                    <td>{{ $customer->phone }}</td>  
                                    <td>{{ $customer->email }}</td>  
                                    <td>{{ $bill->created_at }}</td>  
                                    <td>{{ number_format($bill->total_price) }} đ</td>  
                                    @if ($bill->active == 0)
                                        <td>Đơn hàng mới</td> 
                                    @elseif($bill->active == 1)
                                        <td>Đang vận chuyển</td> 
                                    @elseif($bill->active == 2)
                                        <td>Đã nhận hàng</td> 
                                    @endif
                                    <td>
                                        <a class="btn btn-outline-info" href="/admin/bills/view/{{ $bill->id }}">Xem</a>
                                    </td>                                 
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- @endforeach --}}
                        </table>
                    </div><!--//table-responsive-->                  
                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav aria-label="Page navigation">
                {!!  $bills->links()  !!}
            </nav>           
        </div><!--//tab-content-->
    </div><!--//container-fluid-->

@endsection
