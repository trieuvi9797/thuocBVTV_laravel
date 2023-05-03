        <div class="col-lg-9 col-md-7">
            @if(count($products) != 0)
            <div class="row">
                @foreach ($products as $product)
                @php
                    $priceSale = $product->sale > 0 ? $product->price-($product->price*$product->sale/100) : $product->price;
                @endphp
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ $product->image }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="/them-vao-gio-hang/{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a></li>
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
                    <h2>Danh mục này không có sản phẩm. Vui lòng chọn sản phẩm khác.</h2>
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
                                            <li><a href="/them-vao-gio-hang/{{ $productsSale->id }}"><i class="fa fa-shopping-cart"></i></a></li>
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
