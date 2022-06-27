<div class="form-group">
    <label>Danh mục cha</label>
    <select class="custom-select" name="parent_id">
        <option selected value="0">Chọn danh mục cha</option>
        <?php showCategories($parentCat) ?> <!-- biến của hàm create trong controller -->
    </select>
</div>

<div class="form-group">
    <label>Tên danh mục</label>
    <input type="text" class="form-control" id="name" name="ten" value="{{old('ten')}}">
    <!-- phương thức thông báo lỗi validation laravel -->
    @error('ten')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<!-- slug để hiển thị tên trên url -->
<div class="form-group">
    <label>Slug của danh mục</label>
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

<!-- Đệ quy danh mục đa cấp select -->
<?php 
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach($categories as $key => $item)
    // Nếu là danh mục con thì hiển thị
    if($item->parent_id == $parent_id)
    {
        echo '<option value="'.$item->id.'">'.$char.$item->ten.'</option>';
        unset($categories[$key]);

        // Tiếp tục đệ quy để tìm danh mục con của danh mục đang lặp
        showCategories($categories, $item->id, $char.' -- ');
    }
}
?>