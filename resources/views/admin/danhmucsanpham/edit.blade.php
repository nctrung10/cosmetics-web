@extends('adminmaster')

@section('title', 'Cập Nhật Danh Mục')

@section('content')
<form action="{{ route('danhmucsanpham.update',$danhmucsanpham->id) }}" method="POST">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$danhmucsanpham->id}}"> <!-- để UpdateRequest nhận được id -->
    <div class="form-group">
        <label>Danh mục cha</label>
        <select class="custom-select" name="parent_id">
            <option selected value="0">Chọn danh mục cha</option>
            @foreach($parentCat as $pc)
                @if($pc->id == $danhmucsanpham->parent_id)
                <option selected value="{{$pc->id}}">{{$pc->ten}}</option>
                @else
                <option value="{{$pc->id}}">{{$pc->ten}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label class="fw-bold">Tên danh mục</label>
        <input type="text" class="form-control" id="name" name="ten" value="{{$danhmucsanpham->ten}}">
        <!-- phương thức thông báo lỗi validation laravel -->
        @error('ten')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="fw-bold">Slug của danh mục</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{$danhmucsanpham->slug}}">
    </div>
    <div class="form-group mb-3">
        <label class="d-block fw-bold">Trạng thái</label>
        @if($danhmucsanpham->trangthai == 1)
        <div class="form-check form-check-inline">
            <input class="form-check-input" id="rad1" type="radio" name="trangthai" value="1" checked>
            <label class="form-check-label text-bold" for="rad1">Hiển thị</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" id="rad2" type="radio" name="trangthai" value="0">
            <label class="form-check-label text-bold" for="rad2">Ẩn</label>
        </div>
        @else
        <div class="form-check form-check-inline">
            <input class="form-check-input" id="rad1" type="radio" name="trangthai" value="1">
            <label class="form-check-label text-bold" for="rad1">Hiển thị</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" id="rad2" type="radio" name="trangthai" value="0" checked>
            <label class="form-check-label text-bold" for="rad2">Ẩn</label>
        </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('danhmucsanpham.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@stop()

@section('js')
<script src="{{url('backend')}}/dist/js/slug.js"></script>
@stop()