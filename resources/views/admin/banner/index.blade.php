@extends('adminmaster')

@section('title', 'Quản lý Banner')

@section('content')
<h4 class="text-center text-secondary mb-5">Danh sách banner</h4>
<div class="row">
    <div class="col-lg-5 col-12 mb-3">
        <form action="" class="search-form">
            <div class="input-group">
                <input type="search" class="form-control" name="key" placeholder="Nhập tên banner...">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-7 col-12 text-right mb-3">
        <a href="{{ route('banner.create') }}" class="btn btn-primary" 
        data-bs-toggle="tooltip" data-placement="left" title="Thêm banner mới">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</div>

<table class="table table-hover table-responsive-lg">
    <thead class="bg-dark">
        <th>#</th>
        <th>Ảnh</th>
        <th>Chủ đề Banner</th>
        <th class="text-center">Trạng thái</th>
        <th>Ngày tạo</th>
        <th class="text-right px-4">Xử lý</th>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach($banner as $b)
        <tr>
            <th scope="row">{{$i++}}</th>
            <td>
                <img src="{{url('uploads')}}/{{$b->hinhanh}}" width="120" height="60">
            </td>
            <td>{{$b->ten}}</td>
            <td class="text-center">
                <a href="{{ route('banner.trangthai',$b->id) }}">
                    @if($b->trangthai == 1)
                    <span class="badge badge-success"><i class="fas fa-eye"></i></span> 
                    @else
                    <span class="badge badge-danger"><i class="fas fa-eye-slash"></i></span> 
                    @endif
                </a>
            </td>
            <td>{{ date('d-m-Y H:i',strtotime($b->created_at)) }}</td>
            <td class="text-right">
                <a href="{{ route('banner.show',$b->id) }}" class="btn btn-sm btn-success disabled" title="Xem thêm" data-bs-toggle="tooltip" data-bs-placement="top">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('banner.edit',$b->id) }}" class="btn btn-sm btn-primary" title="Cập nhật" data-bs-toggle="tooltip" data-bs-placement="top">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('banner.delete',$b->id) }}" onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn btn-sm btn-danger delB">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- tạo form delete bên ngoài để có thể xóa nhiều đối tượng -->
<!-- <form action="" method="GET" id="form-delete"> 
    @csrf 
</form> -->

<hr>
<div class="phantrang">
    {{ $banner->appends(request()->all())->links() }} <!-- appends: tìm kiếm vẫn giữ được tham số trên url -->
</div>
@stop()

@section('js')
<script>
    /* $('.delBanner').click(function(e) {
        e.preventDefault();                 
        var _href = $(this).attr('href');     
        $('form#form-delete').attr('action',_href);    
        if(confirm('Bạn có chắc muốn xóa không?')) {    
            $('form#form-delete').submit();
        }
    }) */
</script>
@stop()