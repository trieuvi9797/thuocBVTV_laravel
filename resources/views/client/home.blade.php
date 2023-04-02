@extends('client.layouts.app')

@section('content')
    
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                        @foreach ($categories as $nameCategory)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="/client/img/product/CHITO-M55.jpg">
                                <h5><a href="#">{{ $nameCategory->name }}</a></h5>
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
                                <li><a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name, '-') }}.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name, '-') }}.html"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name, '-') }}.html"><i class="fa fa-shopping-cart"></i></a></li>
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
                            @foreach ($products as $product)
                            <div class="latest-prdouct__slider__item">
                                <a href="" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $product->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->name }}</h6>
                                        <span>{!! \App\Helpers\Helper::price($product->price) !!} VNĐ</span>
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
                            @foreach ($products as $product)
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $product->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>CHITO-M55</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $product->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>CHITO-M55</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $product->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>CHITO-M55</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>                            
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Đang khuyến mãi</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/client/img/product/CHITO-M55.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>CHITO-M55</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/client/img/product/CHITO-M55.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>CHITO-M55</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/client/img/product/CHITO-M55.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>CHITO-M55</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/client/img/product/CHITO-M55.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>CHITO-M55</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/client/img/product/CHITO-M55.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>CHITO-M55</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/client/img/product/CHITO-M55.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>CHITO-M55</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
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
                        <h2>Bài viết về Nông nghiệp</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection