@extends('adminmaster')

@section('title', 'Cập nhật khuyến mãi')

@section('content')

<form action="{{ route('khuyenmai.update',$khuyenmai->id) }}" method="POST">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$khuyenmai->id}}">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Tên khuyến mãi</label>
                <input type="text" class="form-control" name="ten" value="{{$khuyenmai->ten}}">
                @error('ten')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Số phần trăm của khuyến mãi</label>
                <input type="text" autocomplete="off" class="form-control" name="giatri" value="{{$khuyenmai->giatri}}">
                @error('giatri')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Khuyến mãi cho danh mục</label>
                <select class="custom-select" name="danhmucsp_id">
                    @foreach($selectCat as $sc)
                    @if($sc->id == $khuyenmai->danhmucsp_id)
                    <option selected value="{{$sc->id}}">{{$sc->ten}}</option>
                    @else
                    <option value="{{$sc->id}}">{{$sc->ten}}</option>
                    @endif
                    @endforeach
                </select>

                @error('danhmucsp_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Ngày bắt đầu</label>
                <input type="text" autocomplete="off" class="form-control" id="coupon_start" name="ngaybatdau" value="{{$khuyenmai->ngaybatdau}}">
                @error('ngaybatdau')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Ngày kết thúc</label>
                <input type="text" autocomplete="off" class="form-control" id="coupon_end" name="ngayketthuc" value="{{$khuyenmai->ngayketthuc}}">
                @error('ngayketthuc')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        
        <a href="{{ route('khuyenmai.index') }}" class="btn btn-secondary mr-2">Quay lại</a>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
</form>
@stop()