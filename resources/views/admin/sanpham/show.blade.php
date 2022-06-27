@extends('adminmaster')

@section('title', 'Thông tin chi tiết')

@section('content')
<?php 
    $images = json_decode($sanpham->image_list);    //chuyển chuỗi json thành ảnh
?>

<div class="row">
    <div class="col-md-5">
        <img src="{{url('uploads')}}/{{$sanpham->hinhanh}}" style="width:100%">
        <hr>
        @if(is_array($images))  <!-- có mảng mới hiện danh sách ảnh -->
        <div class="row">
            @foreach($images as $img)
            <div class="col-md-4">
                <img src="{{url('uploads')}}/{{$img}}" style="width:100%; height:180px">
            </div>
            @endforeach
        </div>
        @endif
    </div>
    <div class="col-md-7">
        <h3>{{ $sanpham->ten }}</h3>
        <h6 class="font-weight-bold">
            Ngày sản xuất: <span class="font-weight-normal">{{date('d-m-Y',strtotime($sanpham->nsx)) }}</span> /
            Hạn sử dụng: <span class="font-weight-normal">{{ date('d-m-Y',strtotime($sanpham->hsd)) }}</span>
        </h6>
        <h6 class="font-weight-bold">Số lượng: <span class="badge badge-primary px-3">{{ $sanpham->soluong }}</span></h6>
        <h6 class="font-weight-bold">Giá nhập: {{ number_format($sanpham->gia).'đ' }}</h6>
        <h6 class="text-success font-weight-bold">Giá bán: {{ number_format($sanpham->gia_ban).'đ' }}</h6>
        <h5 class="bg-secondary px-5 d-inline-block">Mô tả ngắn</h5>
        <h6 class="mota-ngan">{!! $sanpham->mota_ngan !!}</h6>
        <h5 class="bg-secondary px-5 d-inline-block">Thông tin sản phẩm</h5>
        <h6 class="mota">{!! $sanpham->mota !!}</h6>
    </div>
    <div class="col-12 mt-2">
        <a href="{{ route('sanpham.index') }}" class="btn btn-dark">Quay lại</a>
    </div>
</div>
@stop()
@section('css')
<style>
    .mota p img{
        width: 450px !important;
        height: auto !important;
        margin: 10px auto !important;
    }
</style>
@stop()