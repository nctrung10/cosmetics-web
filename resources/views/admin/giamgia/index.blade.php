@extends('adminmaster')

@section('title', 'Quản lý mã giảm giá')

@section('content')
<h4 class="text-center text-secondary mb-5">Danh sách mã giảm giá</h4>
<div class="row">
    <div class="col-lg-5 col-12 mb-3">
        <form action="" class="search-form">
            <div class="input-group">
                <input type="search" class="form-control" name="key" placeholder="Nhập tên mã giảm giá...">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-7 col-12 text-right mb-3">
        <a href="{{ route('giamgia.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#add_brand">
            <i class="fas fa-plus"></i> Thêm mã giảm giá mới
        </a>
    </div>
</div>

<table class="table table-hover table-responsive-lg">
    <thead class="bg-dark">
        <th>#</th>
        <th>Tên mã giảm giá</th>
        <th>Mã giảm giá</th>
        <th>Số lượng</th>
        <th>Loại mã</th>
        <th>Giá trị</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
        <th class="text-right px-4">Xử lý</th>
    </thead>
    <tbody>
        <?php $i=0; ?>
        @foreach($voucher as $item)
        <tr>
            <?php $i++; ?>
            <th scope="row">{{ $i }}</th>
            <td>{{ $item->ten }}</td>
            <td>{{ $item->ma_gg }}</td>
            <td>{{ $item->soluong }}</td>
            <td>
                @if($item->hinhthuc == 1)
                <span style="font-size:14px;">Giảm theo %</span>
                @else
                <span style="font-size:14px;">Giảm theo tiền</span>
                @endif
            </td>
            <td>
                @if($item->hinhthuc == 1)
                <span>{{ $item->giatri }}%</span>
                @else
                <span>{{number_format($item->giatri)}}đ</span>
                @endif</td>
            <td>{{ $item->ngaybatdau }}</td>
            <td>{{ $item->ngayketthuc }}</td>
            <td class="text-right">
                <!-- <a href="{{ route('giamgia.edit', $item->id) }}" class="btn btn-sm btn-primary disabled" data-bs-toggle="tooltip" data-placement="top" title="Cập nhật">
                    <i class="fas fa-edit"></i>
                </a> -->
                <a href="{{ route('giamgia.destroy', $item->id) }}" onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn btn-sm btn-danger delV">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Modal Add Brand -->
<div class="modal fade" id="add_brand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Mã Giảm Giá Mới</h5>
            </div>
            <form action="{{ route('giamgia.store') }}" method="POST" role="form">
                @csrf
                <div class="modal-body">
                    @include('admin.giamgia.create')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>


<hr>
<div class="phantrang">
    {{ $voucher->appends(request()->all())->links() }}
</div>
@stop()
