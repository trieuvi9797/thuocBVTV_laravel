@extends('client.layouts.app')

@section('content')
    
    </div>
</section>
<!-- Hero Section End -->
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
             <div class="col-12">
                <div class="shoping__checkout">
                    <h5>Thông tin đơn hàng</h5>
                    <ul>
                        @foreach ($customers as $item)
                            <li>Tên KH: <span>{{ $item->name }}</span></li>
                            <li>Số điện thoại: <span>{{ $item->phone }} đ</span></li>
                            <li>Địa chỉ nhận hàng: <span>{{ $item->address }}</span></li>
                        @endforeach

                        @foreach ($bills as $item)
                            <li>Ngày mua hàng: <span>{{ $item->created_at }} đ</span></li>
                            <li>Tổng thanh toán: <span>{{ $item->total_price }} đ</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="shoping__cart__table">                        
                    <table>
                         <thead>
                             <tr>
                                 <th class="shoping__product">Sản phẩm</th>
                                 <th>Đơn giá</th>
                                 <th>Số lượng</th>
                                 <th style="width:140px">Thành tiền</th>
                             </tr>
                        </thead>
                        <tbody>
                            @foreach ($billDetails as $item)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{ $item->product->image }}" width="100px" height="100px" alt="">
                                    <h5>{{ $item->product->name }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {!! number_format($item->price, 0, '', '.') !!} đ
                                </td>
                                <td class="shoping__cart__total">{{ $item->quantity }}</td>
                                <td class="shoping__cart__total">
                                    {{ number_format($item->price * $item->quantity, 0, '', '.') }} đ
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                     @foreach ($bills as $item)
                        <h5>Tổng tiền: <span>{!! number_format($item->total_price, 0, '', '.') !!} đ</span></h5>
                     @endforeach
                     
                    <div class="col-6 col-md-4">
                        
                    </div>
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
