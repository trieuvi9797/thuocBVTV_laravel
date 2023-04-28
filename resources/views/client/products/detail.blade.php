@extends('client.layouts.app')
@section('content')

{{--  --}}
</div>
</section>
<!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/client/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Chi tiết sản phẩm</h2><br>
                        <div class="breadcrumb__option">
                            <a href="/">Trang chủ</a>
                            <a href="/san-pham.html">Cửa hàng</a>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ $productDetails->image }}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="{{ $productDetails->image }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $productDetails->name }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        @php
                            $priceSale = $productDetails->sale > 0 ? $productDetails->price-($productDetails->price*$productDetails->sale/100) : $productDetails->price;
                        @endphp
                        <div class="product__details__price">{!! \App\Helpers\Helper::price($priceSale) !!} VNĐ</div>
                        @if ($productDetails->sale != 0) 
                            <del>{{ $productDetails->price  }} VNĐ</del>
                        @endif
                        
                            <ul>
                            @if (($productDetails->quantity) < 1)
                                <li>
                                    <b>Số lượng kho</b> 
                                    <span style="color:red">Hết hàng</span>
                                </li>
                                <li><b>Vận chuyển</b> <span>01-02 ngày. <samp>Miễn phí</samp></span></li>
                                <li><b>Chia sẽ</b>
                                    <div class="share">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </li>
                            </ul>
                            @else
                            <ul>
                                <li>
                                    <b>Số lượng kho</b> 
                                    <span>{{ $productDetails->quantity }}</span>
                                </li>
                                <li><b>Vận chuyển</b> <span>01-02 ngày. <samp>Miễn phí</samp></span></li>
                                <li><b>Chia sẽ</b>
                                    <div class="share">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </li>                                    
                            </ul>
                            <form action="/gio-hang-them/{{ $productDetails->id }}" method="post">
                                @csrf
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="qty" value="1">
                                    </div>
                                </div>
                            </div>
                            {{-- <a href="/gio-hang-them/{{ $productDetails->id }}" class="primary-btn">
                                Thêm vào giỏ hàng
                            </a> --}}
                            <button type="submit" class="primary-btn">Thêm vào giỏ hàng</button>
                            {{-- <a type="submit"  class="primary-btn">Thêm vào giỏ hàng</a> --}}
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            @endif
                            <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                        </form>
                        
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô tả</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    {{-- <h6>Products Infomation</h6> --}}
                                    {!! $productDetails->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm khuyến mãi</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ $item->image }}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="/san-pham/{{ $item->id }}-{{ Str::slug($item->name), '-' }}.html">{{ $item->name }}</a></h6>
                            <h5>{!! \App\Helpers\Helper::price($item->price) !!} VNĐ</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection
