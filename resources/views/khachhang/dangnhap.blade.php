@extends('master')

@section('title', '| Đăng nhập')

@section('content')
<!-- NOTICE -->
@if(Session::has('error'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div class="toast text-center" data-bs-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-center">
                <strong class="mx-auto text-dark">ĐĂNG NHẬP THẤT BẠI</strong>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-danger text-white" style="font-weight: 500;">
                <i class="far fa-times-circle"></i>
                {{ Session::get('error') }}
            </div>
        </div>
    </div>
@endif
@if(Session::has('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div class="toast text-center" data-bs-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
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
@if(Session::has('error_email'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div class="toast text-center" data-bs-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-center">
                <strong class="mx-auto text-dark">THÔNG BÁO</strong>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-danger text-white" style="font-weight: 500;">
                <i class="far fa-times-circle"></i>
                {{ Session::get('error_email') }}
            </div>
        </div>
    </div>
@endif
@if(Session::has('success_email'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div class="toast text-center" data-bs-delay="2500" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-center">
                <strong class="mx-auto">GỬI EMAIL THÀNH CÔNG</strong>
            </div>
            <div class="toast-body bg-success text-white" style="font-weight: 500;">
                <i class="fas fa-check-circle"></i>
                {{ Session::get('success_email') }}
            </div>
        </div>
    </div>
@endif
<div class="container my-5 mx-auto">
    <div class="row">
        <div class="login-page-pic col-xxl-5 col-lg-5 d-xxl-flex d-lg-flex d-md-none d-none">
            <img src="{{url('frontend')}}/image/logo.png"/>
        </div>
        <div class="login-form col-xxl-7 col-lg-7 col-md-12 col-12">
            <h5 class="text-center fw-bold mb-4">ĐĂNG NHẬP THÀNH VIÊN</h5>
            <form method="POST" action="">
                @csrf
                <div class="form-group mb-3">
                    <label for="email_dn" class="h6 ps-1 mb-0">Email *</label>
                    <input type="text" class="form-control form-success-2" id="email_dn" 
                    placeholder="ex: example@gmail.com" name="email" value="{{old('email')}}">
                    
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="pass_dn" class="h6 ps-1 mb-0">Mật khẩu *</label>
                    <input type="password" class="form-control form-success-2" id="pass_dn" 
                    placeholder="" name="password">
                  
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group mb-4">
                    <div class="form-check d-inline-block">
                        <input class="form-check-input check-input-custom" type="checkbox" id="gridCheck" 
                        name="remember_token" value="1">
                        <label class="form-check-label" for="gridCheck">
                            Ghi nhớ đăng nhập
                        </label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn-submit-custom" name="dnhap">
                        Đăng nhập
                    </button>
                </div>
                <div class="form-group mb-4">
                    Quên mật khẩu của bạn?
                    <a href="#phuc-hoi-mat-khau" id="recoverPass" class="text-danger text-decoration-none">Nhấn vào đây</a>
                </div>
            </form>
            <hr>
            <!-- <div class="form-group mb-4">
                <div class="login-facebook d-inline-block">
                    <a href="#" class="btn text-white btn-login-fb">
                        <i class="fab fa-facebook-square fs-4 me-1"></i>
                        Đăng nhập bằng Facebook
                    </a>
                </div>
            </div> -->
            <div class="sign-up mb-4">
                Bạn chưa có tài khoản? Vui lòng
                <a href="{{ route('dangky') }}" class="badge bg-danger">Đăng ký</a>
            </div>
        </div>
        <!-- recover password -->
        <div class="recovery-form hidden col-xxl-7 col-lg-7 col-md-12 col-12">
            <form method="POST" action="{{ route('recoverypass') }}">
                @csrf
                <h5 class="fw-bold my-3">Phục hồi mật khẩu</h5>
                <p>Vui lòng nhập địa chỉ email. Bạn sẽ nhận được một liên kết tạo mật khẩu mới qua email.</p>
                <div class="form-group mb-4">
                    <input type="email" class="form-control form-success-2" required 
                    name="recoveryemail" placeholder="Nhập email của bạn" autocomplete="off">
                </div>
                <div class="form-group mb-3 w-50">
                    <button type="submit" class="btn-submit-custom">
                        Gửi
                    </button>
                </div>
                <div class="sign-up mb-4">
                    <a href="#" id="returnLogin" class="badge bg-danger">
                        <span class="h6 px-3">Hủy</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop()

@section('js')
<!-- show/hide form -->
<script>
    $(document).ready(function() {
        $('#recoverPass').click(function(event) {
            $('.login-form').addClass('hidden');
            $('.recovery-form').removeClass('hidden');
        });

        $('#returnLogin').click(function(event) {
            $('.login-form').removeClass('hidden');
            $('.recovery-form').addClass('hidden');
        });
    });
</script>
@stop()