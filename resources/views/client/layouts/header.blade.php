<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="VTNN - KHAI MAI">
    <meta name="keywords" content="VTNN - KHAI MAI">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/client/img/LogoVTNN.jpg"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <!-- Google Font -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/style.css')}}" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- mega-menu --}}
    <link rel="stylesheet" href="{{ asset('client/mega-menu/css/reset.css')}}"> <!-- CSS reset -->
	<link rel="stylesheet" href="{{ asset('client/mega-menu/css/style.css')}}"> <!-- Resource style -->
	<script src="{{ asset('client/mega-menu/js/modernizr.js')}}"></script> <!-- Modernizr -->
    {{-- mega-menu --}}
    
</head>

<body>
    <!-- Page Preloder Loading -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href=""><img src="/client/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="/client/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Vietnamese</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="">Trang chủ</a></li>
                <li><a href="">Sản phẩm</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="">Tin tức</a></li>
                <li><a href="">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-telegram" aria-hidden="true"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li>Giờ làm việc: Thứ 2 - Chủ Nhật: 06:00 - 19:30 (Cửa hàng). (Online - 24/7)</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li>Giờ làm việc: Thứ 2 - Chủ Nhật: 06:00 - 19:30 (Cửa hàng). (Online - 24/7)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>                                
                                <a href="#"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="/client/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Vietnamese</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="/client/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="">Trang chủ</a></li>
                            <li><a href="">Sản phẩm</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="">Tin tức</a></li>
                            <li><a href="">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="cd-dropdown-wrapper">
                        <a class="cd-dropdown-trigger" href="#0">Danh mục thuốc</a>
                        <nav class="cd-dropdown">
                            <h2>Danh mục thuốc</h2>
                            <a href="#0" class="cd-close">Close</a>
                            {{-- de quy cay danh muc menu  --}}
                        @foreach ($childCategories as $cate)
                            <ul class="cd-dropdown-content">					
                                <li class="has-children">
                                    <a href="">{{ $cate->name }}</a>
                                    @if ($cate->childrents) {{--neu la Danh muc con --}}
                                        <ul class="cd-secondary-dropdown is-hidden">
                                            <li class="see-all"><a href="">Sản phẩm khác</a></li>
                                            <li class="has-children">
                                                <ul class="is-hidden">
                                                    <li class="go-back"><a href="#0"></a></li>
                                                    @foreach ($cate->childrents as $sub_cate)
                                                        <li><a href="">{{ $sub_cate->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul> <!-- .cd-secondary-dropdown -->
                                    @endif
                                </li> <!-- .has-children -->            
                            </ul> <!-- .cd-dropdown-content -->
                        @endforeach
                        </nav> <!-- .cd-dropdown -->
                    </div> <!-- .cd-dropdown-wrapper -->
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">                               
                                <input type="text" placeholder="Bạn muốn tìm gì?">
                                <button type="submit" class="site-btn">Tìm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0966884775</h5>
                                <span>Tư vấn 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($slider as $sliders)
            <div class="hero__item set-bg" data-setbg="{{ $sliders->image }}">
                <div class="hero__text">
                    <span>Cửa hàng Vật tư nông nghiệp</span>
                    <h2>KHAI MAI</h2>
                    <p>Tư vấn 24/7 - 0966884775</p>
                    <a href="/client/products.index" class="primary-btn">Mua ngay</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Hero Section End -->
