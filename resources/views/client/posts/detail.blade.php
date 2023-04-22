@extends('client.layouts.app')
@section('content') 
{{--  --}}
</div>
</section>
<!-- Hero Section End -->
 <!-- Breadcrumb Section Begin -->
<section class="blog-details-hero set-bg" data-setbg="/client/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @foreach ($post as $item)
                <div class="blog__details__hero__text">
                    <h2>{{ $item->title }}</h2>
                    <ul>
                        <li>Tác giả: {{ $item->author }}</li>
                        <li>{{ ($item->created_at)->toDateString() }}</li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
  <!-- Blog Details Section Begin -->
  <section class="blog-details spad">
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
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                @foreach ($post as $item)
                    <img src="{{ $item->image }}" alt="">
                    {!! $item->description !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Bài viết mới nhất</h2>
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
                        {{ $item->description_short }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Blog Section End -->
@endsection