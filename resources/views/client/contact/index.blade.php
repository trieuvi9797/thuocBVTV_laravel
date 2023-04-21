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
                        <h2>Liên hệ</h2><br>
                        <div class="breadcrumb__option">
                            <a href="/">Trang chủ</a>
                            <span>Liê hệ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                @foreach ($infoPages as $info)                    
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Số điện thoại</h4>
                        <p>{{ $info->phone }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>{{ $info->address }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Giờ làm việc</h4>
                        <p>{{ $info->contentFirst }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>{{ $info->email }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25106.842224081527!2d105.41623708146123!3d10.381812955520271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a731e7546fd7b%3A0x953539cd7673d9e5!2sAn%20Giang%20University!5e0!3m2!1sen!2s!4v1682050524691!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Để lại thông tin tư vấn</h2>
                    </div>
                </div>
            </div>
            <form action="" method="post">
                @include('admin.layouts.alert')
                <div class="row">
                    @csrf
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="name" placeholder="Tên bạn..." required>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="email" placeholder="Email..." required>
                    </div>
                    <div class="col-lg-12 text-center">
                        <input type="text" name="title" placeholder="Tiêu đề..." required>
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea name="content" required placeholder="Nội dung tin nhắn của bạn..."></textarea>
                    </div>
                    <button type="submit" class="site-btn">Gửi</button>
                </div>
            </form> 
        </div>
    </div>
    <!-- Contact Form End -->
@endsection
