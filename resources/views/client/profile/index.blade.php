@extends('client.layouts.app')
@section('content')
   
{{--  --}}
</div>
</section>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/client/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thông tin cá nhân</h2><br>
                        <div class="breadcrumb__option">
                            <a href="/">Trang chủ</a>
                            <span>Thông tin cá nhân</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Thông tin</h4>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <h4>Tên khách hàng:</h4>
                        <h4>Email:</h4>
                        <h4>Mật khẩu:</h4>
                    </div> 
                    <div class="col-lg-8 col-md-6">
                        @foreach ($user as $item)
                        <h4>{{ $item->name }}</h4>
                        <h4>{{ $item->email }}</h4>
                        <h4><a href="">Đổi mật khẩu</a></h4>
                        @endforeach
                        
                    </div> 
                </div>
            </div>
        </div>
    </section>
    
@endsection
