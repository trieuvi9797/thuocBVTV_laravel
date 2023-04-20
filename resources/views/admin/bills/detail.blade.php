@extends('admin.layouts.app')

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        @if (session('message'))
            <h4 class="text-primary">{{ session('message') }}</h4>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Chi tiết đơn hàng</h1>
            </div>
            <div class="col-auto">
                 <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">						
                            @if ($bills->active == 0)
                            <a class="btn app-btn-primary" href="/admin/bills/active/{{ $bills->id }}">
                                <i class="fa fa-check"></i>
                                Xác nhận ĐH
                            </a>
                            @elseif($bills->active == 1)
                            <a class="btn app-btn-primary" href="/admin/bills/active/{{ $bills->id }}">
                                <i class="fa fa-truck"></i>
                                Tiến hành vận chuyển
                            </a>
                            @elseif($bills->active == 2)
                            
                            @endif    
                        </div>
                    </div><!--//row-->
                </div><!--//table-utilities-->
            </div><!--//col-auto-->
        </div><!--//row-->
       
        <!--Tag all-->
        <div class="tab-content" id="orders-table-tab-content">
            <div class="col-12">
                <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-12 col-lg-auto text-center text-lg-start">						        
				                <div class="app-icon-holder">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                                    <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
								</div><!--//app-icon-holder-->
					        </div><!--//col-->
                            <div class="col-auto">
                                <h4 class="app-card-title">Thông tin đơn hàng</h4>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body px-4 col-12">  
                        <div class="row">
                            <div class="col-md">
                                <ul class="list-unstyled">
                                    <li><strong>Mã đơn hàng:</strong>   {{ $bills->id }}</li>
                                    <li><strong>Email:</strong>   {{ $customers->email }}</li>
                                    <li><strong>Địa chỉ:</strong>   {{ $customers->address }}</li>
                                    <li><strong>Ghi chú đơn hàng:</strong>   {{ $customers->note }}</li>
                                </ul>
                            </div>
                            <div class="col-md">
                                <ul class="list-unstyled">
                                    <li><strong>Tên khách hàng:</strong>   {{ $customers->name }}</li>
                                    <li><strong>Số điện thoại:</strong>   {{ $customers->phone }}</li>
                                    <li><strong>Tổng tiền:</strong>   {{ number_format($bills->total_price) }} đ</li>
                                </ul>
                            </div>
                        </div>                          
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div>
            <br>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th style="width: 50px">#</th>
                                    <th>Sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                    <th>Ngày đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($billDetails as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>                                        
                                    <td>{{ $item->product->name }}</td>                                        
                                    <td><img src="{{ $item->product->image }}" width="80px" height="80px" alt=""></td>  
                                    <td>{{ $item->product->price }}</td>  
                                    <td>{{ $item->quantity }}</td>  
                                    <td>{{ $item->quantity * $item->product->price }}</td>  
                                    <td>{{ $item->created_at }}</td>  
                                                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->                  
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//tab-content-->
    </div><!--//container-fluid-->

@endsection
