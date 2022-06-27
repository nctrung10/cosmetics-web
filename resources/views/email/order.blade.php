<div style="width:600px; margin: 1.5rem auto; padding-right: var(--bs-gutter-x,.75rem); padding-left: var(--bs-gutter-x,.75rem);">
    <h1 style="color: #198754;">
        Eden Beauty
        <span style="float: right; font-size: 15px; color: #777; font-weight: normal;">
        Đơn hàng #{{ $donhang->id }}
        </span>
    </h1>
    <h2>Cảm ơn bạn đã mua hàng!</h2>
    <p style="color:gray; font-size:16px">
        Xin chào {{$kh_ten}}, cảm ơn bạn đã lựa chọn sản phẩm của Eden Beauty.
        Bộ phận chăm sóc khách hàng của chúng tôi sẽ liên hệ với bạn sớm nhất có thể để xác nhận đơn hàng.
    </p>

    <div style="border-top: 1px solid; padding: 1.5rem 0;">
        <h3 style="font-size: 16px; margin-top:0">THÔNG TIN ĐƠN HÀNG</h3>
        <p style="font-size: 15px;">Ngày đặt hàng: 
            <span style="font-size:16px; color:#777;">{{ date('d-m-Y H:i:s',strtotime($donhang->created_at)) }}</span>
        </p>
        <table cellspacing="0" cellpadding="10" style="width:100%; border:1px solid #198754; border-collapse:collapse;">
            <tbody>
                @foreach($items as $ci)
                <tr style="border:1px solid #198754;">
                    <td style="width:60px">
                        <img src="{{$message->embed(public_path().'/uploads/'.$ci['hinhanh'])}}" height="60" width="60" style="vertical-align:middle;">
                    </td>
                    <td style="width:260px">
                        {{ $ci['ten'] }}
                    </td>
                    <td>
                        {{ number_format($ci['gia']).'đ' }}
                        x
                        <span>{{ $ci['quantity'] }}</span>
                    </td>
                    <td>
                        {{ number_format($ci['gia']*$ci['quantity']).'đ' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="border-top: 1px solid; padding: 1.5rem 0; font-size: 16px;">
        <div>Tổng giá trị sản phẩm
            <span style="float:right; font-weight:bold">
                {{ number_format($cart->total_price).'đ' }}
            </span>
        </div>
        <div>Khuyến mãi
            <span style="float:right; font-weight:bold">
                {{ number_format($donhang->gia_giam).'đ' }}
            </span>
        </div>
        <div>Phí vận chuyển
            <span style="float:right; font-weight:bold">
                {{ number_format($donhang->phivanchuyen).'đ' }}
            </span>
        </div>
        <div>
            <span style="font-weight:bold">Tổng cộng</span>
            <span style="font-weight:bold; font-size:20px; float:right; color: #198754">
                {{ number_format($donhang->tongtien).'đ' }}
            </span>
        </div>
    </div>

    <div style="border-top: 1px solid; padding: 1.5rem 0">
        <h3 style="font-size: 16px; margin-top:0">THÔNG TIN KHÁCH HÀNG</h3>
        <p style="font-size: 15px; margin:0 0 5px 0;">Tên khách hàng: 
            <span style="color: #777; font-size: 16px;">{{$kh_ten}}</span>
        </p>
        <p style="font-size: 15px; margin:0 0 5px 0;">Số điện thoại: 
            <span style="color: #777; font-size: 16px;">{{$kh_sdt}}</span>
        </p>
        <p style="font-size: 15px; margin:0 0 5px 0;">Địa chỉ: 
            <span style="color: #777; font-size: 16px;">{{$kh_diachi}}</span>
        </p>
    </div>

    <div style="border-top: 1px solid; padding: 1.5rem 0">
        <h3 style="font-size: 16px; margin-top:0">THÔNG TIN VẬN CHUYỂN</h3>
        <p style="font-size: 15px; margin:0 0 5px 0;">Tên người nhận: 
            <span style="color: #777; font-size: 16px;">{{$donhang->tenKH}}</span>
        </p>
        <p style="font-size: 15px; margin:0 0 5px 0;">Số điện thoại: 
            <span style="color: #777; font-size: 16px;">{{$donhang->sdt}}</span>
        </p>
        <p style="font-size: 15px; margin:0 0 5px 0;">Địa chỉ nhận hàng: 
            <span style="color: #777; font-size: 16px;">{{$donhang->diachi}}</span>
        </p>
        <p style="font-size:15px; margin:0 0 5px 0;">Hình thức thanh toán: 
            <span style="color: #777; font-size: 16px;">{{$donhang->method->ten}}</span>
        </p>
        @if(isset($donhang->chuthich))
        <p style="font-size: 15px; margin:0 0 5px 0;">Chú thích: 
            <span style="color: #777; font-size: 16px;">{{$donhang->chuthich}}</span>
        </p>
        @else
        <p style="font-size: 15px; margin:0 0 5px 0;">Chú thích: 
            <span style="color: #777; font-size: 16px;">Không</span>
        </p>
        @endif
    </div>
</div>