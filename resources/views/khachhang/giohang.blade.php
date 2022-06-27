@extends('master')

@section('title', 'Giỏ hàng')

@section('content')
<!-- NOTICE -->
@if(Session::has('error'))
<div class="position-fixed top-50 start-50 translate-middle" style="z-index: 11">
    <div class="toast text-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-warning text-dark py-3">
            <strong class="mx-auto">THÔNG BÁO</strong>
        </div>
        <div class="toast-body bg-white fw-bold py-3">
            <i class="fas fa-exclamation-triangle"></i>
            {{ Session::get('error') }}
            <div class="mt-4 pt-4 pb-2 border-top border-dark">
                <a href="{{ route('dangnhap') }}" class="btn btn-outline-success">Đăng nhập</a>
                <button type="button" class="btn btn-outline-secondary " data-bs-dismiss="toast">Hủy</button>
            </div>
        </div>
    </div>
</div>
@endif
@if(Session::has('error_vnp'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div class="toast text-center" data-bs-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-center">
                <strong class="mx-auto text-dark">THÔNG BÁO</strong>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-danger text-white" style="font-weight: 500;">
                <i class="far fa-times-circle"></i>
                {{ Session::get('error_vnp') }}
            </div>
        </div>
    </div>
@endif
@if(empty(session('cart')))
<!-- Empty Cart -->
<div class="empty-cart">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <img src="{{url('frontend')}}/image/empty-cart.png" alt="Giỏ hàng trống">
                    <p class="mt-3">Chưa có sản phẩm nào trong giỏ hàng của bạn.</p>
                    <a class="btn btn-submit-custom w-auto" href="{{ url('/') }}">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<!-- Cart with products -->
<div class="cart my-5">
    <div class="container">
        <h2 class="title-shopping-cart">Giỏ hàng</h2>
        <div class="cart-content">
            <div class="row">
                <div class="col-xxl-8 col-lg-8 col-md-12 col-12 table-responsive">
                    <table class="table shopping-cart-table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-start">Sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tạm tính</th>
                            </tr>
                        </thead>
                        <tbody class="shopping-cart-tbody">
                            @foreach($cart->items as $ci)
                            <tr>
                                <td>
                                    <a href="{{ route('cart.remove',['id'=>$ci['id']]) }}" class="del-shopping-cart-item">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td class="shopping-cart-item">
                                    <div class="row align-items-center">
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-12 text-center px-0">
                                            <img src="{{url('uploads')}}/{{ $ci['hinhanh'] }}">
                                        </div>
                                        @foreach($item as $i)
                                        @if($i->id == $ci['id'])
                                        <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                                            <a href="{{ route('view',$i->slug) }}">
                                                {{ $ci['ten'] }}
                                            </a>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </td>
                                <td>{{ number_format($ci['gia']).'đ' }}</td>
                                <td>
                                    @foreach($item as $i)
                                    @if($i->id == $ci['id'])
                                    <form action="{{ route('cart.update',['id'=> $ci['id']]) }}" method="GET" class="input-group input-group-sm justify-content-center">
                                        <input type="number" data-id="{{ $ci['id'] }}" value="{{ $ci['quantity'] }}" name="quantity" min="1" max="{{$i->soluong}}" 
                                        class="form-control shopping-cart-quantity form-success-3" aria-describedby="button-addon2">
                                        <button type="submit" class="btn btn-secondary" id="button-addon2" data-bs-toggle="tooltip" title="Cập nhật">
                                            <i class="fas fa-save"></i>
                                        </button>
                                    </form>
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ number_format($ci['gia']*$ci['quantity']).'đ' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="shopping-cart-action">
                        <a href="{{ url('/') }}" class="btn btn-sm btn-dark">Tiếp tục mua hàng</a>
                        <a href="{{ route('cart.clear') }}" class="btn btn-sm btn-danger float-end ms-1">Xóa toàn bộ</a>
                        <button class="btn btn-sm py-2 btn-dark float-end update-all">Cập nhật tất cả</button>
                    </div>
                </div>

                <div class="col-xxl-4 col-lg-4 col-md-12 col-12">
                    <div class="card shopping-cart-coupon mb-3">
                        <div class="card-body">
                            <p class="cart-coupon-title mb-1">mã giảm giá</p>
                            @if(Session::has('success'))
                            <div class="toast align-items-center bg-success mb-1" data-bs-delay="1500" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body text-white py-1">
                                        <i class="fa fa-check-circle"></i>
                                        {{ Session::get('success') }}
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(Session::has('wrong'))
                            <div class="toast align-items-center bg-danger mb-1" data-bs-delay="1500" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body text-white py-1">
                                        <i class="fa fa-exclamation-circle"></i>
                                        {{ Session::get('wrong') }}
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            <form method="POST" action="{{ route('cart.voucher') }}">
                                @csrf
                                <input type="text" placeholder="Nhập mã giảm giá (nếu có)" name="ma_gg" class="form-control form-success-3" autocomplete="off">
                                <button type="submit" class="btn btn-sm btn-success px-3 mt-2">Áp dụng</button>
                                @if(Session::has('voucher'))
                                <a href="{{ route('delVoucher') }}" class="btn btn-sm bg-secondary mt-2 text-white">
                                    <i class="fa fa-times fs-6 pe-2"></i>
                                    @foreach(Session::get('voucher') as $cou)
                                    <span class="text-uppercase">{{ $cou['ma_gg'] }}</span> 
                                    @endforeach
                                </a>
                                @endif
                            </form>
                            
                        </div>
                    </div>

                    <div class="card shopping-cart-total mb-3">
                        <div class="card-body cart-total-body">
                            <span>Thành tiền</span>
                            <p>{{ number_format($cart->total_price).'đ' }}</p>
                        </div>
                        
                        <div class="card-body cart-total-body">
                            <span>Giảm giá</span>
                            @if(Session::has('voucher'))
                                @foreach(Session::get('voucher') as $cou)
                                    @if($cou['hinhthuc'] == 1)
                                        <?php 
                                            $total_voucher = ($cart->total_price*$cou['giatri'])/100
                                        ?>
                                        <p>{{$cou['giatri']}}%</p>
                                    @elseif($cou['hinhthuc'] == 2)
                                        <?php 
                                            $total_voucher = $cou['giatri']
                                        ?>
                                        <p>{{ number_format($cou['giatri']) }}đ</p>
                                    @endif
                                @endforeach
                            @else
                            <p>0đ</p>
                            @endif
                        </div>
                        <div class="card-body cart-total-body">
                            <span>Phí vận chuyển (đồng giá)</span>
                            <p>
                                <?php 
                                    if($cart->total_price>600000){
                                        echo '0đ';
                                    }else {
                                        echo '+30.000đ';
                                    }
                                ?>
                            </p>
                            <div class="mt-1 text-secondary" style="font-size:14px">Miễn phí vận chuyển với đơn hàng trên 600k.</div>
                        </div>
                        <div class="card-footer">
                            <p>
                                <span class="fw-bold">Tổng tiền</span>
                                <span class="cart-total-price">
                                    <?php
                                    if($cart->total_price<600000){
                                        $ship = 30000;
                                    }else{
                                        $ship = 0;
                                    }
                                    ?>
                                    @if(Session::has('voucher'))
                                        @if($total_voucher > $cart->total_price)
                                        {{ number_format($ship) }}đ
                                        @else
                                        {{ number_format($cart->total_price-$total_voucher+$ship).'đ' }}
                                        @endif
                                    @else
                                    {{ number_format($cart->total_price+$ship).'đ' }}
                                    @endif
                                </span>
                            </p>
                            <a href="{{ route('thanhtoan') }}" class="btn btn-submit-custom">Tiến Hành Thanh Toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@stop()
<!-- Update all cart -->
@section('js')
<script>
    $(".update-all").on("click", function() {
        var lists = [];
        //tạo vòng lặp từng dòng trong cart
        //tìm input value=quantity
        $("table tbody tr td form").each(function() {
            $(this).find("input").each(function() {
                var element = {
                    key: $(this).data("id"),
                    value: $(this).val()
                };
                lists.push(element);
            });
        });
        //xử lý ajax
        $.ajax({
            url: 'update-all',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "data": lists
            }
        }).done(function(response) {
            location.reload();
        });
    });
</script>
@stop()