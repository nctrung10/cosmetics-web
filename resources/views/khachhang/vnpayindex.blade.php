<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thanh toán qua VNPAY</title>
    <!-- Bootstrap core CSS -->
    <!-- <link href="{{ asset('/vnpay_php/assets/bootstrap.min.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('/frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('/vnpay_php/assets/jumbotron-narrow.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="header clearfix pb-0">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="text-muted mt-2">THANH TOÁN QUA VNPAY</h3>
                <img src="{{ asset('/frontend/image/icon-vnpay.png') }}" style="width: 100px;">
            </div>
        </div>
        <h3 class="mb-3">Tạo mới đơn hàng</h3>
        <div class="table-responsive px-1">
            <form action="{{ route('payment.online') }}" id="create_form" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="h6">Loại hàng hóa </label>
                    <select name="order_type" class="form-control">
                        <option value="billpayment">Thanh toán hóa đơn</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="h6 mb-0">Số tiền thanh toán:</label>
                    <span class="fw-bold text-success">{{ number_format($tongtien)}} VND</span>
                    <input class="form-control" name="amount" type="hidden" value="{{ (int)$tongtien }}" />
                </div>
                <div class="form-group mb-3">
                    <label class="h6">Nội dung thanh toán</label>
                    <textarea class="form-control" cols="20" name="order_desc" rows="2">Thanh toán đơn hàng</textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="h6">Ngân hàng</label>
                    <select name="bank_code" class="form-control">
                        <option value="">Không chọn</option>
                        <option value="NCB"> Ngân hàng NCB</option>
                        <option value="AGRIBANK"> Ngân hàng Agribank</option>
                        <option value="SCB"> Ngân hàng SCB</option>
                        <option value="SACOMBANK">Ngân hàng SacomBank</option>
                        <option value="EXIMBANK"> Ngân hàng EximBank</option>
                        <option value="MSBANK"> Ngân hàng MSBANK</option>
                        <option value="NAMABANK"> Ngân hàng NamABank</option>
                        <option value="VNMART"> Ví điện tử VnMart</option>
                        <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                        <option value="VIETCOMBANK"> Ngân hàng VCB</option>
                        <option value="HDBANK">Ngân hàng HDBank</option>
                        <option value="DONGABANK"> Ngân hàng Dong A</option>
                        <option value="TPBANK"> Ngân hàng TPBank</option>
                        <option value="OJB"> Ngân hàng OceanBank</option>
                        <option value="BIDV"> Ngân hàng BIDV</option>
                        <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                        <option value="VPBANK"> Ngân hàng VPBank</option>
                        <option value="MBBANK"> Ngân hàng MBBank</option>
                        <option value="ACB"> Ngân hàng ACB</option>
                        <option value="OCB"> Ngân hàng OCB</option>
                        <option value="IVB"> Ngân hàng IVB</option>
                        <option value="VISA"> Thanh toán qua VISA/MASTER</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="h6">Ngôn ngữ</label>
                    <select name="language" class="form-control">
                        <option value="vn">Tiếng Việt</option>
                        <option value="en">English</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
                <button type="button" class="btn btn-secondary" onclick="history.back()">Quay lại</button>
            </form>
        </div>
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; VNPAY 2015</p>
        </footer>
    </div>
    <link href="{{ asset('https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css') }}" rel="stylesheet" />
    <script src="{{ asset('https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js') }}"></script>
    <script src="{{ asset('/vnpay_php/assets/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript">
        $("#btnPopup").click(function() {
            var postData = $("#create_form").serialize();
            var submitUrl = $("#create_form").attr("action");
            $.ajax({
                type: "POST",
                url: submitUrl,
                data: postData,
                dataType: 'JSON',
                success: function(x) {
                    if (x.code === '00') {
                        if (window.vnpay) {
                            vnpay.open({
                                width: 768,
                                height: 600,
                                url: x.data
                            });
                        } else {
                            location.href = x.data;
                        }
                        return false;
                    } else {
                        alert(x.Message);
                    }
                }
            });
            return false;
        });
    </script>


</body>

</html>