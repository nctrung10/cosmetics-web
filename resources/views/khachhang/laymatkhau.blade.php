@extends('master')

@section('title', '| Phục hồi mật khẩu')

@section('content')
<!-- NOTICE -->
@if(Session::has('error'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div class="toast text-center" data-bs-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="mx-auto text-dark">LIÊN KẾT ĐÃ QUÁ HẠN</strong>
        </div>
        <div class="toast-body bg-danger text-white" style="font-weight: 500;">
            <i class="far fa-times-circle"></i>
            {{ Session::get('error') }}
        </div>
    </div>
</div>
@endif
<div class="container my-5 mx-auto">
    <div class="col-12 w-50 mx-auto">
        <h5 class="border border-0 border-bottom text-success">TẠO MẬT KHẨU MỚI</h5>
        <div class="col-12 mt-3">
            @php
                $token = $_GET['token'];
                $email = $_GET['email'];
            @endphp
            <form method="POST" action="">
                @csrf
                <div class="form-group mb-3">
                    <label class="h6 ps-1 mb-0">Nhập mật khẩu</label>
                    <input type="hidden" name="token" value="{{$token}}">
                    <input type="hidden" name="email" value="{{$email}}">
                    
                    <input type="text" autocomplete="off" class="form-control form-success" name="new_password">

                    @error('new_password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn-submit-custom w-50">
                        Tạo mật khẩu
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@stop()