@extends('master')

@section('title', '| Tìm kiếm sản phẩm')

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
                        <li class="breadcrumb-item d-flex align-items-center fw-bold text-success">Tìm kiếm</li>
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
                    @foreach($danhmuc as $key => $dm)
                    <a href="{{ route('view',$dm->slug) }}" class="list-group-item list-group-item-action py-1">
                        <?php
                        if ($dm->parent_id == 0) {
                            $data = $dm->ten;
                        } else {
                            $data = '<i class="fas fa-level-up-alt fa-rotate-90 mx-2"></i>'.$dm->ten;
                        }

                        if ($dm->parent_id == 0) {
                            $tmp = $dm->products->count();

                            foreach ($danhmuc as $key => $item_tmp) {
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
        @if(isset($timkiem_sp))
        <div class="col-xxl-9 col-lg-8 col-md-12 col-12">
            <div class="col-12 border-bottom border-dark mb-3 head-box d-inline-block">
                <div class="h5">
                    Có <span style=" font-weight:bold; color:#198754">{{$timkiem_sp->count()}}</span> 
                    kết quả tìm kiếm cho từ khóa 
                    '<span style=" font-weight:bold; color:#198754">{{$keywords}}</span>'
                </div>
            </div>
            <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-2 px-2">
                @foreach($timkiem_sp as $sp)
                <div class="col px-0">
                    <div class="card item">
                        <a href="{{ route('view',['slug'=>$sp->slug]) }}">
                            <div class="card-body p-0">
                                <img src="{{url('uploads')}}/{{$sp->hinhanh}}" class="item-img">
                                <h6 class="item-name pt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$sp->ten}}">
                                    {{$sp->ten}}
                                </h6>
                                @if($sp->gia_ban > 0)
                                <div class="box-old-price align-items-center">
                                    <span class="old-price">{{number_format($sp->gia).'đ'}}</span>
                                    <!-- <span class="percent ms-2 badge bg-success">70%</span> -->
                                </div>
                                <div class="price">
                                    {{number_format($sp->gia_ban).'đ'}}
                                </div>
                                @else
                                <div class="box-old-price">
                                    <span class="old-price">{{number_format($sp->gia).'đ'}}</span>
                                </div>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="col-xxl-9 col-lg-8 col-md-12 col-12">
            <div class="col-12 mb-3 head-box">
                <h4>Không có kết quả tìm kiếm</h4>
                <p style="font-weight: 500; color:red">Bạn vui lòng nhập ký tự vào thanh tìm kiếm.</p>    
            </div>
        </div>
        @endif
    </div>
</div>
@stop()

@section('js')
<script>

</script>
@stop()