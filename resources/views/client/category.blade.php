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
                        <span>Danh mục_ </span>
                        <span> {{ $title }}</span>
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
                            <li><a href="/danh-muc/san-pham/{{ $parentCate->id }}-{{ Str::slug($parentCate->name), '-'}}">{{ $parentCate->name }}</a></li>
                        </ul>
                        @endforeach
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
