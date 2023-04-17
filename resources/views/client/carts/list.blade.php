@extends('client.layouts.app')

@section('content')
    
{{--  --}}
    </div>
</section>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/client/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2><br>
                        <div class="breadcrumb__option">
                            <a href="/">Trang chủ</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
@if(count($content) != 0)
    <form action="" method="POST">   
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="shoping__cart__table">                        
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th style="width:140px">Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $item)
                                @php
                                    $priceSale = $item->sale > 0 ? $item->price-($item->price*$item->sale/100) : $item->price; 
                                @endphp 
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ $item->options->image }}" width="100px" height="100px" alt="">
                                        <h5>{{ $item->name }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {!! number_format($priceSale, 0, '', '.') !!} đ
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity-pro">
                                            <a class="minus" href="/gio-hang-giam/{{ $item->rowId }}">-</a>
                                            <input type="text" name="qty" value="{{ $item->qty }}">
                                            <a class="minus" href="/gio-hang-tang/{{ $item->rowId }}">+</a>
                                            {{-- <div class="pro-qty">
                                            </div> --}}
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{ number_format($priceSale*$item->qty, 0, '', '.') }} đ
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a class="btn btn-outline-danger" href="/gio-hang-xoa/{{ $item->rowId }}">Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="shoping__checkout">
                        <h5>Tổng tiền giỏ hàng</h5>
                        <ul>
                            <li>Tổng tiền sản phẩm<span>{{ number_format($priceSale*$item->qty, 0, '', '.') }} đ</span></li>
                            <li>Thuế VAT (10%)<span>{{ Cart::tax() }} đ</span></li>
                            <li>Phí vận chuyển<span>Miễn phí</span></li>
                            <li>Tổng thanh toán<span>{{ Cart::total() }} đ</span></li>
                        </ul>
                        <a href="/dat-hang" class="primary-btn">THANH TOÁN</a>
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
</form>

@else
<section class="shoping-cart spad">
    <div class="text-center">
            <h1>Chưa có sản phẩm nào trồng giỏ hàng</h1>
    </div>
</section>
@endif
@endsection
