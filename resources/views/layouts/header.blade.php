<header class="header">
    <div class="top-header">
        <div class="container">
            <div class="row p-2">
                <div class="col-xl-4 text-success" style="font-weight: 500;">
                    <i class="fas fa-envelope"></i>
                    <span class="text-danger">eden.beauty@gmail.com</span>
                    <span class="px-1">|</span>
                    <i class="fas fa-phone"></i>
                    <span class="text-danger">0909.210.999</span>
                </div>
                <div class="col-xl-5 text-center">
                    <span class="notice">
                        Miễn phí giao hàng với đơn hàng từ 600k trở lên <i class="fa fa-shipping-fast"></i>
                    </span>
                </div>
                <div class="col-xl-1"></div>
                <div class="col-xl-2">
                    @if(Auth::guard('cus')->check())
                    <div class="dropdown dropdown-top-header_user">
                        <a href="#" class="link-member d-flex align-items-center" aria-expanded="false">
                            <i class="fas fa-user-alt"></i>
                            <span class="user-name">{{ Auth::guard('cus')->user()->ten }}</span>
                        </a>
                        <ul class="dropdown-menu w-100" style="border-color:#0b643b">
                            <li><a href="{{ route('thongtinkh') }}" class="dropdown-item user-dropdown-item">Thông tin cá nhân</a></li>
                            <li><a href="{{ route('thongtinkh.lichsumuahang') }}" class="dropdown-item user-dropdown-item">Lịch sử mua hàng</a></li>
                            <li><a href="{{ route('dangxuat') }}" class="dropdown-item user-dropdown-item">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Đăng xuất
                                </a></li>
                        </ul>
                    </div>
                    @else
                    <div class="dropdown dropdown-top-header_user">
                        <a class="link-member d-flex align-items-center" href="#">
                            <i class="fas fa-user-alt"></i>
                            <span class="ps-1">Tài khoản</span>
                        </a>
                        <ul class="dropdown-menu" style="text-align:center; left:-30px; border-color:#0b643b">
                            <a href="{{ route('dangnhap') }}" class="dropdown-item" style="font-weight:500;color:#0b643b">
                                Đăng nhập
                            </a>
                            <a href="{{ route('dangky') }}" class="dropdown-item" style="font-weight:500;color:#0b643b">
                                Đăng ký
                            </a>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mid-header my-2">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <span class="logo">Eden Beauty</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse align-items-center" id="navbarNavAltMarkup">
                    <div class="col-1"></div>
                    <div class="col-xxl-8 col-lg-8 col-md-12 col-12 mt-1">
                        <form class="input-group" method="POST" autocomplete="off" action="{{ route('timkiem') }}">
                            @csrf
                            <input class="form-control border-2 form-success-3" placeholder="Nhập tên sản phẩm cần tìm" type="search" id="keywords" name="key_submit">
                            <button class="btn btn-success" type="submit" name="search_items"><i class="fa fa-search"></i></button>

                            <div id="search-ajax" class="dropdown-menu" style="top:42px; left:-1px; width:94%; border-radius:0"></div>
                        </form>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-xxl-2 col-lg-2 col-md-12 col-12 mt-3">
                        <a href="{{ route('cart.view') }}" class="text-dark position-relative" style="font-size: 18px;">
                            <i class="fas fa-shopping-cart"></i>
                            <!-- sử dụng global function, trỏ đến biến ở CartHelper -->
                            <span class="badge bg-warning rounded-pill" style="position:absolute; bottom: 10px; right: -22px; opacity: 0.8; color: #000;">
                                {{ $cart->total_quantity }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="end-header my-3" style="background-color:#eeeeee!important">
        <div class="container">
            <nav class="nav justify-content-center" style="background-color: #0b643b;">
                <a href="{{ route('trangchu') }}" class="nav-link header-nav-link">Trang chủ</a>

                <div class="nav-item dropdown dropdown-catalog">
                    <a class="nav-link header-nav-link dropdown-toggle" href="#" aria-expanded="false">
                        Sản phẩm
                    </a>
                    <ul class="dropdown-menu p-3" style="width:860px; position:absolute; left:-160px; font-size:15px;">
                        <div class="row">
                            @foreach($danhmuc as $dm)
                            @if($dm->parent_id == 0)
                            <div class="col-2 p-0">
                                <li>
                                    <a class="dropdown-item text-success" style="font-weight:500;" href="{{ route('view',['slug'=>$dm->slug]) }}">
                                        {{$dm->ten}}
                                    </a>
                                </li>
                                @foreach($danhmuc as $dmcon)
                                @if($dmcon->parent_id == $dm->id)
                                <li><a class="dropdown-item" href="{{ route('view',['slug'=>$dmcon->slug]) }}">{{$dmcon->ten}}</a></li>
                                @endif
                                @endforeach
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </ul>
                </div>
                <div class="nav-item dropdown dropdown-catalog">
                    <a class="nav-link header-nav-link dropdown-toggle" href="#" aria-expanded="false">
                        Thương hiệu
                    </a>
                    <ul class="dropdown-menu p-3" style="width:560px; position:absolute; left:-105px; font-size:15px; font-weight:500;">
                        <div class="row">
                            @foreach($thuonghieu as $th)
                            <div class="col-4">
                                <li><a class="dropdown-item" href="{{ route('view',['slug'=>$th->slug]) }}">{{ $th->ten }}</a></li>
                            </div>
                            @endforeach
                        </div>
                    </ul>
                </div>

                <a class="nav-link header-nav-link" href="#">Về chúng tôi</a>
                <a class="nav-link header-nav-link" href="{{ route('show.blog') }}">Blog</a>
                <a class="nav-link header-nav-link" href="{{ route('contact') }}">Liên hệ</a>
            </nav>
        </div>

        <!-- <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="dropdown pb-2 dropdown-catalog">
                        <button class="btn btn-success dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục sản phẩm
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                            @foreach($danhmuc as $dm)
                            <li><a href="{{ route('view',['slug'=>$dm->slug]) }}" class="dropdown-item">{{ $dm->ten }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-1"></div>

                <div class="col-xl-7 col-md-12 col-sm-12">
                    <form class="input-group" method="POST" autocomplete="off" action="{{ route('timkiem') }}">
                        @csrf
                        <input class="form-control form-success-3" placeholder="Nhập tên sản phẩm cần tìm" type="search" id="keywords" name="key_submit">
                        <button class="btn btn-success" type="submit" name="search_items"><i class="fa fa-search"></i></button>

                        <div id="search-ajax" class="dropdown-menu" style="top:40px; left:-1px; width:94%; border-radius: 0"></div>
                    </form>
                </div>
            </div>
        </div> -->
    </div>
</header>
<!-- header for mobile -->
<!-- <header class="d-block d-xxl-none">
    <div class="top-header">
        <div class="container">
            <div class="row p-2">
                <div class="col-xl-12 text-center">
                    <span class="notice" style="font-size:14px">
                        Miễn phí giao hàng với đơn hàng từ 600k trở lên <i class="fa fa-shipping-fast"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="mid-header my-2">
        <div class="container align-items-center">
            <a href="{{ url('/') }}" class="navbar-brand">
                <span class="logo">Eden Beauty</span>
            </a>
            <a class="btn btn-dark float-end" data-bs-toggle="offcanvas" href="#offcanvasRight" role="button" aria-controls="offcanvasRight">
                <i class="fas fa-align-right"></i>
            </a>

            <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-success fw-bold" style="font-family: cursive;" id="offcanvasExampleLabel">
                        Eden Beauty
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div>
                        HEADER FOR MOBILE DEVICE
                    </div>
                    <div class="dropdown mt-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            Dropdown button
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="end-header">
        <div class="container">
            <div class="col-12">
                <form class="input-group" method="POST" autocomplete="off" action="{{ route('timkiem') }}">
                    @csrf
                    <input class="form-control border-2 form-success-3" placeholder="Nhập tên sản phẩm cần tìm" type="search" id="keywords" name="key_submit">
                    <button class="btn btn-success" type="submit" name="search_items"><i class="fa fa-search"></i></button>

                    <div id="search-ajax" class="dropdown-menu" style="top:42px; left:-1px; width:94%; border-radius:0"></div>
                </form>
            </div>
        </div>
    </div>
</header> -->