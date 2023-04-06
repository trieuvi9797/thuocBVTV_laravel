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
@if(count($products) != 0)
    <form action="" method="POST">   
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="shoping__cart__table">
                        @php
                            $total = 0;    
                        @endphp
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Cộng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                @php
                                    $priceSale = $product->sale > 0 ? $product->price-($product->price*$product->sale/100) : $product->price;
                                    $price = $product->sale != 0 ? $priceSale : $product->price;
                                    $priceEnd = $price * $carts[$product->id];
                                    $total += $priceEnd;
                                @endphp 
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ $product->image }}" width="100px" height="100px" alt="">
                                        <h5>{{ $product->name }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {!! number_format($price, 0, '', '.') !!}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {!! number_format($priceEnd, 0, '', '.') !!}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a class="btn btn-outline-danger" href="/carts/delete">Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="shoping__checkout">
                        {{-- <h5>Thành tiền</h5> --}}
                        <ul>
                            <li>Tổng tiền <span>{{ number_format($total, 0, '', '.') }} VNĐ</span></li>
                        </ul>
                        <a href="#" class="primary-btn">THANH TOÁN</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                        <input type="submit" value="Cập nhật giỏ hàng" class="primary-btn cart-btn cart-btn-right" formaction="/update-cart">
                        @csrf 
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

@else
    <div class="text-center"><h2>Giỏ hàng trống</h2></div>
@endif
    <!-- Shoping Cart Section End -->
    @endsection
