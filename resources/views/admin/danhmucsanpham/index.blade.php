@extends('adminmaster')

@section('title', 'Quản lý danh mục sản phẩm')

@section('content')
<h4 class="text-center text-secondary mb-5">Danh sách danh mục</h4>
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
                <input type="search" class="form-control" name="key" placeholder="Nhập tên danh mục...">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-7 col-12 text-right mb-3">
        <a href="{{ route('danhmucsanpham.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#add_category">
            <i class="fas fa-plus"></i> Thêm danh mục mới
        </a>
    </div>
</div>

<table class="table table-hover table-responsive-lg">
    <thead class="bg-dark">
        <th>Mã</th>
        <th>Tên danh mục</th>
        <th style="width: 12%; text-align:center;">Tổng sản phẩm</th>
        <th class="text-center">Trạng thái</th>
        <th>Ngày tạo</th>
        <th class="text-right px-4">Xử lý</th>
    </thead>
    <tbody>
        <?php
        tableCategories($category) ?>
        <!-- biến của hàm index trong controller -->
    </tbody>
</table>
</div>
<!-- Modal Add Category -->
<div class="modal fade" id="add_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục Mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('danhmucsanpham.store') }}" method="POST" role="form">
                @csrf
                <div class="modal-body">
                    <!-- Nhúng Form Add Category -->
                    @include('admin.danhmucsanpham.create')
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
    <!-- appends: tìm kiếm vẫn giữ được tham số tìm kiếm trên url -->
</div>
@stop()

@section('js')
<!-- click deleteCategory sẽ submit form-delete -->
<script>
    $('.deleteCategory').click(function(e) {
        e.preventDefault(); //không cho load lại trang
        var _href = $(this).attr('href'); //lấy href = cái href vừa được click
        $('form#form-delete').attr('action', _href); //submit form-delete với link xóa vừa lấy
        if (confirm('Bạn chắc muốn xóa không?')) {
            $('form#form-delete').submit();
        }
    })
</script>
<script src="{{url('backend')}}/dist/js/slug.js"></script>
@stop()
<!-- Đệ quy danh mục đa cấp table -->
<?php
use App\Models\DanhmucSanpham;

function tableCategories($categories, $parent_id = 0, $char = '')
{
    $categoryall = DanhmucSanpham::all();
    foreach ($categories as $key => $item) {
        // Nếu là danh mục con thì hiển thị
        if ($item->parent_id == $parent_id) {
            echo '<tr class="text-capatalize">';
            echo '<th scope="row">' . $item->id . '</th>';
            echo '<td>' . $char . $item->ten . '</td>';
             
            if($item->parent_id == 0){
                $tmp = $item->products->count();
                
                foreach($categoryall as $key => $item_tmp){
                    if($item_tmp->parent_id == $item->id){
                        $tmp += $item_tmp->products->count();
                    }
                    
                }
                echo '<td class="text-center">' . $tmp . '</td>';
            }
            else{
                echo '<td class="text-center">' . $item->products->count() . '</td>';
            } 
            echo '<td class="text-center">';
                echo '<a href="'.route("danhmucsanpham.trangthai",$item->id).'">';
                if($item->trangthai == 1){
                echo '<span class="badge badge-success"><i class="fas fa-eye"></i></span>';
                }else {
                echo '<span class="badge badge-danger"><i class="fas fa-eye-slash"></i></span>';
                }
                echo '</a>';
            echo '</td>';
            echo '<td>' . $item->created_at->format('d-m-Y') . '</td>';
            echo '<td class="text-right">';
            echo
            '<a href="'.route('danhmucsanpham.edit', $item->id).'" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-placement="top" title="Sửa danh mục">
                <i class="fas fa-edit"></i>
            </a>
            <a href="'.route('danhmucsanpham.destroy', $item->id).'" class="btn btn-sm btn-danger deleteCategory">
                <i class="fas fa-trash"></i>
            </a>';
            echo '</td>';
            echo '</tr>';

            // Xóa danh mục đã lặp
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm danh mục con của danh mục đang lặp
            tableCategories($categories, $item->id, $char . ' -- ');
        }
    }
}
?>