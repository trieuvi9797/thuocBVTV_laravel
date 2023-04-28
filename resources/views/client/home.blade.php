@extends('client.layouts.app')

@section('content')


        @foreach($slider as $sliders)
        <div class="hero__item set-bg" data-setbg="{{ $sliders->image }}">
            <div class="hero__text">
                <span>Cửa hàng Vật tư nông nghiệp</span>
                <h2>HAI LÚA</h2>
                <p>Tư vấn 24/7 - 0966884775</p>
                <a href="san-pham.html" class="primary-btn">Mua ngay</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($productsNew as $item)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ $item->image }}">
                            <h5><a href="/san-pham/{{ $item->id }}-{{ Str::slug($item->name), '-'}}.html">{{ $item->name }}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="section-title">
                <h2>Sản phẩm nổi bật</h2>
            </div>                    
            <div class="row featured__filter">
                @foreach ($products as $product)                    
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg">
                            <div class="item-image-products">
                                <img src="{{ $product->image }}" alt="">
                            </div>
                            <ul class="featured__item__pic__hover">
                                <li><a href="/them-vao-gio-hang/{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6 style="text-align:center">
                                <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name, '-') }}.html">{{ $product->name }}</a>
                            </h6>
                            <h5>{!! \App\Helpers\Helper::price($product->price) !!} VNĐ</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="blog__item__text" style="text-align:center">
                <input type="hidden" value="1" id="page">
                <a href="/san-pham.html" class="blog__btn">Xem thêm</a>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->
 
    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/client/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/client/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm mới nhất</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($productsNew as $product)
                            @php
                                $priceSale = $product->sale > 0 ? $product->price-($product->price*$product->sale/100) : $product->price;
                            @endphp
                            <div class="latest-prdouct__slider__item">
                                <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name, '-') }}.html" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $product->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                            <h6>{{ $product->name }}</h6>
                                            <span>{!! \App\Helpers\Helper::price($priceSale) !!} VNĐ</span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm bán chạy</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($productSold as $sold)
                            <div class="latest-prdouct__slider__item">
                                <a href="/san-pham/{{ $sold->id }}-{{ \Str::slug($sold->name, '-') }}.html" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $sold->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $sold->name }}</h6>
                                        <span>{!! \App\Helpers\Helper::price($sold->price) !!} VNĐ</span>
                                    </div>
                                </a>
                                
                            </div>                            
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Khuyến mãi</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($productSale as $sale)
                                <div class="latest-prdouct__slider__item">
                                    <a href="/san-pham/{{ $sale->id }}-{{ \Str::slug($sale->name, '-') }}.html" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $sale->image }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $sale->name }}</h6>
                                            <span>{!! \App\Helpers\Helper::price($sale->price) !!} VNĐ</span>
                                        </div>
                                    </a>                                    
                                </div>
                            @endforeach                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Tin Nông Nghiệp</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($postNew as $item)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ $item->image }}" width="360px" height="258px" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{ ($item->created_at)->toDateString() }}</li>
                            </ul>
                            <h5><a href="/tin-tuc/{{ $item->id }}">{{ $item->title }}</a></h5>
                            {!! $item->description_short !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection