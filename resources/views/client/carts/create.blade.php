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
                    <h2>Thanh toán đơn hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Trang chủ</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Thông tin đơn hàng</h4>
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <p>Họ và Tên<span>*</span></p>
                            <input type="text" name="name"required>
                        </div>
                        <div class="checkout__input">
                            <p>Số điện thoại<span>*</span></p>
                            <input type="number" name="phone" required>
                        </div>
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="text" name="email"required>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ nhận hàng<span>*</span></p>
                            <input type="text" name="address"required>
                        </div>
                        <div class="checkout__input">
                            <p>Ghi chú đặt hàng</p>
                            <input type="text" name="note">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            @foreach ($products as $product)
                                @php
                                    $priceSale = $product->sale > 0 ? $product->price-($product->price*$product->sale/100) : $product->price; 
                                    $price = $product->sale != 0 ? $priceSale : $product->price;
                                    $priceEnd = $price * $carts[$product->id];
                                    $total += $priceEnd;
                                @endphp

                            <h4>Đơn hàng của bạn</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng cộng</span></div>
                            @endforeach
                            <ul>
                                
                                <li>{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}
                                     <span>{{ number_format($total, 0, '', '.') }} VNĐ</span>
                                </li>
                            </ul>
                            <div class="checkout__order__subtotal">Phí vận chuyển <span></span></div>
                            <div class="checkout__order__total">Thành tiền 
                                <span>{{ number_format($total , 0, '', '.') }} VNĐ</span>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
