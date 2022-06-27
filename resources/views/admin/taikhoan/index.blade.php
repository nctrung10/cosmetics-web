@extends('adminmaster')

@section('title', 'Quản lý tài khoản')

@section('content')
<h4 class="text-center text-secondary mb-5">Danh sách tài khoản quản trị</h4>

<div class="row">
    <div class="col-lg-5 col-12 mb-3">
        <form action="" class="search-form">
            <div class="input-group">
                <input type="search" class="form-control" name="key" placeholder="Nhập tên tài khoản...">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-7 col-12 text-right mb-3">
        <a href="{{ route('taikhoan.create') }}" class="btn btn-primary"  
        data-bs-toggle="tooltip" data-placement="left" title="Thêm tài khoản mới">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</div>

<table class="table table-hover table-responsive-lg">
    <thead class="bg-dark">
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Ngày tạo</th>
        <th class="text-right px-4">Xử lý</th>
    </thead>
    <tbody>
        @foreach($dataTK as $tk)
        <tr class="text-capatalize">
            <td>{{$tk->id}}</td>
            <td>{{$tk->ten}}</td>
            <td>{{$tk->email}}</td>
            <td>{{$tk->created_at->format('d-m-Y')}}</td>
            <td class="text-right">
               <!--  <a href="{{ route('taikhoan.edit',$tk->id) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-placement="top" title="Sửa danh mục">
                    <i class="fas fa-edit"></i>
                </a> -->
                <a href="{{ route('taikhoan.destroy',$tk->id) }}" class="btn btn-sm btn-danger deleteUser">
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
    {{ $dataTK->appends(request()->all())->links() }} <!-- appends: tìm kiếm vẫn giữ được tham số tìm kiếm trên url -->
</div>
@stop()

@section('js') <!-- click vào deleteUser sẽ submit form-delete -->
<script>
    $('.deleteUser').click(function(event){
        event.preventDefault();             //không cho load lại trang
        var _href = $(this).attr('href');     //lấy href = cái href vừa được click
        $('form#form-delete').attr('action',_href);    //submit form-delete với link xóa vừa lấy
        if(confirm('Bạn có chắc muốn xóa không?')){    
            $('form#form-delete').submit();
        }
    })
</script>
@stop()