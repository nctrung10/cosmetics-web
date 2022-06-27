@extends('adminmaster')

@section('title', 'Thêm sản phẩm mới')

@section('content')
<form action="{{route('sanpham.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="">Slug của sản phẩm</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
            </div>
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="name" name="ten" value="{{old('ten')}}">
                <!-- phương thức thông báo lỗi validation laravel -->
                @error('ten')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea class="form-control" name="mota_ngan" id="editor1"></textarea>

            </div>
            <div class="form-group">
                <label>Mô tả thông tin</label>
                <textarea class="form-control" name="mota" id="editor2">{{old('mota')}}</textarea>
                @error('mota')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Chọn thêm ảnh khác
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal_imgList">
                        <i class="fas fa-folder-open"></i>
                    </button>
                </label>
                <input type="hidden" id="image_list" name="image_list">

                <div class="row" id="show_image_list">

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Danh mục sản phẩm</label>
                <select class="custom-select" name="danhmucsp_id">
                    <option selected value="">Chọn một danh mục</option>
                    <?php showCategories($selectCat) ?>
                    <!-- biến của hàm create trong controller -->
                </select>
                @error('danhmucsp_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Thương hiệu</label>
                <select class="custom-select" name="thuonghieu_id">
                    <option selected value="">Chọn một thương hiệu</option>
                    @foreach($selectBrand as $sb)
                    <option value="{{$sb->id}}">{{ $sb->ten }}</option>
                    @endforeach
                </select>
                @error('thuonghieu_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Xuất xứ</label>
                <select class="custom-select" name="xuatxu_id">
                    <option selected value="">Chọn xuất xứ</option>
                    @foreach($selectOrgini as $so)
                    <option value="{{$so->id}}">{{ $so->ten }}</option>
                    @endforeach
                </select>
                @error('xuatxu_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Số lượng</label>
                <input type="number" class="form-control" placeholder="Nhập số lượng sản phẩm" name="soluong" min="5" value="{{old('soluong')}}">
                @error('soluong')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Giá nhập</label>
                <input type="text" min="1" class="form-control price-format" name="gia" value="{{old('gia')}}">
                @error('gia')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Giá bán</label>
                <input type="text" min="1" class="form-control price-format" name="gia_ban" value="{{old('gia_ban')}}">
                @error('gia_ban')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Ngày sản xuất</label>
                <input type="text" autocomplete="off" id="coupon_start" class="form-control" name="nsx" value="{{old('nsx')}}">
                @error('nsx')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Hạn sử dụng</label>
                <input type="text" autocomplete="off" id="coupon_end" class="form-control" name="hsd" value="{{old('hsd')}}">
                @error('hsd')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Ảnh đại diện sản phẩm</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalImage">
                            <i class="fas fa-folder-open"></i>
                        </button>
                    </div>
                    <input class="form-control" type="text" id="image" name="hinhanh">
                </div>
                <img src="" id="show_img" class="d-block mx-auto" style="max-width:240px">
                @error('hinhanh')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary px-5 float-right">Thêm</button>
    <a href="{{ route('sanpham.index') }}" class="btn btn-secondary">Quay lại</a>
</form>

<!-- Modal Image -->
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chọn ảnh đại diện cho sản phẩm</h5>
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
<!-- Modal Image List -->
<div class="modal fade" id="modal_imgList" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chọn thêm ảnh cho sản phẩm
                    <small class="text-danger">( vui lòng chọn nhiều hơn một ảnh )</small>
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nhúng File Manager -->
                <iframe src="{{url('filemanager/dialog.php?field_id=image_list&akey=UTPjRK2G3IXnXW0ZocVmFH8AMNdrWJ4EYRvl92ruho')}}" style="width: 100%; height:500px; overflow-y:auto; border:none"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop()
@section('css')
    <style>
        .ui-datepicker {
            z-index: 10 !important;
        }
    </style>
@stop()
<!-- Hiện ảnh được chọn sau khi đóng modal -->
@section('js')
<script>
    /* hinhanh */
    $('#modalImage').on('hide.bs.modal', event => {
        var _link = $('input#image').val(); //lấy giá trị trong input này ra
        var _img = "{{url('uploads')}}" + '/' + _link; //nối url với _link để lấy ảnh
        $('img#show_img').attr('src', _img); //lấy thuộc tính là src và link của ảnh để show ảnh
    })

    /* image_list */
    $('#modal_imgList').on('hide.bs.modal', event => {
        var _links = $('input#image_list').val(); //lấy giá trị trong input này ra
        var _args = $.parseJSON(_links); //tạo mảng lấy nhiều ảnh
        var _html = '';
        for (let i = 0; i < _args.length; i++) { //vòng lặp nối chuỗi tạo div chứa các ảnh
            let _url = "{{url('uploads')}}" + '/' + _args[i]; //nối url với mảng vừa chọn
            _html += '<div class="col-md-4">';
            _html += '<img src="' + _url + '" style="width:100%; height:240px">';
            _html += '</div>';
        }
        $('#show_image_list').html(_html); //hiển thị div chứa ảnh vừa lấy được
    })
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
</script>
<script src="{{url('backend')}}/dist/js/slug.js"></script>
@stop()
<!-- Đệ quy danh mục đa cấp select -->
<?php
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
        // Nếu là danh mục con thì hiển thị
        if ($item->parent_id == $parent_id) {
            echo '<option value="' . $item->id . '">' . $char . $item->ten . '</option>';
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm danh mục con của danh mục đang lặp
            showCategories($categories, $item->id, $char . ' -- ');
        }
}
?>