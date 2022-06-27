@extends('adminmaster')

@section('title', 'Quản lý đơn hàng')

@section('content')
<h5 class="text-secondary text-center font-weight-bold mb-3">Danh sách đơn hàng</h5>

<form action="" method="GET">
    <div class="row mb-2">
        <div class="col-xl-4 col-md-4 col-sm-12 col-12 mb-2 mr-3">
            <form action="" class="search-form">
                <div class="input-group">
                    <input type="search" class="form-control" name="key" placeholder="Tìm theo Mã đơn hàng / Tên khách hàng">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-xl-3 col-md-3 col-sm-6 col-6 mb-2 pr-0">
            <input autocomplete="off" type="text" class="form-control" placeholder="Từ ngày" id="donhang_start" name="date_from">
        </div>
        <div class="col-xl-3 col-md-3 col-sm-6 col-6 mb-2">
            <input autocomplete="off" type="text" class="form-control" placeholder="Đến ngày" id="donhang_end" name="date_to">
        </div>
        <div class="col-xl-1 col-md-1 col-12 pl-0 text-xl-left text-md-left text-right">
            <button type="submit" class="btn btn-info">Chọn</button>
        </div>
    </div>
</form>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col" class="text-right px-4">Xử lý</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        @foreach($all_order as $ao)
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <th>#{{ $ao->id }}</th>
            <td>{{ $ao->cus->ten }}</td>
            <td>
                @if($ao->trangthai == 1)
                <span class="badge badge-primary">Đang chờ xử lý</span>
                @elseif($ao->trangthai == 2)
                <span class="badge badge-success">Đã xác nhận</span>
                @else
                <span class="badge badge-danger">Đã hủy</span>
                @endif
            </td>
            <td>{{ date('d-m-Y H:i:s',strtotime($ao->created_at)) }}</td>
            <td class="text-right">
                <a href="{{ route('donhang.edit',$ao->id) }}" class="btn btn-info btn-sm" title="Xem thêm" data-bs-placement="top" data-bs-toggle="tooltip">
                    <i class="fas fa-eye"></i>
                </a>
                @if($ao->trangthai == 2)
                <a target="_blank" href="{{ route('donhang.print',$ao->id) }}" class="btn btn-primary btn-sm" title="In PDF" data-bs-placement="top" data-bs-toggle="tooltip">
                    <i class="fas fa-print"></i>
                </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop()
@section('js')
<script>
    $(function() {
        $("#donhang_start").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
            duration: "medium",
            showOtherMonths: true,
            selectOtherMonths: true
        });
        $("#donhang_end").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
            duration: "medium",
            showOtherMonths: true,
            selectOtherMonths: true
        });
    });
</script>
@stop()