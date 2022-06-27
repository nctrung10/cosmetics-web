@extends('adminmaster')

@section('title', 'Quản lý xuất xứ')

@section('content')
<h4 class="text-center text-secondary mb-5">Danh sách xuất xứ</h4>
<!-- Thông báo check validate -->
@error('ten')
<div class="d-flex justify-content-end">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p class="text-center mb-1 font-weight-bold">THÊM MỚI THẤT BẠI</p>
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@enderror
@error('slug')
<div class="d-flex justify-content-end">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@enderror

<div class="row">
    <div class="col-lg-5 col-12 mb-3">
        <form action="" class="search-form">
            <div class="input-group">
                <input type="search" class="form-control" name="key" placeholder="Nhập tên xuất xứ...">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-7 col-12 text-right mb-3">
        <a href="{{ route('xuatxu.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#add_orgini">
            <i class="fas fa-plus"></i> Thêm xuất xứ
        </a>
    </div>
</div>

<table class="table table-hover table-responsive-lg">
    <thead class="bg-dark">
        <th>ID</th>
        <th>Xuất xứ</th>
        <th style="width: 12%; text-align:center;">Tổng sản phẩm</th>
        <!-- <th class="text-center">Trạng thái</th> -->
        <th class="text-right">Ngày tạo</th>
        <th class="text-right px-4">Xử lý</th>
    </thead>
    <tbody>
        @foreach($orgini as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->ten }}</td>
            <td class="text-center">{{ $item->productOrgini->count() }}</td>
            
            <td class="text-right">{{ $item->created_at->format('d-m-Y') }}</td>
            <td class="text-right">
                <a href="{{ route('xuatxu.edit', $item->id) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-placement="top" title="Cập nhật">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('xuatxu.destroy', $item->id) }}" class="btn btn-sm btn-danger delOrgini">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Modal Add Brand -->
<div class="modal fade" id="add_orgini" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Xuất Xứ Mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('xuatxu.store') }}" method="POST" role="form">
                @csrf
                <div class="modal-body">
                    @include('admin.xuatxu.create')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- tạo form delete bên ngoài để có thể xóa nhiều đối tượng -->
<form action="" method="POST" id="form-delete">
    @csrf @method('DELETE')
</form>

<hr>
<div class="phantrang">
    {{ $orgini->appends(request()->all())->links() }} <!-- appends: tìm kiếm vẫn giữ được tham số tìm kiếm trên url -->
</div>
@stop()

@section('js')
<script>
    $('.delOrgini').click(function(e) {
        e.preventDefault(); //không cho load lại trang
        var _href = $(this).attr('href'); //lấy href = cái href vừa được click
        $('form#form-delete').attr('action', _href); //submit form-delete với link xóa vừa lấy
        if (confirm('Bạn có chắc muốn xóa không?')) {
            $('form#form-delete').submit();
        }
    })
</script>
<script src="{{url('backend')}}/dist/js/slug.js"></script>
@stop()