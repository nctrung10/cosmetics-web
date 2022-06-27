<div style="width:600px; margin: 1.5rem auto; padding-right: var(--bs-gutter-x,.75rem); padding-left: var(--bs-gutter-x,.75rem);">
    <h1 style="color: #198754;">Eden Beauty</h1>
    <h2 style="color: red;">Hủy đơn hàng #{{ $donhang->id }}</h2>
    <p style="color:gray; font-size:16px">
        Xin chào tôi là {{$customer->ten}},
    </p>
    @if($lydohuy == '0')
    <p style="color:gray; font-size:16px">
        Tôi đã hủy đơn hàng #{{$donhang->id}}. Mong Shop thông cảm!
    </p>
    @else
    <p style="color:gray; font-size:16px">
        Tôi đã hủy đơn hàng #{{$donhang->id}} với lý do là <span style="font-weight: bold;">{{ $lydohuy }}</span>
        . Mong Shop thông cảm!
    </p>
    @endif
    <div style="border-top: 1px solid; ">
        <h3 style="font-size: 16px; color:red">THÔNG TIN ĐƠN HÀNG BỊ HỦY</h3>
        <h4 style="font-size: 15px;">Ngày đặt hàng: {{ date('d-m-Y', strtotime($donhang->created_at)) }}</h4>
        <table cellspacing="0" cellpadding="10" style="width:100%; border:1px solid #198754; border-collapse:collapse;">
            <tbody>
                @foreach($donhang->details as $ci)
                <tr style="border:1px solid #198754;">
                    <td>
                        {{ $ci->product->ten }}
                    </td>
                    <td>
                        {{ number_format($ci->product->gia_ban).'đ' }}
                        x
                        <span>{{ $ci->soluong }}</span>
                    </td>
                    <td>
                        {{ number_format($ci->product->gia_ban*$ci->soluong).'đ' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <?php 
        $tamtinh = 0;
        foreach($donhang->details as $data){
            $tamtinh += $data->tonggia;
        }
    ?>
    <div style="border-top: 1px solid; margin-top: 1rem; margin-bottom: 1rem; padding-top: .5rem; font-size: 16px;">
        <div>Tổng giá trị sản phẩm
            <span style="float:right; font-weight:bold">
                {{ number_format($tamtinh).'đ' }}
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

    <div style="border-top: 1px solid;">
        <h3 style="font-size: 16px;">THÔNG TIN KHÁCH HÀNG</h3>
        <p style="font-size: 15px">Tên khách hàng: <b>{{$customer->ten}}</b></p>
        <p style="font-size: 15px">Số điện thoại: <b>{{$customer->sdt}}</b></p>
        <p style="font-size: 15px">Địa chỉ nhận hàng: <b>{{$customer->diachi}}</b></p>
    </div>
    <div style="border-top: 1px solid;">
        <h3 style="font-size: 16px;">THÔNG TIN VẬN CHUYỂN</h3>
        <p style="font-size: 15px">Tên người nhận: <b>{{$donhang->tenKH}}</b></p>
        <p style="font-size: 15px">Số điện thoại: <b>{{$donhang->sdt}}</b></p>
        <p style="font-size: 15px">Địa chỉ nhận hàng: <b>{{$donhang->diachi}}</b></p>
        <p style="font-size: 15px">Chú thích: <b>{{$donhang->chuthich}}</b></p>
    </div>
</div>