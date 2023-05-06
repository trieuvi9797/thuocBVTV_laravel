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
 @if($bills)
 <section class="shoping-cart spad">
     <div class="container">
        <div class="row">                
            <div class="col-12 col-md-6">
                <div class="shoping__cart__table"> 
                    <table>
                         <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($billDetails as $item)
                            <tr>
                                <td class="checkout__order__item">
                                    <img src="{{ $item->product->image }}" width="100px" height="100px" alt="">
                                    <h5>{{ $item->product->name }}</h5>
                                </td>
                                <td class="checkout__order__price">
                                    {{ number_format($item->product->price, 0 , '', '.') }} đ
                                </td>
                                <td class="checkout__order__quantity">{{ $item->quantity }}</td>
                                <td class="checkout__order__total">{{ number_format($item->price, 0, '', '.') }} đ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
            <div class="col-6 col-md-6">
                @if ($bills->active == 1)
                <a href="/xac-nhan-da-nhan-hang/{{ $bills->id }}" class="primary-btn-order">Xác nhận đã nhận hàng</a>
                @endif
                <div class="checkout__order">
                    <h3>Thông tin đặt hàng</h3>
                    <div class="checkout__order__subtotal">Ngày đặt hàng:
                        <span>{{ ($bills->created_at)->toDateString() }}</span>
                    </div>
                    <div class="checkout__order__subtotal">Tên khách hàng:
                        <span>{{ $customers->name }}</span>
                    </div>
                    <div class="checkout__order__ship">Số điện thoại: 
                        <span>{{ $customers->phone }}</span>
                    </div>
                    <div class="checkout__order__subtotal">Địa chỉ nhận hàng: 
                        <span>{{ $customers->address }}</span>
                    </div>
                    <div class="checkout__order__ship">Ghi chú đơn hàng: 
                        <span>{{ $customers->note }}</span>
                    </div>
                    <div class="checkout__order__ship">Thuế VAT 
                        <span>10%</span>
                    </div>
                    <div class="checkout__order__total">Tổng tiền đơn hàng: 
                        <span>{{ number_format($bills->total_price, 0, '', '.') }} đ</span>
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
