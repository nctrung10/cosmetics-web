@extends('master')

@section('title', '| Liên hệ')

@section('content')
<!-- NOTICE -->
@if(Session::has('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div class="toast text-center" data-bs-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="mx-auto text-dark">THÔNG BÁO</strong>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-success text-white" style="font-weight: 500;">
                <i class="fas fa-check-circle"></i>
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
@endif
<div class="container my-5 mx-auto">
    <h5 class="border border-0 border-bottom text-success">GỬI THÔNG TIN LIÊN HỆ</h5>
    <div class="row">
        
        <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-3">
            <form method="POST" action="">
                @csrf
                <div class="form-group mb-3">
                    <label class="h6 ps-1 mb-0">Họ tên *</label>
                    <input type="text" class="form-control form-success" name="ten" value="{{old('ten')}}">
                  
                    @error('ten')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="h6 ps-1 mb-0">Địa chỉ email *</label>
                    <input type="text" class="form-control form-success" name="email" value="{{old('email')}}">
                    
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="h6 ps-1 mb-0">Số điện thoại *</label>
                    <input type="text" class="form-control form-success" name="sdt" value="{{old('sdt')}}">
                  
                    @error('sdt')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="h6 ps-1 mb-0">Nội dung</label>
                    <textarea class="form-control form-success" name="noidung"></textarea>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn-submit-custom w-50">
                        Gửi liên hệ
                    </button>
                </div>
            </form>
        </div>

        <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-3">
            <h5 class="fw-bold mb-4">Liên hệ với chúng tôi</h5>
            <div class="contact-header mb-3">
                <b>Eden Beauty</b> 
                - Hệ thống phân phối mỹ phẩm, sản phẩm chăm sóc da chính hãng của các thương hiệu nổi tiếng
                từ Hàn Quốc, Nhật Bản, Mỹ, Đức, Pháp,...
            </div>
            <div class="contact-address mb-3">
                <i class="fas fa-map-marker-alt me-2 fa-fw"></i>
                <b>Địa chỉ:</b>
                3/2, Ninh Kiều, Cần Thơ, Việt Nam
            </div>
            <div class="contact-phone mb-3">
                <i class="fas fa-phone me-2 fa-fw"></i>
                <b>Hotline:</b>
                <a href="tel:0909210999">0909.210.999</a> 
            </div>
            <div class="contact-email mb-3">
                <i class="fas fa-envelope me-2 fa-fw"></i>
                <b>Email:</b>
                eden.beautycare99@gmail.com
            </div>
        </div>
        <div class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.841518408624!2d105.76842661471194!3d10.02993369283066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1637741219357!5m2!1svi!2s" 
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
@stop()

@section('js')
<script>
    
</script>
@stop()