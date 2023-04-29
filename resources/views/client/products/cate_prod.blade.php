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
                    <h2>{{ $parentCategory->name }}</h2><br>
                    <div class="breadcrumb__option">
                        <a href="/">Trang chủ</a>
                        <span>Danh mục_  </span>
                        <span> {{ $parentCategory->name }}</span>
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
                        @foreach ($category as $item)                            
                        <ul>
                            <li><a href="/danh-muc/san-pham/{{ $item->id }}-{{ Str::slug($item->name), '-'}}">{{ $item->name }}</a></li>
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
            <div class="col-lg-9 col-md-7">
                @if(count($products) > 0)
                <div class="row">
                    @foreach ($products as $product)
                    @php
                        $priceSale = $product->sale > 0 ? $product->price-($product->price*$product->sale/100) : $product->price;
                    @endphp
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ $product->image }}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="san-pham/{id}-{slug}.html"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="/gio-hang"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name), '-' }}.html">{{ $product->name }}</a></h6>
                                    <h5>{!! \App\Helpers\Helper::price($priceSale) !!} VNĐ</h5>
                                    @if ($product->sale != 0) 
                                        <del>{{ $product->price  }} VNĐ</del>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                    @else
                        <span>Danh mục này không có sản phẩm bạn cần. Vui lòng chọn danh mục khác.</span><br>
                    @endif
                <div class="product__pagination">
                    {{ $products->links() }}
                </div>
                <div class="product__discount">
                    <div class="filter__item">
                        <div class="section-title product__discount__title">
                            <h2>Khuyến Mãi</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach ($productSale as $productsSale)  
                                @php
                                    $priceSale = $productsSale->sale > 0 ? $productsSale->price-($productsSale->price*$productsSale->sale/100) : $productsSale->price;
                                @endphp                         
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg" data-setbg="{{ $productsSale->image }}">
                                            <div class="product__discount__percent">
                                                -{{ $productsSale->sale }}%
                                            </div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <h5><a href="/san-pham/{{ $productsSale->id }}-{{ Str::slug($productsSale->name), '-' }}.html">{{ $productsSale->name }}</a></h5>
                                            <div class="product__item__price">{!! \App\Helpers\Helper::price($priceSale) !!} VNĐ<span>{{ $productsSale->price }} VNĐ</span></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</section>

<!-- Product Section End -->
@endsection
