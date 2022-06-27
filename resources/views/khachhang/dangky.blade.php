@extends('master')

@section('title', '| Đăng ký')

@section('content')
<div class="container my-5 mx-auto">
    <div class="row">
        <div class="register-page-pic col-xxl-5 col-lg-5 d-xxl-flex d-lg-flex d-md-none d-none">
            <img src="{{url('frontend')}}/image/logo.png" />
        </div>

        <div class="login-form col-xxl-7 col-lg-7 col-md-12 col-12">
            <h5 class="text-center fw-bold mb-4">ĐĂNG KÝ TÀI KHOẢN</h5>
            <form method="POST" action="{{ route('dangky.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" class="form-control form-success-2" name="ten" placeholder="Họ tên của bạn*" value="{{old('ten')}}">

                    @error('ten')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control form-success-2" name="sdt" placeholder="Số điện thoại*" value="{{old('sdt')}}">

                    @error('sdt')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group d-flex mb-3">
                    <div class="form-check">
                        <input class="form-check-input check-input-custom" name="gioitinh" value="1" type="radio" id="gtNam" checked>
                        <label class="form-check-label pe-4" for="gtNam">
                            Nam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input check-input-custom" name="gioitinh" value="0" type="radio" id="gtNu">
                        <label class="form-check-label" for="gtNu">
                            Nữ
                        </label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control form-success-2" name="diachi" placeholder="Địa chỉ*" value="{{old('diachi')}}">

                    @error('diachi')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control form-success-2" name="email" placeholder="Email*" value="{{old('email')}}">

                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="password" class="form-control form-success-2" name="password" placeholder="Mật khẩu*">

                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="password" class="form-control form-success-2" name="confirm_matkhau" placeholder="Nhập lại mật khẩu*" value="{{old('confirm_matkhau')}}">

                    @error('confirm_matkhau')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn-submit-custom" name="dky">
                        Đăng ký
                    </button>
                </div>
                <div class="sign-up mb-4">
                    Bạn đã có tài khoản? Vui lòng
                    <a href="{{ route('dangnhap') }}" class="badge bg-danger">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop()