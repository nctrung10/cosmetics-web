<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Tên mã giảm giá</label>
            <input type="text" class="form-control" name="ten" value="{{old('ten')}}">
            @error('ten')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Mã giảm giá</label>
            <input type="text" class="form-control" name="ma_gg" value="{{old('ma_gg')}}">
            @error('ten')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="text" class="form-control" name="soluong" value="{{old('soluong')}}">
            @error('ten')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Loại mã</label>
            <select class="custom-select" name="hinhthuc">
                <option selected value="">Chọn loại mã giảm giá</option>
                <option value="1">Giảm theo %</option>
                <option value="2">Giảm theo số tiền</option>
            </select>
            @error('hinhthuc')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Giá trị theo loại</label>
            <input type="number" class="form-control" name="giatri" value="{{old('giatri')}}">
            @error('giatri')
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