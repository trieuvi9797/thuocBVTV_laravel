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
            <div class="col-12 col-md-8">
                <div class="shoping__cart__table"> 
                    <table>
                         <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng cộng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($billDetail as $item)
                            <tr>
                                <td class="shoping__cart__price">{{ $item->created_at }}</td>
                                <td class="shoping__cart__total">{{ $item->total_price }}</td>
                                <td><a class="btn btn-outline-info" href="/don-hang-chi-tiet/{{ $item->id }}">Xem</a></td>
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
