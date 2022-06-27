<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thông tin thanh toán</title>
    <!-- Bootstrap core CSS -->
    <!-- <link href="{{ asset('/vnpay_php/assets/bootstrap.min.css') }}" rel="stylesheet"> -->
    <!-- Custom styles for this template -->
    <link href="{{ asset('/frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/vnpay_php/assets/jumbotron-narrow.css') }}" rel="stylesheet" />
    
</head>

<body>
    
    <div class="container">
        <div class="header clearfix pb-0">
            <div class="align-items-center justify-content-between d-xxl-flex d-lg-flex d-md-flex d-sm-none d-none">
                <h3 class="text-muted mt-2">THÔNG TIN ĐƠN HÀNG</h3>
                <img src="{{ asset('/frontend/image/icon-vnpay.png') }}" style="width: 100px;">
            </div>
            <div class="d-xxl-none d-lg-none d-md-none d-sm-block d-block text-center mb-2">
                <img src="{{ asset('/frontend/image/icon-vnpay.png') }}" style="width: 90px;">
                <h3 class="text-muted">THÔNG TIN ĐƠN HÀNG</h3>
            </div>
        </div>


        <form action="{{ route('vnpay.success') }}" method="POST">
            @csrf
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Mã giao dịch:</label>
                    <label>{{ $vnp_data['vnp_TxnRef'] }}</label>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Mã phản hồi:</label>
                    <label>{{ $vnp_data['vnp_ResponseCode'] }}</label>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Số tiền:</label>
                    <label>{{ number_format($vnp_data['vnp_Amount']/100) }} VNĐ</label>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Mã GD Tại VNPAY:</label>
                    <label>{{ $vnp_data['vnp_TransactionNo'] }}</label>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nội dung thanh toán:</label>
                    <label>{{ $vnp_data['vnp_OrderInfo'] }}</label>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Mã Ngân hàng:</label>
                    <label>{{ $vnp_data['vnp_BankCode'] }}</label>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="fw-bold">Thời gian thanh toán:</label>
                    <label>{{ date('Y-m-d H:i',strtotime($vnp_data['vnp_PayDate'])) }}</label>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="fw-bold">Kết quả:</label>
                    <label class="text-success h6 mb-0">Giao dịch thành công</label>
                </div>
            </div>
            <button class="btn btn-success mb-4" type="submit">
                Xác nhận
            </button>
        </form>

        <footer class="footer">
            <p>&copy; Eden Beauty</p>
        </footer>
    </div>

    <script src="{{ asset('/vnpay_php/assets/jquery-1.11.3.min.js') }}"></script>
</body>

</html>