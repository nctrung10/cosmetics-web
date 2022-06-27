<?php
$menu = config('menuadmin');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{url('frontend')}}/image/logo.png">
    <title>EB Admin | @yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('backend')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('backend')}}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{url('backend')}}/dist/css/jquery-ui.css">
    <!-- MorrisJS Chart -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    @yield('css')
    
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="font-size:15px; height:auto">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-cyan navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link font-weight-bold" href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        Đăng xuất
                    </a>
                    <!-- <a class="nav-link" data-toggle="dropdown" href="#">
                        Xin chào,
                        <span class="text-dark text-bold"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm">
                        <a href="{{ route('logout') }}" class="dropdown-item dropdown-header text-bold text-danger">
                            Đăng xuất
                        </a>
                    </div> -->
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link text-center">
                <div class="image">
                    <img src="{{url('frontend')}}/image/logo.png" style="background-color:white;border-radius:50%;width:80px">
                </div>
                <span class="brand-text font-monospace">EB ADMIN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar User - Staff -->
                @if(Auth::guard('taikhoan')->check())
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{url('backend')}}/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::guard('taikhoan')->user()->ten }}</a>
                    </div>

                </div>
                @endif
                <!-- SIDEBAR MENU CONFIG -->
                <nav class="mt-2" style="font-size: 14px;">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Tạo vòng lặp để cấu hình sidebar menu tự động -->
                        @foreach($menu as $m)
                        <li class="nav-item">
                            <a href="{{ route($m['route']) }}" class="nav-link">
                                <!-- đường dẫn menu -->
                                <i class="nav-icon fas {{$m['icon']}}"></i> <!-- lặp icon tương ứng -->
                                <p>
                                    {{ $m['label'] }} <!-- tên menu -->
                                    @if(isset($m['items']))
                                    <!-- có menu con thì hiện icon này -->
                                    <i class="right fas fa-angle-left"></i>
                                    @endif
                                </p>
                            </a>
                            @if(isset($m['items']))
                            <!-- có menu con thì tạo dropdown -->
                            <ul class="nav nav-treeview">
                                @foreach($m['items'] as $mi)
                                <!-- tạo vòng lặp các menu con -->
                                <li class="nav-item">
                                    <a href="{{ route($mi['route']) }}" class="nav-link">
                                        <!-- đường dẫn menu con -->
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $mi['label'] }}</p> <!-- tên menu con -->
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="text-capitalize">@yield('title')</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <!-- Thông báo lỗi/thành công -->
                                    @if(Session::has('error'))
                                    <div class="d-flex justify-content-end">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{Session::get('error')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                    @if(Session::has('success'))
                                    <div class="d-flex justify-content-end">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{Session::get('success')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Nhúng Main Content -->
                                    @yield('content')
 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Management</b>
            </div>
            <strong>Copyright &copy; 2021 <span class="text-success">Eden Beauty</span>.</strong> All rights reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{url('backend')}}/plugins/jquery/jquery.min.js"></script>
    <script src="{{url('backend')}}/dist/js/jquery-ui.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{url('backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Apps -->
    <script src="{{url('backend')}}/dist/js/adminlte.min.js"></script>
    <script src="{{url('backend')}}/dist/js/simple.money.format.js"></script>
    <script src="{{url('ckeditor')}}/ckeditor.js"></script>
    <!-- MorrisJS Chart -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    @yield('js')
</body>
<!-- Show Tooltip & Auto-Close Alert -->
<script>
    $(function() {
        $('[data-bs-toggle="tooltip"]').tooltip()
    })

    $(".alert-dismissible").fadeTo(2500, 500).slideUp(200, function() { //close trong 2.5s, opacity 500
        $(this).alert('close');
    });
</script>
<!-- Custom date input -->
<script type="text/javascript">
    $(function() {
        $("#coupon_start").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
            duration: "medium",
            showOtherMonths: true,
            selectOtherMonths: true
        });
        $("#coupon_end").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
            duration: "medium",
            showOtherMonths: true,
            selectOtherMonths: true
        });
    });

    $(function() {
        $("#thongke_start").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
            duration: "medium",
            showOtherMonths: true,
            selectOtherMonths: true
        });
        $("#thongke_end").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
            duration: "medium",
            showOtherMonths: true,
            selectOtherMonths: true
        });
    });
</script>
<script>
    $('.price-format').simpleMoneyFormat();
</script>
</html>