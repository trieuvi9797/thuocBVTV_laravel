<header class="app-header fixed-top">	   	            
    <div class="app-header-inner">  
        <div class="container-fluid py-2">
            <div class="app-header-content"> 
                <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
                    </a>
                </div><!--//col-->
                <div class="search-mobile-trigger d-sm-none col">
                    <i class="search-mobile-trigger-icon fas fa-search"></i>
                </div><!--//col-->
                <div class="app-search-box col">
                    <form class="app-search-form" action="">   
                        <input type="text" placeholder="Bạn cần tìm gì?" name="key" class="form-control search-input">
                        <button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button> 
                    </form>
                </div><!--//app-search-box-->
                
                <div class="app-utilities col-auto">
                    
                    <div class="app-utility-item app-user-dropdown dropdown">
                        <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                            <li><a class="dropdown-item" href="{{ route('profile.admin') }}">Tài khoản của tôi</a></li>
                            <li><a class="dropdown-item" href="{{ route('reset.pw.Admin') }}">Đổi mật khẩu</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Đăng xuất
                                </a>
                            </form>
                            </li>
                        </ul>
                    </div><!--//app-user-dropdown--> 
                </div><!--//app-utilities-->
            </div><!--//row-->
            </div><!--//app-header-content-->
        </div><!--//container-fluid-->
    </div><!--//app-header-inner-->
