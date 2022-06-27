<div class="form-group">
    <label>Tên thương hiệu</label>
    <input type="text" class="form-control" id="name" name="ten" value="{{old('ten')}}">
    <!-- phương thức thông báo lỗi validation laravel -->
    @error('ten')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<!-- slug để hiển thị tên trên url -->
<div class="form-group">
    <label>Slug thương hiệu</label>
    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
    @error('slug')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label class="d-block">Trạng thái</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="rad1" name="trangthai" value="1" checked>
        <label class="form-check-label text-bold" for="rad1">Hiển thị</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="rad2" name="trangthai" value="0">
        <label class="form-check-label text-bold" for="rad2">Ẩn</label>
    </div>
</div>

