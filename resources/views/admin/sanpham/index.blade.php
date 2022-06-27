@extends('adminmaster')

@section('title', 'Quản lý sản phẩm')

@section('content')
<h4 class="text-center text-secondary mb-5">Danh sách sản phẩm</h4>
<div class="row">
    <div class="col-lg-5 col-12 mb-3">
        <form action="" class="search-form">
            <div class="input-group">
                <input type="search" class="form-control" name="key" placeholder="Nhập tên hoặc mã sản phẩm...">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-7 col-12 text-right mb-3">
        <a href="{{ route('sanpham.create') }}" class="btn btn-primary" 
        data-bs-toggle="tooltip" data-placement="left" title="Thêm sản phẩm mới">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</div>

<table class="table table-hover table-responsive-lg">
    <thead class="bg-dark">
        <th>ID</th>
        <th>Ảnh</th>
        <th style="width:500px">Tên sản phẩm</th>
        <th>Danh mục</th>
        <th>Số lượng</th>
        <th class="pl-4">Giá nhập / Giá bán</th>
        <th class="text-right px-4">Xử lý</th>
    </thead>
    <tbody>
        @foreach($product as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>
                <img src="{{url('uploads')}}/{{$p->hinhanh}}" width="60" height="60">
            </td>
            <td>{{$p->ten}}</td>
            <td>{{$p->cat->ten}}</td> <!-- hàm cat ở model Sanpham lấy danh mục tương ứng -->
            <td>{{$p->soluong}}</td>
            <td class="px-4">
                {{ number_format($p->gia).'đ' }} / 
                <span class="text-success">{{ number_format($p->gia_ban).'đ' }}</span>
            </td>
           
            <td class="text-right">
                <a href="{{ route('sanpham.pricechart',$p->id) }}" class="btn btn-sm btn-info p-1" title="Biến động giá" data-bs-toggle="tooltip" data-bs-placement="top">
                    <i class="fas fa-signal"></i>
                </a>
                <a href="{{ route('sanpham.show',$p->id) }}" class="btn btn-sm btn-success p-1" title="Xem thêm" data-bs-toggle="tooltip" data-bs-placement="top">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('sanpham.edit',$p->id) }}" class="btn btn-sm btn-primary p-1" title="Cập nhật" data-bs-toggle="tooltip" data-bs-placement="top">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('sanpham.destroy',$p->id) }}" class="btn btn-sm btn-danger p-1 deleteProduct">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- tạo form delete bên ngoài để có thể xóa nhiều đối tượng -->
<form action="" method="POST" id="form-delete"> 
    @csrf @method('DELETE')
</form>

<hr>
<div class="phantrang">
    {{ $product->appends(request()->all())->links() }} <!-- appends: tìm kiếm vẫn giữ được tham số trên url -->
</div>
@stop()

@section('js') <!-- click vào deleteProduct sẽ submit form-delete -->
<script>
    $('.deleteProduct').click(function(e) {
        e.preventDefault();                 //không cho load lại trang
        var _href = $(this).attr('href');     //lấy href = cái href vừa được click
        $('form#form-delete').attr('action',_href);    //submit form-delete với link xóa vừa lấy    
        if(confirm('Bạn có chắc muốn xóa không?')) {    
            $('form#form-delete').submit();
        }
    })
</script>
@stop()