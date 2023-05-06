
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        @foreach ($infoPage as $info)
                        <div class="footer__about__logo">
                            <a href="/"><img src="{{ $info->logo }}" alt=""></a>
                        </div>                        
                        <ul>
                            <li>Địa chỉ: {{ $info->address }}</li>
                            <li>Số điện thoại: {{ $info->phone }}</li>
                            <li>Email: {{ $info->email }}</li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Danh mục sản phẩm</h6>
                        <ul>
                        @foreach ($parentCategories as $parentCate)
                            <li><a href="/danh-muc/san-pham/{{ $parentCate->id }}-{{ Str::slug($parentCate->name), '-'}}">{{ $parentCate->name }}</a></li>
                        @endforeach
                        </ul>
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li><a href="/san-pham.html">Sản phẩm</a></li>
                            <li><a href="/tin-tuc">Tin Nông nghiệp</a></li>
                            <li><a href="/lien-he.html">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham gia bản tin của chúng tôi ngay bây giờ</h6>
                        <p>Nhận thông tin cập nhật qua E-mail về cửa hàng mới nhất và các ưu đãi đặc biệt của chúng tôi.</p>
                        <form action="#">
                            <input type="text" placeholder="Nhập email của bạn...">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            @foreach ($infoPage as $info)                                
                                <a href="{{ $info->facebook }}"><i class="fa fa-facebook"></i></a>
                                <a href="{{ $info->instagram }}"><i class="fa fa-instagram"></i></a>
                                <a href="{{ $info->twitter }}"><i class="fa fa-twitter"></i></a>
                                <a href="{{ $info->telegram }}"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">                        
                        <div class="footer__copyright__payment"><img src="/client/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('client/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('client/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('client/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('client/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('client/js/mixitup.min.js')}}"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('client/js/main.js')}}"></script>
    <script src="{{ asset('client/js/public.js')}}"></script>

    {{-- mega- menu --}}
    <script src="{{ asset('client/mega-menu/js/jquery.menu-2.1.1.js')}}"></script>
    <script src="{{ asset('client/mega-menu/js/jquery.menu-aim.js')}}"></script> <!-- menu aim -->
    <script src="{{ asset('client/mega-menu/js/mega-menu.js')}}"></script> <!-- Resource jQuery -->
    {{-- mega- menu --}}

</body>

</html>