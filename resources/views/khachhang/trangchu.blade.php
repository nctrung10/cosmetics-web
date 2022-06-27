@extends('master')

@section('title','| Chăm sóc sức khỏe sắc đẹp của bạn')

@section('content')
<!-- NOTICE -->
@if(Session::has('success'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div class="toast text-center" data-bs-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header text-center">
            <strong class="mx-auto">THÔNG BÁO</strong>
            <button type="button" class="btn-close ms-0" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-success text-white" style="font-weight: 500;">
            <i class="fas fa-check-circle"></i>
            {{ Session::get('success') }}
        </div>
    </div>
</div>
@endif
@if(Session::has('success_order'))
<div class="position-fixed top-50 start-50 translate-middle" style="z-index: 11">
    <div class="toast text-center w-100" style="box-shadow: 0rem 0rem 1rem rgba(0,0,0,.5);" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header text-dark py-3">
            <strong class="mx-auto">THÔNG BÁO</strong>
        </div>
        <div class="toast-body bg-success text-white fs-6 py-5">
            <i class="fas fa-check-circle"></i>
            {{ Session::get('success_order') }}
            <p class="pt-2">Vui lòng kiểm tra email để xem chi tiết đơn hàng của bạn.</p>
            <div class="mt-4 pt-4 pb-2 border-top border-white">
                <button type="button" class="px-4 btn btn-dark w-25" data-bs-dismiss="toast">OK</button>
            </div>
        </div>
    </div>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="carousel-banner mt-2">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                           $i = 0;
                        ?>
                        @foreach($banner as $key => $slide)
                        <?php
                            $i++;
                        ?>
                        <div class="carousel-item {{ $i==1 ? 'active' : ''}}">
                            <img class="d-block w-100 img img-responsive" src="{{url('uploads')}}/{{$slide->hinhanh}}" alt="{{ $slide->mota }}"/>
                            <div class="carousel-caption d-none d-md-block bg-light" 
                            style="bottom:65%; width:max-content; left:35%; padding:1rem; border-radius:5px; box-shadow: 0 0.2rem 1rem rgba(11 100 59 / 35%);">
                                <h5 class="fw-bold text-secondary">{{ $slide->ten }}</h5>
                                <div class="des-banner text-secondary">{!! $slide->mota !!}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="best-seller mt-4">
        <h6 class="item-topic py-2">
            Sản phẩm bán chạy
        </h6>
        <div class="container p-0">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach($arr as $a)
                    <!-- neu soluong ban >= 6 -->
                    @if($a['soluong'] >= 6)
                        @foreach($best_seller as $bs)
                        @if($a['sanpham_id'] == $bs->id)
                        <?php 
                        $i = 0; $p = 0;
                        foreach($danhmucparent as $d){
                            if($d->id == $bs->danhmucsp_id){
                                $p = $d->parent_id;
                            }
                        }
                        foreach($khuyenmai as $km){
                            if ($bs->danhmucsp_id == $km->danhmucsp_id || $km->danhmucsp_id == $p) {
                                $i += $km->giatri;
                            }
                        }
                        ?>
                        <div class="card item">
                            <a href="{{ route('view',['slug'=>$bs->slug]) }}">
                                <div class="card-body p-0">
                                    @if($i > 0)
                                    <span class="badge bg-success" style="position:absolute; right:5px; top:5px; z-index:10">-{{$i}}%</span>
                                    @endif
                                    <img src="{{url('uploads')}}/{{$bs->hinhanh}}" class="item-img">
                                    <h6 class="item-name pt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$bs->ten}}">
                                        {{$bs->ten}}
                                    </h6>
                                    @if($i > 0)
                                    <div class="box-old-price">
                                        <span class="old-price">{{number_format($bs->gia_ban).'đ'}}</span>
                                    </div>
                                    <div class="price">
                                        {{number_format($bs->gia_ban - $bs->gia_ban*$i/100)}}đ
                                    </div>
                                    @else
                                    <div class="box-old-price">
                                        <span class="price">{{number_format($bs->gia_ban).'đ'}}</span>
                                    </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="new-model mt-4">
        <h6 class="item-topic py-2">
            sản phẩm mới
        </h6>
        <div class="container">
            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-2">
                @foreach($new_product as $np)
                <?php 
                $i = 0; $p = 0;
                foreach($danhmucparent as $d){
                    if($d->id == $np->danhmucsp_id){
                        $p = $d->parent_id;
                    }
                }
                foreach ($khuyenmai as $km) {
                    if ($np->danhmucsp_id == $km->danhmucsp_id || $km->danhmucsp_id == $p) {
                        $i += $km->giatri;
                    }
                }
                ?>
                <div class="col px-0">
                    <div class="card item">
                        <a href="{{ route('view',['slug'=>$np->slug]) }}">
                            <div class="card-body p-0">
                                @if($i > 0)
                                <span class="badge bg-success" style="position:absolute; right:5px; top:5px; z-index:10">-{{$i}}%</span>
                                @endif
                                <img src="{{url('uploads')}}/{{$np->hinhanh}}" class="item-img">
                                <h6 class="item-name pt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$np->ten}}">
                                    {{$np->ten}}
                                </h6>
                                @if($i > 0)
                                <div class="box-old-price">
                                    <span class="old-price">{{number_format($np->gia_ban)}}đ</span>
                                </div>
                                <div class="price">
                                    {{number_format($np->gia_ban - $np->gia_ban*$i/100)}}đ
                                </div>
                                @else
                                <div class="box-old-price">
                                    <span class="price">{{number_format($np->gia_ban)}}đ</span>
                                </div>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row stand-banner mt-4">
        <img src="{{url('frontend')}}/image/banner-2.jpg">
    </div>

    <div class="prefer mt-4">
        <h6 class="item-topic py-2">
            CÓ THỂ BẠN SẼ THÍCH
        </h6>
        <div class="container p-0">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach($may_like as $data)
                    <?php 
                    $i = 0; $p = 0;
                    foreach($danhmucparent as $d){
                        if($d->id == $data->danhmucsp_id){
                            $p = $d->parent_id;
                        }
                    }
                    foreach ($khuyenmai as $km) {
                        if ($data->danhmucsp_id == $km->danhmucsp_id || $km->danhmucsp_id == $p) {
                            $i += $km->giatri;
                        }
                    }
                    ?>
                    <div class="card item">
                        <a href="{{ route('view',['slug'=>$data->slug]) }}">
                            <div class="card-body p-0">
                                @if($i > 0)
                                <span class="badge bg-success" style="position:absolute; right:5px; top:5px; z-index:10">-{{$i}}%</span>
                                @endif
                                <img src="{{url('uploads')}}/{{$data->hinhanh}}" class="item-img">
                                <h6 class="item-name pt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$data->ten}}">
                                    {{ $data->ten }}
                                </h6>
                                @if($i > 0)
                                <div class="box-old-price">
                                    <span class="old-price">{{number_format($data->gia_ban).'đ'}}</span>
                                </div>
                                <div class="price">
                                    {{number_format($data->gia_ban - $data->gia_ban*$i/100)}}đ
                                </div>
                                @else
                                <div class="box-old-price">
                                    <span class="price">{{number_format($data->gia_ban).'đ'}}</span>
                                </div>
                                @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="blog mt-4">
        <h6 class="item-topic py-2">
            Tin tức - bài viết
        </h6>
        <div class="row row-cols-xxl-3 row-cols-lg-3 row-cols-md-2 row-cols-1">
            @foreach($blogs as $b)
            <div class="col mt-1">
                <div class="blog-item">
                    <a href="{{ route('blog.detail',['slug'=>$b->slug]) }}">
                        <div class="blog-item-pic">
                            <img src="{{url('uploads')}}/{{$b->hinhanh}}">
                            <div class="item-pic--effect"></div>
                        </div>
                        <h6 class="blog-item-name">
                            {{ $b->chude }}
                        </h6>
                    </a>
                </div>
            </div>
            @endforeach
            <div class="col-xl-12 col-md-12 col-12 see-more-link">
                <a href="{{ route('show.blog') }}">Xem thêm</a>
            </div>
        </div>
    </div>

    <hr>
    <div class="end-site">
        <div class="row row-cols-xxl-3 row-cols-lg-3 row-cols-md-2 row-cols-1">
            <div class="col py-3">
                <div class="box">
                    <i class="fa fa-shipping-fast fs-3 text-success"></i>
                    <div class="topic ps-4">
                        <h6>Miễn phí giao hàng</h6>
                        <span>Đối với đơn hàng trên 600k</span>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <div class="box">
                    <i class="fa fa-check fs-3 text-success"></i>
                    <div class="topic ps-4">
                        <h6>Eden Beauty cam kết</h6>
                        <span>Sản phẩm chính hãng 100%</span>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <div class="box">
                    <i class="fa fa-search-dollar fs-3 text-success"></i>
                    <div class="topic ps-4">
                        <h6>Hoàn tiền 200%</h6>
                        <span>Nếu phát hiện hàng giả</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop()
@section('css')
<style>
    .des-banner p {
        margin: 0;
    }
</style>
@stop()
@section('js')
<!-- custom owlcarousel -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: false,
            autoplay: false,
            autoplayTimeout: 3500,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                800: {
                    items: 3
                },
                900: {
                    items: 3
                },
                1000: {
                    items: 4
                },
                1200: {
                    items: 4
                },
                1400: {
                    items: 5
                }
            }
        })
    });

    /* Tooltip product name */
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@stop()