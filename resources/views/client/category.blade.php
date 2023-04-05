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
                    <h2>{{ $title }}</h2><br>
                    <div class="breadcrumb__option">
                        <a href="/">Trang chủ</a>
                        <a href="/danh-muc/{{ $category->id }}-{{ Str::slug($category->name) }}.html">
                            <span>{{ $title }}</span>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh mục thuốc</h4>
                        @foreach ($parentCategory as $parentCate)                            
                        <ul>
                            <li><a href="/danh-muc/{{ $parentCate->id }}-{{ Str::slug($parentCate->name), '-'}}.html">{{ $parentCate->name }}</a></li>
                        </ul>
                        @endforeach
                    </div>
                    <div class="sidebar__item">
                        <h4>Giá</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Sản phẩm mới nhất</h4>
                            <div class="latest-product__slider owl-carousel">
                                @foreach ($productNew as $New)                                    
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $New->image }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $New->name }}</h6>
                                            <span>{!! \App\Helpers\Helper::price($New->price) !!} VNĐ</span>
                                        </div>
                                    </a>                                    
                                </div>
                                @endforeach                                
                            </div>
                        </div>
                        <div class="latest-product__text">
                            <h4>Sản phẩm bán chạy</h4>
                            <div class="latest-product__slider owl-carousel">
                                @foreach ($productSold as $sold)                                    
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
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
                </div>
            </div>
            @include('client.products.list')
        </div>
    </div>
</section>

<!-- Product Section End -->
@endsection