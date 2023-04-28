@extends('client.layouts.app')

@section('content')
    
    </div>
</section>
<!-- Hero Section End -->
{{-- {{ dd($bills, $billDetails, $customers) }} --}}
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/client/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Đơn hàng của tôi</h2><br>
                    <div class="breadcrumb__option">
                        <a href="/">Trang chủ</a>
                        <span>Đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
 <!-- Shoping Cart Section Begin -->
 @if(count($bills) > 0)
 <section class="shoping-cart spad">
     <div class="container">
        <div class="row">                
            <div class="col-12 col-md-8">
                <div class="shoping__cart__table"> 
                    <table>
                        <thead>
                            <tr>
                                <th>Ngày đặt hàng</th>
                                <th>Tổng đơn hàng</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $item)
                            <tr>
                                <td class="shoping__cart__price">{{ $item->created_at }}</td>
                                <td class="shoping__cart__total">{{ number_format($item->total_price, 0, '', '.') }} đ</td>
                                @if ($item->active == 0)
                                    <td class="shoping__cart__total">
                                        <i class="fa fa-clock-o"></i>
                                        <span>Chờ xử lý</span>
                                    </td>
                                @elseif($item->active == 1)
                                    <td class="shoping__cart__total">
                                        <i class="fa fa-truck"></i>
                                        <span>Đang vận chuyển</span>
                                    </td>
                                @elseif($item->active == 2)
                                    <td class="shoping__cart__total">
                                        <i class="fa fa-check-square-o"></i>
                                        <span>Xác nhận hàng</span>
                                    </td>
                                @endif
                                <td class="shoping__cart__total">
                                    <a class="btn btn-outline-info" href="/don-hang-chi-tiet/{{ $item->id }}">Xem</a>
                                    @if ($item->active == 1)
                                        <a class="btn btn-outline-info" href="/xac-nhan-da-nhan-hang/{{ $item->id }}">Xác nhận đã nhận hàng</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
        <div class="row">
             <div class="col-lg-12">
                 <div class="shoping__cart__btns">
                     <a href="/san-pham.html" class="primary-btn cart-btn"><< Tiếp tục mua hàng</a>
                     @csrf 
                 </div>
             </div>
        </div>
    </div>
 </section>

@else
<section class="shoping-cart spad">
 <div class="text-center">
    <h1>Bạn chưa có đơn hàng nào. Hãy tìm sản phẩm yêu thích cho vào đây!</h1><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="shoping__cart__btns">
                <a href="/san-pham.html" class="primary-btn cart-btn"><< Tiếp tục mua hàng</a>
                @csrf 
            </div>
        </div>
    </div>
 </div>
</section>
@endif
@endsection
