@extends('master')

@section('title','| Danh mục')

@section('content')
<!-- Breadcrumb -->
<section>
    <div class="container my-3">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <div class="col-12">
                    <ul class="breadcrumb my-2">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="home-page">Trang chủ</a>
                        </li>
                        @if(isset($danhmucall))
                        <li class="breadcrumb-item d-flex align-items-center fw-bold text-success">{{$danhmuc3->ten}}</li>
                        @endif
                        @if(isset($danhmuc2))
                        <li class="breadcrumb-item d-flex align-items-center fw-bold text-success">{{$danhmuc2->ten}}</li>
                        @endif
                        @if(isset($showbrand))
                        <li class="breadcrumb-item d-flex align-items-center">Thương hiệu</li>
                        <li class="breadcrumb-item d-flex align-items-center fw-bold text-success">{{$showbrand->ten}}</li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>

<!-- CONTENT -->
<div class="container">
    <div class="row">
        <div class="col-xxl-3 col-lg-4 col-md-12 col-12">
            <div class="card mb-3">
                <div class="card-header  fw-bold text-center">
                    DANH MỤC SẢN PHẨM
                </div>
                <div class="list-group list-group-flush">
                    @foreach($danhmuc as $dm)
                    <a href="{{ route('view',$dm->slug) }}" class="list-group-item list-group-item-action py-1">
                        <?php
                        if ($dm->parent_id == 0) {
                            $data = $dm->ten;
                        } else {
                            $data = '<i class="fas fa-level-up-alt fa-rotate-90 mx-2"></i>'.$dm->ten;
                        }
                        if ($dm->parent_id == 0) {
                            $tmp = $dm->products->count();
                            foreach ($danhmuc as $item_tmp) {
                                if ($item_tmp->parent_id == $dm->id) {
                                    $tmp += $item_tmp->products->count();
                                }
                            }

                            $data = $data .' <span class="text-success">('.$tmp.')</span>';
                        } else {
                            $data = $data .' <span class="text-success">('.$dm->products->count().')</span>';
                        }
                        echo $data;
                        ?>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header  fw-bold text-center">
                    THƯƠNG HIỆU
                </div>
                <div class="list-group list-group-flush">
                    @foreach($thuonghieu as $th)
                    <a href="{{ route('view',$th->slug) }}" class="list-group-item list-group-item-action py-1">
                        {{ $th->ten }}
                        <span class="text-success">({{ $th->productBrand->count() }})</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- neu khong co danhmuc con -->
        @if(isset($danhmuc2))
        <div class="col-xxl-9 col-lg-8 col-md-12 col-12">
            <div class="col-12 border-bottom border-dark mb-3 head-box d-inline-block">
                <div class="text-uppercase h4 d-inline-block">{{$danhmuc2->ten}}</div>
                <!-- <div class="order-by-box d-block float-end">
                    <a href="#" class="btn btn-sm btn-outline-dark">Mới về</a>
                    <a href="#" class="btn btn-sm btn-outline-dark">Giá</a>
                </div> -->
            </div>
            <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-2 px-2">
                @foreach($danhmuc2->products as $sp)
                <?php 
                $i = 0; $p = 0;
                foreach($danhmucparent as $dmp){
                    if($dmp->id == $sp->danhmucsp_id){
                        $p = $dmp->parent_id;
                    }
                }
                foreach ($khuyenmai as $km) {
                    if ($sp->danhmucsp_id == $km->danhmucsp_id || $p == $km->danhmucsp_id) {
                        $i += $km->giatri;
                    }
                }
                ?>
                <div class="col px-0">
                    <div class="card item">
                        <a href="{{ route('view',['slug'=>$sp->slug]) }}">
                            <div class="card-body p-0">
                                @if($i > 0)
                                <span class="badge bg-success" style="position:absolute; right:5px; top:5px; z-index:10">-{{$i}}%</span>
                                @endif
                                @if($sp->soluong  == 0)
                                <div class="ribbon-wrapper ribbon-xl">
                                    <div class="ribbon bg-danger text-white fw-bold">
                                        Tạm hết hàng
                                    </div>
                                </div>
                                @endif
                                <img src="{{url('uploads')}}/{{$sp->hinhanh}}" class="item-img">
                                <h6 class="item-name pt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$sp->ten}}">
                                    {{$sp->ten}}
                                </h6>
                                @if($i > 0)
                                <div class="box-old-price">
                                    <span class="old-price">{{number_format($sp->gia_ban).'đ'}}</span>
                                </div>
                                <div class="price">
                                    {{number_format($sp->gia_ban - $sp->gia_ban*$i/100)}}đ
                                </div>
                                @else
                                <div class="box-old-price">
                                    <span class="price">{{number_format($sp->gia_ban).'đ'}}</span>
                                </div>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <!-- Neu co danhmuc cha+con -->
        @if(isset($danhmucall))
        <div class="col-xxl-9 col-lg-8 col-md-12 col-12">
            <div class="col-12 border-bottom border-dark mb-3 head-box d-inline-block">
                <div class="text-uppercase h4 d-inline-block">{{$danhmuc3->ten}}</div>
                <!-- <div class="order-by-box d-block float-end">
                    <a href="#" class="btn btn-sm btn-outline-dark">Mới về</a>
                    <a href="#" class="btn btn-sm btn-outline-dark">Giá</a>
                </div> -->
            </div>

            <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-2 px-2">
                @foreach($danhmucall as $dma)
                    <?php $i = 0;
                    foreach ($khuyenmai as $km) {
                        if ($dma->id == $km->danhmucsp_id || $km->danhmucsp_id == $dma->parent_id) {
                            $i += $km->giatri;
                        }
                    }
                    ?>
                    @foreach($sanphamall as $sp)
                        @if($dma->id == $sp->danhmucsp_id)
                        <div class="col px-0">
                            <div class="card item">
                                <a href="{{ route('view',['slug'=>$sp->slug]) }}">
                                    <div class="card-body p-0">
                                        @if($i > 0)
                                        <span class="badge bg-success" style="position:absolute; right:5px; top:5px; z-index:10">-{{$i}}%</span>
                                        @endif
                                        @if($sp->soluong == 0)
                                        <div class="ribbon-wrapper ribbon-xl">
                                            <div class="ribbon bg-danger text-white fw-bold">
                                            Tạm hết hàng
                                            </div>
                                        </div>
                                        @endif
                                        <img src="{{url('uploads')}}/{{$sp->hinhanh}}" class="item-img">
                                        <h6 class="item-name pt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$sp->ten}}">
                                            {{$sp->ten}}
                                        </h6>
                                        @if($i > 0)
                                        <div class="box-old-price">
                                            <span class="old-price">{{number_format($sp->gia_ban).'đ'}}</span>
                                        </div>
                                        <div class="price">
                                            {{number_format($sp->gia_ban - $sp->gia_ban*$i/100)}}đ
                                        </div>
                                        @else
                                        <div class="box-old-price">
                                            <span class="price">{{number_format($sp->gia_ban).'đ'}}</span>
                                        </div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
        @endif

        @if(isset($showbrand))
        <div class="col-xxl-9 col-lg-8 col-md-12 col-12">
            <div class="col-12 border-bottom border-dark mb-3 head-box d-inline-block">
                <div class="text-uppercase h4 d-inline-block">{{$showbrand->ten}}</div>
                <!-- <div class="order-by-box d-block float-end">
                    <a href="#" class="btn btn-sm btn-outline-dark">Mới về</a>
                    <a href="#" class="btn btn-sm btn-outline-dark">Giá</a>
                </div> -->
            </div>

            <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-2 px-2">
                @foreach($showbrand->productBrand as $sp)
                <?php 
                $i = 0; $p = 0;
                foreach ($danhmucparent as $dmp) {
                    if($dmp->id == $sp->danhmucsp_id){
                        $p = $dmp->parent_id;
                    }
                }
                foreach($khuyenmai as $km) {
                    if($sp->danhmucsp_id == $km->danhmucsp_id || $p == $km->danhmucsp_id){
                        $i += $km->giatri;
                    }
                }
                ?>
                <div class="col px-0">
                    <div class="card item">
                        <a href="{{ route('view',['slug'=>$sp->slug]) }}">
                            <div class="card-body p-0">
                                @if($i > 0)
                                <span class="badge bg-success" style="position:absolute; right:5px; top:5px; z-index:10">-{{$i}}%</span>
                                @endif
                                @if($sp->soluong  == 0)
                                <div class="ribbon-wrapper ribbon-xl">
                                    <div class="ribbon bg-danger text-white fw-bold">
                                        Tạm hết hàng
                                    </div>
                                </div>
                                @endif
                                <img src="{{url('uploads')}}/{{$sp->hinhanh}}" class="item-img">
                                <h6 class="item-name pt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$sp->ten}}">
                                    {{$sp->ten}}
                                </h6>
                                <!-- Có biến khuyến mãi thì hiện -->
                                @if($i > 0)
                                <div class="box-old-price">
                                    <span class="old-price">{{number_format($sp->gia_ban).'đ'}}</span>
                                </div>
                                <div class="price">
                                    {{number_format($sp->gia_ban - $sp->gia_ban*$i/100)}}đ
                                </div>
                                @else
                                <div class="box-old-price">
                                    <span class="price">{{number_format($sp->gia_ban).'đ'}}</span>
                                </div>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@stop()

@section('css')
<style>
    .ribbon-wrapper.ribbon-xl {
        height: 180px;
        width: 180px;
    }
    .ribbon-wrapper {
        height: 70px;
        overflow: hidden;
        position: absolute;
        right: -2px;
        top: -2px;
        width: 70px;
        z-index: 10;
    }
    .ribbon-wrapper.ribbon-xl .ribbon {
        right: -20px;
        top: 30px;
        width: 240px;
    }
    .ribbon-wrapper .ribbon {
        box-shadow: 0 0 3px rgb(0 0 0 / 30%);
        font-size: .7rem;
        line-height: 100%;
        padding: 0.375rem 0;
        position: relative;
        right: -2px;
        text-align: center;
        text-shadow: 0 -1px 0 rgb(0 0 0 / 40%);
        text-transform: uppercase;
        top: 10px;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        width: 90px;
    }
</style>
@stop()