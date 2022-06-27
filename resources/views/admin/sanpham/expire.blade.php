@extends('adminmaster')

@section('title', 'Sản phẩm cận hạn sử dụng')

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
        <th>Hạn sử dụng</th>
        <th>Thời hạn còn</th>
        <th class="pl-4">Giá nhập / Giá bán</th>
        <th class="text-right px-4">Xử lý</th>
    </thead>
    <tbody>
        <?php $i=1; ?>
        @foreach($allpro as $p)
        @foreach($exp_product as $e)
        @if($e['id'] == $p->id)
        <tr>
            <th scope="col">{{ $i++ }}</th>
            <td>
                <img src="{{url('uploads')}}/{{$p->hinhanh}}" width="60" height="60">
            </td>
            <td>{{$p->ten}}</td>
            <td>{{$p->cat->ten}}</td> <!-- hàm cat ở model Sanpham lấy danh mục tương ứng -->
            <td>{{ date('d-m-Y',strtotime($p->hsd)) }}</td>
            <td class="text-center">
                @if($e['ngayconlai']<=0)
                <span class="text-danger">Hết hạn</span>
                @else
                <span class="text-danger">{{$e['ngayconlai']}}</span> ngày
                @endif
            </td>
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
                </a> -->
            </td>
        </tr>
        @endif
        @endforeach
        @endforeach
    </tbody>
</table>

<hr>
<!-- <div class="phantrang">
    $allpro->appends(request()->all())->links() 
</div> -->
@stop()
