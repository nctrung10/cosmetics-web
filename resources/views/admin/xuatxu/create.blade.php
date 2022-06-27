<div class="form-group">
    <label>Tên xuất xứ</label>
    <input type="text" class="form-control" id="name" name="ten" value="{{old('ten')}}">
    
    @error('ten')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<!-- slug để hiển thị tên trên url -->
<div class="form-group">
    <label>Slug xuất xứ</label>
    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
    @error('slug')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
