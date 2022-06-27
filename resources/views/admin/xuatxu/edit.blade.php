@extends('adminmaster')

@section('title', 'Cập nhập xuất xứ')

@section('content')
<form action="{{ route('xuatxu.update',$xuatxu->id) }}" method="POST" class="w-50">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$xuatxu->id}}">
    <div class="form-group mb-3">
        <label class="fw-bold">Tên xuất xứ</label>
        <input type="text" class="form-control" id="name" name="ten" value="{{$xuatxu->ten}}">
    </div>
    <div class="form-group mb-3">
        <label class="fw-bold">Slug xuất xứ</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{$xuatxu->slug}}">
    </div>
    

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('xuatxu.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@stop()

@section('js')
<script src="{{url('backend')}}/dist/js/slug.js"></script>
@stop()