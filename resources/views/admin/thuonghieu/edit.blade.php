@extends('adminmaster')

@section('title', 'Cập Nhật Thương hiệu')

@section('content')

@foreach($thuonghieu as $thuonghieu)
@if($thuonghieu->id == $id_th && $thuonghieu->trangthai == 1)
<form action="{{ route('thuonghieu.update',$thuonghieu->id) }}" method="POST" class="w-50">
    @csrf 
    @method('PUT')
    <input type="hidden" name="id" value="{{$thuonghieu->id}}">
    <div class="form-group mb-3">
        <label class="fw-bold">Tên thương hiệu</label>
        <input type="text" class="form-control" id="name" name="ten" value="{{$thuonghieu->ten}}">
    </div>
    <div class="form-group mb-3">
        <label class="fw-bold">Slug thương hiệu</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{$thuonghieu->slug}}">
    </div>
    <!-- <div class="form-group mb-3">
        <label class="d-block fw-bold">Trạng thái</label>
        @if($thuonghieu->trangthai == 1)
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
    </div> -->

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('thuonghieu.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endif
@endforeach
@stop()

@section('js')
<script src="{{url('backend')}}/dist/js/slug.js"></script>
@stop()