@extends('adminmaster')

@section('title', 'Quản lý tài khoản')

@section('content')
<h4 class="text-center text-secondary mb-5">Danh sách tài khoản khách hàng</h4>

<div class="row">
    <div class="col-lg-5 col-12 mb-3">
        <form action="" class="search-form">
            <div class="input-group">
                <input type="search" class="form-control" name="key" placeholder="Nhập tên hoặc số điện thoại...">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<table class="table table-hover table-responsive-lg">
    <thead class="bg-dark">
        <th>ID</th>
        <th>Tên</th>
        <th>SĐT</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Ngày tạo</th>
        <!-- <th class="text-right px-4">Xử lý</th> -->
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach($cus_info as $tk)
        <tr class="text-capatalize" style="font-size: 14px;">
            <th scope="col">{{$i++}}</th>
            <td>{{$tk->ten}}</td>
            <td>{{$tk->sdt}}</td>
            <td>{{$tk->email}}</td>
            <td>{!! $tk->diachi !!}</td>
            <td>{{$tk->created_at->format('d-m-Y')}}</td>
            <!-- <td class="text-right">
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-placement="top" title="Xem thêm">
                    <i class="fas fa-eye"></i>
                </a>
            </td> -->
        </tr>
        @endforeach
    </tbody>
</table>


<hr>
<div class="phantrang">
    
</div>
@stop()

@section('js') 
@stop()