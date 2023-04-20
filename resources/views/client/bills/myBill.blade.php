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
             <div class="col-12 col-md-8">
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
                             <tr>
                                 <td class="shoping__cart__item">
                                     <img src="{{ $billDetails->product->image }}" width="100px" height="100px" alt="">
                                     <h5>{{ $billDetails->product->name }}</h5>
                                 </td>
                                 <td class="shoping__cart__price">
                                     {!! number_format($billDetails->price, 0, '', '.') !!} đ
                                 </td>
                                 <td class="shoping__cart__total">{{ $billDetails->quantity }}</td>
                                 <td class="shoping__cart__total">
                                     {{ number_format($billDetails->price * $billDetails->quantity, 0, '', '.') }} đ
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                     <h5>Tổng tiền: <span>{!! number_format($bills->total_price, 0, '', '.') !!} đ</span></h5>

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
    <h1>Bạn chưa có đơn hàng nào. Hãy tìm sản phẩm yêu thích cho vào đây!</h1>
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

@endsection
