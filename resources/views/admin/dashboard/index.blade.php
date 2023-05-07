@extends('admin.layouts.app')

@section('content')
    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
            <h1 class="app-page-title"></h1>

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Tổng đơn hàng</h4>
                            <div class="stats-figure">{{ $totalBill }}</div>
                            
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/bills/customer"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Đơn hàng hôm nay</h4>
                            <div class="stats-figure">{{ $todayBill }}</div>
                             
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/bills/customer"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Đơn hàng tháng</h4>
                            <div class="stats-figure">{{ $monthBill }}</div>
                            
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/bills/customer"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Đơn hàng năm</h4>
                            <div class="stats-figure">{{ $yearBill }}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/bills/customer"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
            </div><!--//row-->
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Tổng tiền đơn hàng</h4>
                            <div class="stats-figure">{{ number_format($totalPriceBill, 0, '', '.') }} đ</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/bills/done"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Doanh thu ngày</h4>
                            <div class="stats-figure">{{ number_format($priceDay, 0, '', '.') }} đ</div>
                            
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/bills/customer"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Doanh thu tháng</h4>
                            <div class="stats-figure">{{ number_format($priceMonth, 0, '', '.') }} đ</div>
                             
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/bills/customer"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Doanh thu năm</h4>
                            <div class="stats-figure">{{ number_format($priceYear, 0, '', '.') }} đ</div>
                            
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/bills/customer"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
            </div>
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Tổng số sản phẩm</h4>
                            <div class="stats-figure">{{ $totalProduct }}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/products/index"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Tổng số danh mục</h4>
                            <div class="stats-figure">{{ $totalCategory }}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/categories/index"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Tổng số tài khoản</h4>
                            <div class="stats-figure">{{ $totalAllUser }}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/users/index"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Tổng số bài viết</h4>
                            <div class="stats-figure">{{ $totalPost }}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/posts/index"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
            </div>
        </div><!--//container-fluid-->

@endsection