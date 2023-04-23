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
                    <h2>Bài viết - Tin tức về nông nghiệp</h2><br>
                    <div class="breadcrumb__option">
                        <a href="/">Trang chủ</a>
                        <span>Tin tức</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh mục thuốc</h4>
                        @foreach ($category as $categories)                            
                        <ul>
                            <li><a href="/danh-muc/{{ $categories->id }}-{{ Str::slug($categories->name), '-'}}.html">{{ $categories->name }}</a></li>
                        </ul>
                        @endforeach
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Sản phẩm mới nhất</h4>
                            <div class="latest-product__slider owl-carousel">
                                    @foreach ($productNew as $new)
                                    <div class="latest-prdouct__slider__item">
                                        <a href="san-pham/{id}-{slug}.html" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ $new->image }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $new->name }}</h6>
                                                <span>{!! \App\Helpers\Helper::price($new->price) !!} VNĐ</span>
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
                                    <a href="san-pham/{id}-{slug}.html" class="latest-product__item">
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
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    @foreach ($post as $item)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ $item->image }}" width="350px" height="250px" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{ ($item->created_at)->toDateString() }}</li>
                                </ul>
                                <h5><a href="/tin-tuc/{{ $item->id }}">{{ $item->title }}</a></h5>
                                <p>{{ $item->description_short }}</p>
                                <a href="/tin-tuc/{{ $item->id }}" class="blog__btn"> XEM THÊM <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="product__pagination blog__pagination">
                    {{ $post->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection