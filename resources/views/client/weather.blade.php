@extends('client.layouts.app')

@section('content')
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
                        <span>Dự báo thời tiết</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
<div class="container">

{{-- <div class="Display"> --}}
    <div class="search">
        <input type="text" class="nhapten" placeholder="Nhập tên thành phố">
        <button class="btn-weather"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>

    <div class="checkout__form">
    <div class="thoitiet">
        <div class="tenthanhpho"><b></b></div>
        <div class="thongtin">
            <div>
                <img class ="icon" src="" alt=""/>
                <div class="motathoitiet"><h4>Thời tiết</h4></div>
            </div>
            <div class="nhietdo"><h4>Nhiệt độ</h4></div>
            <div class="doam"><h4>Độ ẩm</h4></div>
            <div class="tocdogio"><h4>Tốc độ gió</h4></div>
        </div>
    </div>
    </div>
</div>
<!--javascript-->
<script src="/weather/main.js"></script>

<script type='text/javascript'
    src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AlizV6RmSx19CCko6H42eu8xWdnjk0cOeUY3akKwaMM3LDwNOrcZYzGUvxwC7qTw' 
    async defer>
</script>	
<!-- Blog Section End -->
@endsection
