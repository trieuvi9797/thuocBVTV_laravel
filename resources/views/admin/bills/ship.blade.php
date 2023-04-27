@extends('admin.layouts.app')

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        @if (session('message'))
            <h4 class="text-primary">{{ session('message') }}</h4>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Danh sách đơn hàng đang vận chuyển</h1>
            </div><!--//col-auto-->
        </div><!--//row-->
       
        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
            <a class="flex-sm-fill text-sm-center nav-link {{ request()->Is('*customer*') ? 'active' : '' }}" id="orders-all-tab" href="{{ route('bill.customer') }}">Tất cả đơn hàng</a>
            <a class="flex-sm-fill text-sm-center nav-link {{ request()->Is('*new*') ? 'active' : '' }}"  id="orders-paid-tab"  href="{{ route('bill.new') }}">Đơn hàng mới</a>
            <a class="flex-sm-fill text-sm-center nav-link {{ request()->Is('*ship*') ? 'active' : '' }}" id="orders-pending-tab" href="{{ route('bill.ship') }}">Đang vận chuyển</a>
            <a class="flex-sm-fill text-sm-center nav-link {{ request()->Is('*done*') ? 'active' : '' }}" id="orders-cancelled-tab" href="{{ route('bill.done') }}">Đơn hàng đã nhận</a>
        </nav>

        <!--Tag all-->
        <div class="tab-content" id="orders-table-tab-content">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th>Mã ĐH</th>
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
                                        <td><span class="badge bg-danger">Đơn hàng mới</span></td> 
                                    @elseif($bill->active == 1)
                                        <td><span class="badge bg-warning">Đang vận chuyển</span></td> 
                                    @elseif($bill->active == 2)
                                        <td><span class="badge bg-success">Đã nhận hàng</span></td> 
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
