@extends('adminmaster')

@section('title', 'Cập Nhật Bài Viết')

@section('content')
<form action="{{route('baiviet.update',$baiviet->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$baiviet->id}}">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{$baiviet->slug}}">
                @error('slug')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Tên / Chủ đề bài viết</label>
                <input type="text" class="form-control" id="name" name="chude" value="{{$baiviet->chude}}">
                @error('chude')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalImage">
                            <i class="fas fa-folder-open"></i>
                        </button>
                    </div>
                    <input class="form-control" type="text" placeholder="Chọn ảnh bìa cho bài viết" id="image" name="hinhanh" value="{{$baiviet->hinhanh}}">
                </div>
                <img src="{{url('uploads')}}/{{$baiviet->hinhanh}}" id="show_img" class="d-block mx-auto" style="width:100%;">
                @error('hinhanh')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea class="form-control" name="mota_ngan" id="editor1">{{$baiviet->mota_ngan}}</textarea>
                @error('mota_ngan')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Nội dung bài viết</label>
                <textarea class="form-control" name="noidung" id="editor2">{{$baiviet->noidung}}</textarea>
                @error('noidung')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary px-5">Cập nhật</button>
    <a href="javascript:history.back()" class="btn btn-secondary px-5">Quay lại</a>
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
    CKEDITOR.replace('editor2');
</script>
<script src="{{url('backend')}}/dist/js/slug.js"></script>
@stop()
