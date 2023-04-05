        <div class="col-lg-9 col-md-7">
            <div class="filter__item">
                <div class="row">
                    <div class="col-md-8">
                        <div class="filter__sort">
                            <span>Sắp xếp theo</span>
                            <select>
                                <option value="0">Giá tiền thấp - cao</option>
                                <option value="0">Giá tiền cao - thấp</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-4" style="right:0">
                        <div class="filter__option">
                            <span class="icon_grid-2x2"></span>
                            <span class="icon_ul"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ $product->image }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="san-pham/{id}-{slug}.html"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="san-pham/{id}-{slug}.html"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="san-pham/{id}-{slug}.html"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name), '-' }}.html">{{ $product->name }}</a></h6>
                                <h5>{!! \App\Helpers\Helper::price($product->price) !!} VNĐ</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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
                                        <div class="product__item__price">{{ $productsSale->price-($productsSale->price*$productsSale->sale/100) }} VNĐ<span>{{ $productsSale->price }} VNĐ</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
