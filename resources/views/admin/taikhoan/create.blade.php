@extends('adminmaster')

@section('title','Thêm tài khoản mới')

@section('content')
<form action="{{ route('taikhoan.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Tên nhân viên</label>
        <input type="text" class="form-control"  name="ten">
        <!-- phương thức thông báo lỗi validation laravel -->
        @error('ten')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label>Email</label>     
        <input type="text" class="form-control" name="email">
        @error('email')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label>Mật khẩu</label>
        <input class="form-control" name="password" type="password">
        @error('password')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label>Nhập lại mật khẩu</label>
        <input class="form-control" name="confirm_matkhau" type="password">
        @error('confirm_matkhau')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary px-5">Thêm</button>
</form>
@stop()
