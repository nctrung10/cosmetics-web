@extends('adminmaster')

@section('title', 'Chi tiết đơn hàng')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-1">
                    <div class="logo-invoice text-center">
                        <span style="font-size:30px; font-weight:bold; font-family:cursive; color: #0b643b">
                            Eden Beauty
                        </span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="main-invoice-info bg-light p-2">
                        <div>
                            <span class="font-weight-bold">Đơn hàng</span>
                            #<span>{{ $donhang->id }}</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Ngày đặt hàng:</span>
                            <span>{{  date('d-m-Y H:i:s',strtotime($donhang->created_at))  }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="font-weight-bold">Hình thức thành toán:</span>
                            <span class="ml-1 text-secondary" style="font-weight: 600;">{{ $donhang->method->ten }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="font-weight-bold">Trạng thái:</span>
                            @if($donhang->trangthai == 1)
                            <span class="ml-1 text-primary" style="font-weight: 600;">Đang chờ xử lý</span>
                            @elseif( $donhang->trangthai == 2)
                            <span class="ml-1 text-success" style="font-weight: 600;">Đã xác nhận</span>
                            @else()
                            <span class="ml-1 text-danger" style="font-weight: 600;">Đã Hủy</span>
                            @endif
                        </div>
                    </div>
                    <div class="info-customer my-4">
                        <h5 class="text-uppercase">Thông tin người đặt hàng</h5>
                        <table class="table table-light">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Số điện thoại</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $donhang->cus->ten }}</td>
                                    <td>{{ $donhang->cus->sdt }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="info-customer my-4">
                        <h5 class="text-uppercase">Thông tin vận chuyển</h5>
                        <div>
                            <span class="font-weight-bold">Họ tên:</span>
                            {{ $donhang->tenKH }}
                        </div>
                        <div>
                            <span class="font-weight-bold">Số điện thoại:</span>
                            {{ $donhang->sdt  }}
                        </div>
                        <div>
                            <span class="font-weight-bold">Địa chỉ:</span>
                            {{ $donhang->diachi }}
                        </div>
                        <div>
                            <span class="font-weight-bold">Ghi chú:</span>
                            {{ $donhang->chuthich }}
                        </div>
                    </div>

                    <div class="info-order mt-4">
                        <h5 class="text-uppercase">Thông tin đơn hàng</h5>
                        <table class="table table-ordered-product">
                            <thead>
                                <tr>
                                    <th scope="col">Sản Phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col" class="text-right">Giá thành</th>
                                </tr>
                            </thead>
                            <tbody class="info-ordered-product">
                                @foreach($donhang->details as $data)
                                <tr>
                                    <td>{{$data->product->ten}}</td>
                                    <td>{{$data->soluong}}</td>
                                    <td class="text-right">{{number_format($data->product->gia_ban)}}đ</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="total-invoice card float-right">
                            <table class="table table-striped m-0">
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold pr-5">Tạm tính</td>
                                        <td class="text-right">{{number_format($tamtinh)}}đ</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold pr-5">Phí vận chuyển</td>
                                        <td class="text-right">{{number_format($donhang->phivanchuyen)}}đ</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold pr-5">Giảm giá</td>
                                        <td class="text-right">{{number_format($donhang->gia_giam)}}đ</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-success pr-5">Tổng tiền</td>
                                        <td class="text-right h5">{{number_format($donhang->tongtien)}}đ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card-footer">
                <form action="{{ route('donhang.update',$donhang->id) }}" method="POST" class="m-0">
                    @csrf @method('PUT')
                    <div class="row align-items-center">
                        <?php $i = 0;
                        $y = 0; ?>
                        @foreach($donhang->details as $data)
                        <?php $y++ ?>
                        @foreach($tatcasanpham as $allsp)
                        @if($allsp->id == $data->sanpham_id)
                        @if($allsp->soluong >= $data->soluong)
                        <?php $i++; ?>
                        @endif
                        @endif
                        @endforeach
                        @endforeach
                        <!-- if dem du so luong ton trong kho -->
                        @if($i == $y)
                        <div class="col-auto">
                            <span class="font-weight-bold">Thay đổi trạng thái:</span>
                        </div>
                        @if($donhang->trangthai == 1)
                        <div class="col-auto">
                            <select name="trangthai" class="form-control">
                                <option value="1">Đang chờ xử lý</option>
                                <option value="2">Đã xác nhận</option>
                                <option value="3">Hủy</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" onclick="return confirm('Bạn chắc muốn thay đổi trạng thái không?')" type="submit">Thay đổi</button>
                        </div>
                        @elseif($donhang->trangthai == 2)
                        <div class="col-auto">
                            <select name="trangthai" class="form-control" disabled>
                                <option value="2">Đã xác nhận</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-success" disabled type="button">Thay đổi</button>
                        </div>
                        <div class="col-auto">
                            <a target="_blank" href="{{ route('donhang.print',$donhang->id) }}" class="btn btn-primary">
                                <i class="fas fa-print"></i>
                            </a>
                        </div>
                        @else
                        <div class="col-auto">
                            <select name="trangthai" class="form-control" disabled>
                                <option value="2">Đã hủy</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-danger" disabled type="button">Thay đổi</button>
                        </div>
                        @endif

                        <div class="col">
                            <a href="{{ route('donhang.index') }}"><button type="button" class="btn btn-secondary" style="width:100px; float:right;">Quay lại</button></a>
                        </div>
                        @else
                        <!-- neu khong du so luong ton -->
                        <div class="col-auto">
                            <span class="h6 mb-0">Thay đổi trạng thái:</span>
                        </div>
                        @if($donhang->trangthai == 1)
                        <div class="col-auto">
                            <select name="trangthai" class="form-control">
                                <option value="1">Đang chờ xử lý</option>
                                <option value="3">Hủy</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" onclick="return confirm('Bạn chắc muốn thay đổi trạng thái không?')" type="submit">Thay đổi</button>
                        </div>
                        <div class="col">
                            <span class="text-danger">Số lượng tồn kho không đủ</span>
                        </div>
                        @else
                        <div class="col-auto">
                            <select name="trangthai" class="form-control" disabled>
                                <option value="3">Đã Hủy</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-danger" disabled>Thay đổi</button>
                        </div>
                        <div class="col">
                            <span class="text-danger">Số lượng tồn kho không đủ</span>
                        </div>
                        @endif
                        <div class="col">
                            <a href="{{ route('donhang.index') }}"><button type="button" class="btn btn-secondary" style="width:100px; float:right;">Quay lại</button></a>
                        </div>
                        @endif
                        <!-- endif dem so luong ton -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop()