@extends('adminmaster')

@section('title', 'Cập Nhật Banner')

@section('content')
<form action="{{route('banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$banner->id}}">
    <div class="row">
        <div class="col-md-6">
             <div class="form-group">
                <label>Liên kết quảng cáo</label>
                <input type="text" class="form-control" name="link" value="{{$banner->link}}">
            </div>
            <div class="form-group">
                <label>Tên / Chủ đề banner</label>
                <input type="text" class="form-control" placeholder="Nhập tên của banner" name="ten" value="{{$banner->ten}}">
                <!-- phương thức thông báo lỗi validation laravel -->
                @error('ten')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
           <div class="form-group">
                <label class="d-block">Trạng thái</label>
                @if($banner->trangthai == 1)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="rad1" name="trangthai" value="1" checked>
                    <label class="form-check-label text-bold" for="rad1">Hiển thị</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="rad2" name="trangthai" value="0">
                    <label class="form-check-label text-bold" for="rad2">Ẩn</label>
                </div>
                @else
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="rad1" name="trangthai" value="1">
                    <label class="form-check-label text-bold" for="rad1">Hiển thị</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="rad2" name="trangthai" value="0" checked>
                    <label class="form-check-label text-bold" for="rad2">Ẩn</label>
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalImage">
                            <i class="fas fa-folder-open"></i>
                        </button>
                    </div>
                    <input class="form-control" type="text" id="image" name="hinhanh" value="{{$banner->hinhanh}}">
                </div>
                <img src="{{url('uploads')}}/{{$banner->hinhanh}}" id="show_img" class="d-block mx-auto" style="width:100%">
                @error('hinhanh')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea class="form-control" name="mota" id="editor1">{{ $banner->mota }}</textarea>
                @error('mota')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary px-5">Cập nhật</button>
    <a href="{{ route('banner.index') }}" class="btn btn-secondary px-5">Quay lại</a>
</form>
<!-- Modal Image -->
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chọn ảnh cho banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nhúng File Manager -->
                <iframe src="{{url('filemanager/dialog.php?field_id=image&akey=UTPjRK2G3IXnXW0ZocVmFH8AMNdrWJ4EYRvl92ruho')}}" style="width: 100%; height:500px; overflow-y:auto; border:none"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop()

@section('js')
<script>
    /* hinhanh */
    $('#modalImage').on('hide.bs.modal', event => {
        var _link = $('input#image').val(); //lấy giá trị trong input này ra
        var _img = "{{url('uploads')}}" + '/' + _link; //nối url với _link để lấy ảnh
        $('img#show_img').attr('src', _img); //lấy thuộc tính là src và link của ảnh để show ảnh
    })
    /* mota */
    CKEDITOR.replace('editor1');
</script>
@stop()
