@extends('adminmaster')

@section('title', 'Cập Nhật Giảm Giá')

@section('content')
<form action="{{ route('giamgia.update',$giamgia->id) }}" method="POST">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$giamgia->id}}">
    <div class="form-group mb-3">
        <label class="fw-bold">Tên mã giảm giá</label>
        <input type="text" class="form-control" name="ten" value="{{$giamgia->ten}}">
    </div>
    <div class="form-group mb-3">
        <label class="fw-bold">Mã giảm giá</label>
        <input type="text" class="form-control" name="ma_gg" value="{{$giamgia->ma_gg}}">
    </div>
    <div class="form-group mb-3">
        <label class="fw-bold">Số lượng</label>
        <input type="number" class="form-control" name="soluong" value="{{$giamgia->soluong}}">
    </div>
    <div class="form-group">
        <label>Loại mã</label>
        <select class="custom-select" name="hinhthuc">

            <option value=""></option>

            <option selected value="">Chọn loại mã giảm giá</option>
            <option value=""></option>

        </select>
    </div>
    <div class="form-group">
        <label>Giá trị theo loại</label>
        <input type="number" class="form-control" name="giatri" value="{{$giamgia->giatri}}">
    </div>
    <div class="form-group">
        <label>Ngày bắt đầu</label>
        <input type="text" autocomplete="off" class="form-control" id="coupon_start" name="ngaybatdau" value="{{$giamgia->ngaybatdau}}">
    </div>
    <div class="form-group">
        <label>Ngày kết thúc</label>
        <input type="text" autocomplete="off" class="form-control" id="coupon_end" name="ngayketthuc" value="{{$giamgia->ngaykethuc}}">
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="{{ route('giamgia.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@stop()