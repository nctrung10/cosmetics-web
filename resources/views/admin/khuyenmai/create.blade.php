<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Tên khuyến mãi</label>
            <input type="text" class="form-control" name="ten" value="{{old('ten')}}">
            @error('ten')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Số phần trăm của khuyến mãi</label>
            <input type="text" autocomplete="off" class="form-control" name="giatri" value="{{old('giatri')}}">
            @error('giatri')
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
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Khuyến mãi cho danh mục</label>
            <select class="custom-select" name="danhmucsp_id">
                    <option selected value="">Chọn một danh mục</option>
                    <?php showCategories($selectCat) ?>
                    <!-- biến selectCat của trong controller -->
                </select>
            @error('danhmucsp_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Ngày bắt đầu</label>
            <input type="text" autocomplete="off" class="form-control" id="coupon_start" name="ngaybatdau" value="{{old('ngaybatdau')}}">
            @error('ngaybatdau')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Ngày kết thúc</label>
            <input type="text" autocomplete="off" class="form-control" id="coupon_end" name="ngayketthuc" value="{{old('ngayketthuc')}}">
            @error('ngayketthuc')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>