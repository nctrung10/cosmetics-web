<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eden Beauty | Hóa đơn mua hàng</title>
</head>
<style>
    body {
        font-family: DejaVu Sans;
    }
    .title {
        font-weight: 400;
        font-size: 16px;
        margin: 0 0 10px 0;
    }
    .fw-bold {
        font-weight: bold;
        font-size: 14px;
    }
    .my-div {
        margin-top: 1rem !important;
        margin-bottom: 1rem !important;
    }
    .text-right {
        text-align: right !important;
    }
    .text-success {
        font-weight: bold;
        color: #28a745!important;
    }
    .h6 {
        font-size: 14px;
    }
    .h5 {
        font-size: 17px;
    }
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: transparent;
        border-collapse: collapse;
    }
    table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    th {
        text-align: -webkit-match-parent;
    }
    .table td, .table th {
        padding: 0.5rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .main-invoice-info {
        background-color: #f8f9fa!important;
        padding: .5rem;
    }
    .thanks {
        clear:right !important; 
        text-align:center;

    }
</style>

<body>
    <div style="display:inline-block; margin-bottom:0 !important">
        <img src="{{ public_path('frontend/image/logo.png') }}" width="70" height="70">
        <div style="display:inline-block;padding-bottom:16px; font-size:30px; font-weight:bold; font-family:sans-serif; color:#0b643b;">Eden Beauty</div> 
    </div>
    <div style="margin-bottom: 1.5rem;">
        <div style="text-align:center">
            <span style="color:#6c757d; font-size:18px">
                Hóa Đơn Mua Hàng
            </span>
        </div>
    </div>
    <div>
        <div class="main-invoice-info">
            <div>
                <span class="fw-bold">Đơn hàng</span>
                #<span>{{ $donhang->id }}</span>
            </div>
            <div>
                <span class="fw-bold">Ngày đặt hàng:</span>
                <span>{{ date('d-m-Y H:i:s',strtotime($donhang->created_at)) }}</span>
            </div>
            <div>
                <span class="fw-bold">Hình thức thành toán:</span>
                <span style="color:#6c757d!important">{{ $donhang->method->ten }}</span>
            </div>
        </div>
        <hr>
        <!-- <div class="my-div">
            <p class="title">THÔNG TIN KHÁCH HÀNG</p>
            <div>
                <span class="fw-bold">Tên khách hàng:</span>
                {{ $donhang->cus->ten }}
            </div>
            <div>
                <span class="fw-bold">Số điện thoại:</span>
                {{ $donhang->cus->sdt }}
            </div>
        </div>
        <hr> -->
        <div class="my-div">
            <p class="title">THÔNG TIN VẬN CHUYỂN</p>
            <div>
                <span class="fw-bold">Họ tên:</span>
                {{ $donhang->tenKH }}
            </div>
            <div>
                <span class="fw-bold">Số điện thoại:</span>
                {{ $donhang->sdt  }}
            </div>
            <div>
                <span class="fw-bold">Địa chỉ:</span>
                {{ $donhang->diachi }}
            </div>
            <div>
                <span class="fw-bold">Ghi chú:</span>
                {{ $donhang->chuthich }}
            </div>
        </div>
        <hr>
        <div class="my-div" style="font-size: 13px;">
            <p class="title">THÔNG TIN ĐƠN HÀNG</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản Phẩm</th>
                        <th style="text-align: center;">Số lượng</th>
                        <th class="text-right">Giá thành</th>
                    </tr>
                </thead>
                <tbody style="font-size: 14px;">
                    @foreach($donhang->details as $data)
                    <tr>
                        <td>{{$data->product->ten}}</td>
                        <td style="text-align: center;">{{$data->soluong}}</td>
                        <td class="text-right">{{number_format($data->product->gia_ban)}}đ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="float: right !important;">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="fw-bold">Tạm tính</td>
                            <td class="text-right h6">{{number_format($tamtinh)}}đ</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Phí vận chuyển</td>
                            <td class="text-right h6">{{number_format($donhang->phivanchuyen)}}đ</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Giảm giá</td>
                            <td class="text-right h6">{{number_format($donhang->gia_giam)}}đ</td>
                        </tr>
                        <tr>
                            <td class="h5 text-success">Tổng tiền</td>
                            <td class="text-right h5">{{number_format($donhang->tongtien)}}đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="thanks">
        Cảm ơn bạn đã mua hàng!
        <p>Mọi thắc mắc xin vui lòng liên hệ qua <span style="color: #0b643b;">eden.beautycare@gmail.com</span></p>
    </div>
</body>

</html>