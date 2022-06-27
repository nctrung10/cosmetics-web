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
                    <a class="py-2" href="{{ route('thongtinkh') }}">
                        <i class="fas fa-address-card icon-ttkh"></i>
                        <span>Thông tin cá nhân</span>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a class="py-2" href="{{ route('thongtinkh.doimatkhau') }}">
                        <i class="fas fa-unlock-alt icon-ttkh"></i>
                        <span>Thay đổi mật khẩu</span>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a class="py-2" href="{{ route('thongtinkh.lichsumuahang') }}">
                        <i class="fas fa-file-invoice icon-ttkh"></i>
                        <span>Lịch sử mua hàng</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xxl-9 col-lg-8 col-md-12 col-12 content-ttkh">
            <div class="inner-ttkh main-lsdh">
                <h3 class="title-inner-ttkh">Lịch sử mua hàng</h3>
                @if(count($donhang) == 0)
                <div class="inner-ttkh">
                    <div class="main-info-ttkh text-center">
                        <img src="{{url('frontend')}}/image/lsdh.png" style="width:180px;">
                        <div class="pb-3">
                            <span>Bạn chưa có đơn hàng nào</span>
                        </div>

                        <a href="{{ url('/') }}" class="btn btn-success pt-2">Tiếp tục mua hàng</a>
                    </div>
                </div>
                @else
                <!-- Có đơn hàng -->
                @foreach($donhang as $dh)
                <form method="POST" action="" class="my-3">
                    <div class="main-info-ttkh order-history">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex flex-column">
                                <div>
                                    <span class="fw-bold">Đơn hàng</span>
                                    <span class="text-success fw-bold">#{{$dh->id}}</span>
                                </div>
                                <div>
                                    <span class="fw-bold">Ngày đặt hàng:</span>
                                    <span class="text-success h6">{{ date('d-m-Y H:i:s',strtotime($dh->created_at)) }}</span>
                                </div>
                                <div class="mt-1">
                                    <span class="fw-bold">Trạng thái đơn hàng:</span>
                                    @if($dh->trangthai == 2)
                                    <span class="badge bg-success status-order">Đã xác nhận</span>
                                    @elseif($dh->trangthai == 1)
                                    <span class="badge bg-primary status-order">Đang chờ xử lý</span>
                                    @else
                                    <span class="badge bg-danger status-order">Đã hủy</span>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Hình thức thanh toán:</span>
                                    <span class="text-success fw-bold">{{$dh->method->ten}}</span>
                                </div>
                            </div>
                            @if($dh->trangthai == 1)
                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#cancel_order_{{$dh->id}}">
                                Hủy đơn hàng
                            </a>

                            @elseif($dh->trangthai == 2)
                            <a href="#" class="btn btn-sm btn-danger disabled">
                                Không thể hủy
                            </a>
                            @endif

                        </div>
                        <table class="table table-responsive-lg table-bordered border-secondary table-order-history">
                            <thead>
                                <tr>
                                    <th scope="col">Sản Phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col" class="text-end">Giá thành</th>
                                </tr>
                            </thead>
                            <tbody class="info-ordered-product">
                                @foreach($dh->details as $dd)
                                <tr>
                                    <td>{{$dd->product->ten}}</td>
                                    <td>{{$dd->soluong}}</td>
                                    <td class="text-end">{{number_format($dd->product->gia_ban)}}đ</td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tbody>
                                <?php
                                $tamtinh = 0;
                                foreach ($dh->details as $data) {
                                    $tamtinh += $data->tonggia;
                                }
                                ?>
                                <tr>
                                    <td colspan="2" class="text-end h6">Tạm tính</td>
                                    <td class="text-end">{{number_format($tamtinh)}}đ</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end h6">Phí vận chuyển</td>
                                    <td class="text-end">{{number_format($dh->phivanchuyen)}}đ</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end h6">Giảm giá</td>
                                    <td class="text-end">{{number_format($dh->gia_giam)}}đ</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end fw-bold">Tổng</td>
                                    <td class="text-end fw-bold">{{number_format($dh->tongtien)}}đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <!-- Modal Cancel Order -->
                <div class="modal fade" id="cancel_order_{{$dh->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title fw-bold text-uppercase" id="exampleModalLabel">Lý do hủy đơn hàng</h6>
                            </div>
                            <form action="{{ route('thongtinkh.huydonhang',$dh->id) }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$dh->id}}">
                                <div class="modal-body">
                                    <h6>Vui lòng nhập lý do hủy đơn hàng của bạn</h6>
                                    <div class="position-relative">
                                        <span style="position:absolute; top:7px; left:7px">Lý do hủy :</span>
                                        <input class="form-control form-success" type="text" name="lydohuy" style="padding-left:5.5rem;">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-success">Xác nhận</button>
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="phantrang my-2 fw-bold">
                    {{ $donhang->onEachSide(1)->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@stop()
@section('css')
<style>
    .phantrang .pagination {
        justify-content: center !important;
    }
    .page-link {
        color: #0b643b !important;
    }
    .page-link:focus {
        box-shadow: 0 0 0 0.25rem rgb(14 116 12 / 25%) !important;
    }
    .page-item.active .page-link {
        background-color: #0b643b !important;
        border-color: #0b643b !important;
        color: #fff !important;
    }
</style>
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