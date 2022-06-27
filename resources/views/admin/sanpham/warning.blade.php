@extends('adminmaster')

@section('title', 'Sản phầm gần / đã hết')

@section('content')
<h4 class="text-center text-secondary mb-5">Danh sách sản phẩm</h4>
<div class="row">
    <div class="col-lg-5 col-12 mb-3">
        <form action="" class="search-form">
            <div class="input-group">
                <input type="search" class="form-control" name="key" placeholder="Tìm kiếm tên sản phẩm...">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<table class="table table-hover table-responsive-lg">
    <thead class="bg-dark">
        <th>#</th>
        <th>Ảnh</th>
        <th style="width:420px">Tên sản phẩm</th>
        <th>Danh mục</th>
        <th class="text-center">Số lượng</th>
        <th class="pl-4">Giá nhập / Giá bán</th>
        <th class="text-right px-4">Xử lý</th>
    </thead>
    <tbody>
        <?php $i=1; ?>
        @foreach($product as $p)
        <tr>
            <th scope="col">{{ $i++ }}</th>
            <td>
                <img src="{{url('uploads')}}/{{$p->hinhanh}}" width="60" height="60">
            </td>
            <td>{{$p->ten}}</td>
            <td>{{$p->cat->ten}}</td>
            <td class="text-danger text-center">{{$p->soluong}}</td>
            <td class="pl-4">
                {{ number_format($p->gia).'đ' }} / 
                <span class="text-success">{{ number_format($p->gia_ban).'đ' }}</span>
            </td>
           
            <td class="text-right">
                <a href="{{ route('sanpham.pricechart',$p->id) }}" class="btn btn-sm btn-info p-1" title="Biến động giá" data-bs-toggle="tooltip" data-bs-placement="top">
                    <i class="fas fa-signal"></i>
                </a>
                <a href="{{ route('sanpham.edit',$p->id) }}" class="btn btn-sm btn-primary p-1" title="Cập nhật" data-bs-toggle="tooltip" data-bs-placement="top">
                    <i class="fas fa-edit"></i>
                </a>
                <!-- <a href="{{ route('sanpham.show',$p->id) }}" class="btn btn-sm btn-success p-1" title="Xem thêm" data-bs-toggle="tooltip" data-bs-placement="top">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('sanpham.destroy',$p->id) }}" class="btn btn-sm btn-danger p-1 deleteProduct">
                    <i class="fas fa-trash"></i>
                </a> -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<hr>
<div class="phantrang">
    {{ $product->appends(request()->all())->links() }} <!-- appends: tìm kiếm vẫn giữ được tham số trên url -->
</div>
@stop()
