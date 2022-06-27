@extends('master')

@section('title', '| Tài khoản')

@section('content')
<!-- NOTICE -->
@if(Session::has('success'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div class="toast text-center" data-bs-delay="2500" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header text-center">
            <strong class="mx-auto">THÔNG BÁO</strong>
            <button type="button" class="btn-close ms-0" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-success text-white" style="font-weight: 500;">
            <i class="fas fa-check-circle"></i>
            {{ Session::get('success') }}
        </div>
    </div>
</div>
@endif
@if(Session::has('error'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div class="toast text-center" data-bs-delay="2500" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header text-center">
            <strong class="mx-auto">THÔNG BÁO</strong>
            <button type="button" class="btn-close ms-0" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-danger text-white" style="font-weight: 500;">
            <i class="fas fa-times-circle"></i>
            {{ Session::get('error') }}
        </div>
    </div>
</div>
@endif
<!-- Breadcrumb -->
<section>
    <div class="container my-2 border-top border-bottom border-dark">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <div class="col-12">
                    <ul class="breadcrumb my-2">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="home-page">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item fw-bold text-success">Tài khoản của tôi</li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>
<!-- CONTENT -->
<div class="container">
    <div class="row justify-content-between">
        <div class="col-xxl-3 col-lg-4 col-md-12 col-12 sidebar-ttkh">
            <div class="top-infor">
                <div class="name-ttkh">
                    Xin chào
                    <h6 class="d-flex align-items-center mt-1">
                        <i class="far fa-user-circle fs-4 me-1"></i>
                        {!! $customer->ten !!}
                    </h6>
                </div>
            </div>
            <div class="sidebar-menu-ttkh">
                <div class="sidebar-item">
                    <a class="py-2 sidebar-item-link" href="{{ route('thongtinkh') }}">
                        <i class="fas fa-address-card icon-ttkh"></i>
                        <span>Thông tin cá nhân</span>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a class="py-2 sidebar-item-link" href="{{ route('thongtinkh.doimatkhau') }}">
                        <i class="fas fa-unlock-alt icon-ttkh"></i>
                        <span>Thay đổi mật khẩu</span>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a class="py-2 sidebar-item-link" href="{{ route('thongtinkh.lichsumuahang') }}">
                        <i class="fas fa-file-invoice icon-ttkh"></i>
                        <span>Lịch sử mua hàng</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xxl-9 col-lg-8 col-md-12 col-12 content-ttkh">
            <div class="inner-ttkh main-ttkh">
                <form method="POST" action="{{ route('thongtinkh.update') }}">
                    @csrf @method('PUT')
                    <h3 class="title-inner-ttkh">Thông tin cá nhân</h3>
                    <div class="main-info-ttkh">
                        <input type="hidden" value="{{ $customer->id }}" name="id">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Họ tên</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-success" name="ten" value="{{ $customer->ten }}">

                                @error('ten')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Số điện thoại</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-success" name="sdt" value="{{ $customer->sdt }}">

                                @error('sdt')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Ngày sinh</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control form-success" name="ngaysinh" value="{{ $customer->ngaysinh }}">

                                @error('ngaysinh')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row d-flex align-items-center mb-3">
                            <label class="col-sm-3 col-form-label">Giới tính</label>
                            <div class="col-sm-7 d-flex">
                                @if($customer->gioitinh == 1)
                                <div class="form-check">
                                    <input class="form-check-input check-input-custom" type="radio" id="gtNam" name="gioitinh" value="1" checked>
                                    <label class="form-check-label pe-4" for="gtNam">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input check-input-custom" type="radio" id="gtNu" name="gioitinh" value="0">
                                    <label class="form-check-label" for="gtNu">
                                        Nữ
                                    </label>
                                </div>
                                @else
                                <div class="form-check">
                                    <input class="form-check-input check-input-custom" type="radio" id="gtNam" name="gioitinh" value="1">
                                    <label class="form-check-label pe-4" for="gtNam">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input check-input-custom" type="radio" id="gtNu" name="gioitinh" value="0" checked>
                                    <label class="form-check-label" for="gtNu">
                                        Nữ
                                    </label>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Địa chỉ</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-success" name="diachi" value="{{ $customer->diachi }}">

                                @error('diachi')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3"></label>
                            <div class="col-sm-7">
                                <input type="submit" class="btn btn-success w-50" value="Cập nhật">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop()
@section('js')
<script>
    // Active class based on URL - CUSTOMER PAGE
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('.sidebar-item a');
    const menuLength = menuItem.length;
    for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].className = "sidebar-item-link sidebar-active"
        }
    }
</script>
@stop()