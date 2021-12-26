<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"> 
        <img src="{{asset('backend/img/logo.png')}}" alt="" style="width:220px; height:60px"> 
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item app-search d-none d-sm-block">
                <form action="{{route('search')}}" method="get">
                    <input type="text" placeholder="Bạn muốn tìm gì?" name="tukhoa" class="form-control">
                    <button type="submit" class="search-btn mr-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search search-icon">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </form>
            </li>
        </ul>
        <ul class="top-navbar-area navbar-nav navbar-nav-right">
            <li class="nav-item dropdown dropdown-animate">
                <a class="nav-link count-indicator dropdown-toggle"  href="{{route('cart.index')}}">
                    <i class="fa fa-shopping-cart"></i>
                    @php
                        $count=0;
                        foreach ($countQuan as $row)
                            $count += $row->quantity;
                    @endphp
                    <span class="count">{{$count}}</span>
                    Giỏ hàng
                </a>
            </li>
            <li class="nav-item nav-profile dropdown dropdown-animate">
                @if (session()->has('cusID'))
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <i class="fa fa-user"></i>
                        {{$customer->information->name ?? $customer->username}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown profile-top" aria-labelledby="profileDropdown">
                        <div class="profile-header d-flex align-items-center">
                            <div class="thumb-area">
                                <img src="{{$customer->information->avatar }}" alt="">
                            </div>
                            <div class="content-text">
                                <h6>
                                    {{$customer->information->name }}
                                </h6>
                                <p class="mb-0">Khách hàng</p>
                            </div>
                        </div>
                        <a href="#myModal5" class="dropdown-item" data-toggle="modal" data-target="#myModal5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user profile-icon">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg> 
                            Thông tin cá nhân
                        </a>

                        <a href="{{route('frontend.order')}}" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user profile-icon">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg> 
                            Đơn hàng
                        </a>

                        <a href="{{route('frontend.logout')}}" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out profile-icon">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg> 
                            Đăng xuất
                        </a>
                    </div>
                    
                @else
                    <i class="fa fa-user"></i>
                    <a class="nav-link dropdown-toggle" href="{{route('frontend.getLogin')}}" >
                        Đăng nhập
                    </a>
                @endif
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-xl-none align-self-center" type="button" data-toggle="offcanvas">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid menu-bar-icon">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
            </span>
        </button>
    </div>
</nav>

{{--  MENU  --}}
<nav class="nav-menu">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="{{route('frontend.index')}}">
                Trang chủ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                Giới thiệu
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('shoes.index')}}">
                Giày
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('tintuc.index')}}">
                Tin tức
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                Liên hệ
            </a>
        </li>
    </ul>
</nav>
<div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thông tin cá nhân</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('frontend.userProfile')}}" method="post" id="formUserProfile" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if (isset($customer))
                        <div>
                            <img src="{{$customer->information->avatar}}" style="width: 100px; height:100px" alt="">
                        </div> <br>
                        <input type="file" name="cusAvatar">
                        <br><br>
                        <label for="cusName">Họ tên</label>
                        <input type="text" class="form-control" id="cusName" name="cusName" value="{{$customer->information->name}}" placeholder="Họ tên khách hàng"> <br>
                        <label for="cusAddress">Địa chỉ</label>
                        <input type="text" class="form-control" id="cusAddress" name="cusAddress" value="{{$customer->information->address}}" placeholder="Địa chỉ"> <br>
                        <label for="cusPhone">Số điện thoại</label>
                        <input type="text" class="form-control" id="cusPhone" name="cusPhone" value="{{$customer->information->phone}}" placeholder="Số điện thoại"> <br>
                        <label for="cusEmail">Email</label>
                        <input type="text" class="form-control" id="cusEmail" name="cusEmail" value="{{$customer->information->email}}"  placeholder="Email của khách hàng"> <br>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" form="formUserProfile">Lưu thông tin</button>
            </div>
        </div>
    </div>
</div>