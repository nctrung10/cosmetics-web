@extends('master')

@section('title', 'Thanh toán đơn hàng')

@section('content')
<!-- NOTICE -->
@if(Session::has('error'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div class="toast text-center" data-bs-delay="3500" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header text-center">
            <strong class="mx-auto text-dark">THÔNG BÁO</strong>
            <button type="button" class="btn-close ms-0" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-danger text-white" style="font-weight: 500;">
            <i class="far fa-times-circle"></i>
            {{ Session::get('error') }}
        </div>
    </div>
</div>
@endif
<!-- Breadcrumb -->
<section>
    <div class="container">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <div class="col-12">
                    <ul class="breadcrumb mt-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('cart.view') }}" class="home-page">Quay lại giỏ hàng</a>
                        </li>
                        <li class="breadcrumb-item text-success fw-bold">Thanh toán đơn hàng</li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>
<!-- CONTENT -->
<div class="container mb-5">
    <h6 class="text-uppercase pt-3">địa chỉ nhận hàng</h6>
    <hr>
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xxl-7 col-md-12 col-12">
                <div class="form-group mb-3">
                    <label class="form-label h6">Họ tên người nhận</label>
                    <input type="text" class="form-control form-success" name="tenKH" value="{{ Auth::guard('cus')->user()->ten }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label h6">Số điện thoại</label>
                    <input type="text" class="form-control form-success" name="sdt" value="{{ Auth::guard('cus')->user()->sdt }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label h6">Email</label>
                    <input type="email" class="form-control form-success" name="email" value="{{ Auth::guard('cus')->user()->email }}">
                </div>
                <!-- <div class="form-group mb-3">
                    <label class="form-label h6">Tỉnh/Thành phố</label>
                    <select class="form-select form-success" aria-label="Default select example">
                        <option selected>Chọn Tỉnh/Thành phố</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label h6">Quận/Huyện</label>
                    <select class="form-select form-success" aria-label="Default select example">
                        <option selected>Chọn Quận/Huyện</option>
                        <option value="1">4</option>
                        <option value="2">5</option>
                        <option value="3">6</option>
                    </select>
                </div> -->
                <div class="form-group mb-3">
                    <label class="form-label h6">Địa chỉ nhận hàng</label>
                    <input type="text" class="form-control form-success" name="diachi" value="{{ Auth::guard('cus')->user()->diachi }}" placeholder="Số nhà, đường, phường/xã...">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label h6">Ghi chú <span class="fw-normal">(không bắt buộc)</span></label>
                    <textarea type="text" class="form-control form-success" rows="5" name="chuthich" placeholder="VD: Giao hàng vào buổi sáng/chiều"></textarea>
                </div>
            </div>

            <div class="col-xxl-5 col-md-12 col-12">
                <div class="card mb-3 border-dark">
                    <div class="card-body">
                        <h6 class="mb-3">ĐƠN HÀNG CỦA BẠN</h6>
                        <table class="table payment-item">
                            <thead>
                                <th class="text-start">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Tạm tính</th>
                            </thead>
                            <tbody>
                                @foreach($cart->items as $ci)
                                <tr>
                                    <td class="payment-item-name">
                                        {{ $ci['ten'] }}
                                    </td>
                                    <td>
                                        {{ number_format($ci['gia']).'đ' }}
                                        x
                                        <span class="payment-item-quantity">{{ $ci['quantity'] }}</span>
                                    </td>
                                    <td class="payment-item-price">
                                        {{ number_format($ci['gia']*$ci['quantity']).'đ' }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card mb-2 border-dark">
                    <div class="card-body">Thành tiền
                        <span class="float-end fw-bold">
                            {{ number_format($cart->total_price).'đ' }}
                            <input type="hidden" name="tonggia" value="{{$cart->total_price}}">
                        </span>
                    </div>
                    <div class="card-body">Giảm giá
                        @if(Session::has('voucher'))
                            @foreach(Session::get('voucher') as $cou)
                                @if($cou['hinhthuc'] == 1)
                                <?php
                                    $total_voucher = ($cart->total_price * $cou['giatri'])/100
                                ?>
                                <span class="float-end fw-bold">{{$cou['giatri']}}%</span>
                                @elseif($cou['hinhthuc'] == 2)
                                <?php
                                    $total_voucher = $cou['giatri']
                                ?>
                                <span class="float-end fw-bold">{{ number_format($cou['giatri']) }}đ</span>
                                @endif
                            @endforeach
                            @else
                            <span class="float-end fw-bold">0đ</span>
                        @endif
                    </div>
                    <div class="card-body">Phí vận chuyển
                        <span class="float-end fw-bold">
                            <?php
                            if ($cart->total_price > 600000) {
                                echo '0đ';
                            } else {
                                echo '+30.000đ';
                            }
                            ?>
                        </span>
                    </div>
                    <div class="card-footer">
                        <span class="price-total-title">Tổng</span>
                        <span class="price-total-value">
                            <?php
                            if ($cart->total_price < 600000) {
                                $ship = 30000;
                            } else {
                                $ship = 0;
                            }
                            ?>
                            @if(Session::has('voucher'))
                                {{ number_format($cart->total_price-$total_voucher+$ship).'đ' }}
                                <input type="hidden" name="voucher" value="{{$total_voucher}}">
                            @else
                                {{ number_format($cart->total_price+$ship).'đ' }}
                                <input type="hidden" name="voucher" value="0">
                            @endif
                            <input type="hidden" name="ship" value="{{$ship}}">
                        </span>
                    </div>
                    <hr class="line mt-0">
                    <!-- Choose Payment Method -->
                    <div class="payment-method card-body pt-0">
                        @foreach($paymethod as $pm)
                        <div class="mb-3">
                            <div class="form-check" data-bs-toggle="collapse" data-bs-target="#pay_{{$pm->id}}" aria-expanded="false" aria-controls="collapseExample">
                                <input class="form-check-input check-input-custom" name="httt_id" value="{{$pm->id}}" id="rad_{{$pm->id}}" type="radio">
                                
                                <label class="form-check-label" for="rad_{{$pm->id}}">
                                    <h6 class="m-0">
                                        {{ $pm->ten }}
                                    </h6>
                                </label>
                            </div>
                            <div class="collapse" id="pay_{{$pm->id}}">
                                <div class="card card-header">
                                    {{ $pm->mota }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group mb-4">
                    <button type="submit" class="btn btn-submit-custom" name="dathang">
                        Đặt Hàng
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@stop()