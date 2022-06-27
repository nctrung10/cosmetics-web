@extends('master')

@section('title', '| '.$showsp->ten)

@section('content')
<!-- NOTICE -->
@if(Session::has('success'))
<div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 11;">
    <div class="toast text-center" data-bs-delay="1500" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header py-1">
            <strong class="mx-auto">THÔNG BÁO</strong>
        </div>
        <div class="toast-body bg-success text-white" style="font-weight: 500;">
            <i class="fas fa-check-circle"></i>
            {{ Session::get('success') }}
        </div>

    </div>
</div>
@endif
@if(Session::has('wrong'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11; top:16px !important">
    <div class="toast text-center" data-bs-delay="1200" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header py-1">
            <strong class="mx-auto">THÔNG BÁO</strong>
        </div>
        <div class="toast-body bg-danger text-white" style="font-weight: 500;">
            <i class="fas fa-times-circle"></i>
            {{ Session::get('wrong') }}
        </div>

    </div>
</div>
@endif
@if(Session::has('error'))
<div class="position-fixed top-50 start-50 translate-middle" style="z-index: 1000">
    <div class="toast text-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-warning text-dark py-3">
            <strong class="mx-auto">THÔNG BÁO</strong>
        </div>
        <div class="toast-body bg-white fw-bold py-3">
            <i class="fas fa-exclamation-triangle"></i>
            {{ Session::get('error') }}
            <div class="mt-4 pt-4 pb-2 border-top border-dark">
                <a href="{{ route('dangnhap') }}" class="btn btn-outline-success">Đăng nhập</a>
                <button type="button" class="btn btn-outline-secondary " data-bs-dismiss="toast">Hủy</button>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Breadcrumb -->
<section>
    <div class="container">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <div class="col-12">
                    <ul class="breadcrumb my-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('trangchu') }}" class="home-page">Trang chủ</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route('view',$showsp->cat->slug) }}" class="home-page">{{$showsp->cat->ten}}</a>
                        </li>

                        <li class="breadcrumb-item text-success fw-bold">{{$showsp->ten}}</li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>
<!-- Main Content -->
<div class="container mb-4">
    <form action="{{ route('cart.add',['id' => $showsp->id ]) }}" method="GET">
        @csrf
        <div class="row">
            <div class="col-xxl-5 col-lg-5 col-md-12 col-12 mt-3">
                <?php
                //ma hoa chuoi json
                $images = json_decode($showsp->image_list);
                ?>
                <ul id="imageGallery" class="product-detail-img">
                    <li data-thumb="{{url('uploads')}}/{{$showsp->hinhanh}}" data-src="{{url('uploads')}}/{{$showsp->hinhanh}}">
                        <img class="image-main" src="{{url('uploads')}}/{{$showsp->hinhanh}}"/>
                    </li>
                    @if(is_array($images))
                    @foreach($images as $img)
                    <li data-thumb="{{url('uploads')}}/{{$img}}" data-src="{{url('uploads')}}/{{$img}}">
                        <img class="image-main" src="{{url('uploads')}}/{{$img}}"/>
                    </li>
                    @endforeach
                    @else
                    <li data-thumb="{{url('uploads')}}/{{$showsp->hinhanh}}" data-src="{{url('uploads')}}/{{$showsp->hinhanh}}">
                        <img class="image-main" src="{{url('uploads')}}/{{$showsp->hinhanh}}"/>
                    </li>
                    @endif
                </ul>
                <!-- <div class="product-detail-img">
                    <img class="image-main" src="{{url('uploads')}}/{{$showsp->hinhanh}}">
                    <div class="img-slider owl-carousel owl-theme">
                        @if(is_array($images))
                        @foreach($images as $img)
                        <img src="{{url('uploads')}}/{{$img}}">
                        @endforeach
                        @else
                        <img src="" class="border border-dark">
                        @endif
                    </div>
                </div> -->
            </div>

            <div class="col-xxl-4 col-lg-4 col-md-12 col-12 mt-3 px-2">
                <div class="product-detail-info">
                    <div class="product-title">{{$showsp->ten}}</div>
                    <?php 
                    $i = 0; $p = 0;
                    foreach($danhmucparent as $d) {
                        if($d->id == $showsp->danhmucsp_id){
                            $p = $d->parent_id;
                        }
                    }
                    foreach ($khuyenmai as $km) {
                        if($km->danhmucsp_id == $showsp->danhmucsp_id || $km->danhmucsp_id == $p){
                            $i += $km->giatri;
                        }
                    }
                    ?>
                    @if($i > 0)
                        <span class="badge bg-success">-{{$i}}%</span>
                    @endif
                    <div class="star-review">
                        <?php 
                            $tong = 0;
                            $trungbinh = 0;
                            foreach($danhgiaspall as $data){
                                $tong += $data->sosao;
                            }
                            $dem = $danhgiaspall->count();
                            if($dem > 0){
                                $trungbinh = (float)($tong / $dem); 
                            }
                        ?>
                        <span>
                            @if($trungbinh == 0)
                            <span style="color:gray">★★★★★</span> 
                            @elseif($trungbinh > 0 && $trungbinh <= 1)
                            ★
                            @elseif($trungbinh > 1 && $trungbinh <= 2)
                            ★★
                            @elseif($trungbinh > 2 && $trungbinh <= 3)
                            ★★★
                            @elseif($trungbinh > 3 && $trungbinh <= 4)
                            ★★★★
                            @else
                            ★★★★★
                            @endif
                        </span> 
                        <a href="#review-list" class="text-decoration-none">
                            <span class="star-review-text">({{$danhgiasp->total()}} đánh giá)</span>
                        </a>
                    </div>

                    <div class="product-detail-price">
                        @if($i > 0)
                            <span class="old-price">{{number_format($showsp->gia_ban).'đ'}}</span>
                            <span class="text-success">
                                {{number_format($showsp->gia_ban - $showsp->gia_ban*$i/100)}}đ
                            </span>
                        @else
                            <span class="text-success">{{number_format($showsp->gia_ban).'đ'}}</span>
                        @endif
                    </div>
                    <div class="brief-info border-top border-bottom">
                        {!! $showsp->mota_ngan !!}
                    </div>
                    <div class="d-inline-block">
                        <span class="pe-1">Số lượng:</span>
                        <div class="product-detail-quantity">
                            @if($showsp->soluong <= 10 && $showsp->soluong > 0 )
                                <input class="form-control form-success" id="quantity-input" type="number" name="quantity" value="1" min="1" max="{{$showsp->soluong}}">
                                <span class="text-danger d-inline-block">Chỉ còn {{ $showsp->soluong }} sản phẩm</span>
                            @elseif($showsp->soluong == 0)
                                <input class="form-control form-success" id="quantity-input" type="number" name="quantity" value="0" min="0" max="0">
                                <span class="text-danger">Sản phẩm tạm hết hàng</span>
                            @else
                                <input class="form-control form-success" id="quantity-input" type="number" name="quantity" value="1" min="1" max="{{$showsp->soluong}}">
                            @endif
                        </div>

                        @if($showsp->soluong == 0 )
                        <button class="btn btn-success add-cart-btn" type="submit" disabled>Thêm vào giỏ hàng</button>
                        @else
                        <button class="btn btn-success add-cart-btn" type="submit">Thêm vào giỏ hàng</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3 col-md-12 col-12 mt-3">
                <div class="product-detail-more">
                    <h5>thông tin thêm</h5>
                    <table class="table table-striped table-borderless" style="font-size: 15px;">
                        <tbody>
                            <tr>
                                <td>Thương hiệu</td>
                                <td style="font-weight:500">{{$showsp->brand->ten}}</td>
                            </tr>
                            <tr>
                                <td>Loại sản phẩm</td>
                                <td style="font-weight:500">{{$showsp->cat->ten}}</td>
                            </tr>
                            <tr>
                                <td>Xuất xứ</td>
                                <td style="font-weight:500">{{$showsp->orgini->ten}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <table class="table table-striped table-borderless text-center border">
                        <tbody>
                            <tr class="text-success">
                                <th scope="row" colspan="2">
                                    <i class="fas fa-shipping-fast"></i>
                                    Miễn phí giao hàng
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">Đối với đơn hàng trên 600k</td>
                            </tr>
                            <tr class="text-success">
                                <th scope="row" colspan="2">
                                    <i class="fas fa-check"></i>
                                    Eden Beauty cam kết
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">Sản phẩm chính hãng 100%</td>
                            </tr>
                            <tr class="text-success">
                                <th scope="row" colspan="2">
                                    <i class="fas fa-search-dollar"></i>
                                    Hoàn tiền 200%
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">Nếu phát hiện hàng giả</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container mb-4">
    <hr class="line">
    <form action="" method="POST">

        <div class="row product-description">
            <div class="col-xxl-12 col-xs-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header product-detail_card-header">Thông tin sản phẩm</div>
                    <div class="card-body">
                        <div class="card-text des-content">
                            {!! $showsp->mota !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container mb-3">
    <div class="row">
        <div class="col-xxl-6 col-lg-6 col-md-12 col-12">
            <div class="card mb-3">
                <div class="card-header product-detail_card-header">đánh giá sản phẩm</div>
                <div class="card-body">
                    <form action="{{ route('danhgia',$showsp->id) }}" method="POST">
                        @csrf
                        <div class="evaluation-star">
                            <div class="fw-bold">Chọn số sao cho sản phẩm.</div>
                            <div class="d-inline-block">
                                <div class="rating-star">
                                    <input type="radio" id="star5" name="rate" value="5">
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4">
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3">
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2">
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1">
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="fw-bold mb-2">Mời bạn chia sẻ thêm về sản phẩm:</label>
                            <textarea class="form-control form-success" name="binhluan" rows="5"></textarea>
                            @error('binhluan')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <button class="form-control btn btn-success w-50" type="submit">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-lg-6 col-md-12 col-12">
            <div class="card mb-3" id="review-list">
                <div class="card-header product-detail_card-header">Danh sách đánh giá</div>
                @if(empty($danhgiasp->total()))
                <div class="card-body pb-1">
                    <span class="fw-bold text-success">Chưa có đánh giá cho sản phẩm này.</span>
                    <h6>Hãy đánh giá để giúp mọi người chọn được sản phẩm tốt nhất nhé.</h6>
                </div>
                @else
                @foreach($danhgiasp as $ds)
                <div class="card-body">
                    <div class="reviewer-name">
                        <span class="h6">{{ $ds->review->ten }}</span>
                        <span class="card-text ps-2"><small class="text-muted">{{date('d-m-Y',strtotime($ds->created_at))}}</small></span>
                    </div>
                    <div class="reviewer-rate-star">
                        @if($ds->sosao == 5 )
                        ★★★★★
                        @elseif($ds->sosao == 4 )
                        ★★★★
                        @elseif($ds->sosao == 3 )
                        ★★★
                        @elseif($ds->sosao == 2 )
                        ★★
                        @elseif($ds->sosao == 1 )
                        ★
                        @endif
                    </div>
                    <div class="reviewer-comment">
                        {{ $ds->binhluan }}
                    </div>
                </div>
                @endforeach
                @endif
                <div class="card-body p-2">
                    <div class="phantrang">
                        {{ $danhgiasp->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-3">
    <div class="new-model mt-4">
        <h6 class="item-topic py-2">
            sản phẩm cùng loại
        </h6>
        <div class="container">
            <div class="row row-cols-xxl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-2">
                <!-- <div class="owl-carousel owl-theme"> -->
                @foreach($sametype as $st)
                <?php $i = 0;
                    foreach ($khuyenmai as $km) {
                        if ($st->danhmucsp_id == $km->danhmucsp_id) {
                            $i += $km->giatri;
                        }
                    }
                ?>
                <div class="col px-0">
                    <div class="card item">
                        <a href="{{ route('view',['slug'=>$st->slug]) }}">
                            <div class="card-body p-0">
                                @if($i > 0)
                                <span class="badge bg-success" style="position:absolute; right:5px; top:5px; z-index:10">-{{$i}}%</span>
                                @endif
                                <img src="{{url('uploads')}}/{{$st->hinhanh}}" class="item-img">
                                <h6 class="item-name pt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$st->ten}}">
                                    {{$st->ten}}
                                </h6>
                                @if($i > 0)
                                <div class="box-old-price">
                                    <span class="old-price">{{number_format($st->gia_ban).'đ'}}</span>
                                </div>
                                <div class="price">
                                    {{number_format($st->gia_ban - $st->gia_ban*$i/100)}}đ
                                </div>
                                @else
                                <div class="box-old-price">
                                    <span class="price">{{number_format($st->gia_ban).'đ'}}</span>
                                </div>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                <!-- </div> -->
                <!-- <div class="col-12 see-more-link">
                    <a href="#">Xem thêm</a>
                </div> -->
            </div>
        </div>
    </div>
</div>
@stop()
@section('css')
<link type="text/css" rel="stylesheet" href="{{url('frontend')}}/css/lightslider.css" />
<link type="text/css" rel="stylesheet" href="{{url('frontend')}}/css/prettify.css" />
<link type="text/css" rel="stylesheet" href="{{url('frontend')}}/css/lightgallery.min.css" />
<style>
    .phantrang .pagination {
        justify-content: center !important;
        margin: 0;
    }
    .page-link {
        color: #0b643b !important;
        border: 1px solid #0b643b;
    }
    .page-link:hover {
        border: 1px solid #0b643b;
    }
    .page-link:focus {
        box-shadow: 0 0 0 0.25rem rgb(14 116 12 / 25%) !important;
    }
    .page-item.disabled .page-link {
        border-color: #2bc07b;
    }
    .page-item.active .page-link {
        background-color: #0b643b !important;
        border-color: #0b643b !important;
        color: #fff !important;
    }

</style>
@stop()
<!-- Custom image-list slider -->
@section('js')
<script src="{{url('frontend')}}/js/lightslider.js"></script>
<script src="{{url('frontend')}}/js/lightgallery-all.min.js"></script>
<script src="{{url('frontend')}}/js/prettify.js"></script>
<script type="text/javascript">
    /* $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            dots: false,
            items: 4,
            responsive: {
                0: {
                    items: 3
                },
                600: {
                    items: 3
                },
                800: {
                    items: 4
                },
                900: {
                    items: 4
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 3
                },
                1400: {
                    items: 4
                }
            }
        })
    }); */

    $(document).ready(function() {
        $('#imageGallery').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            thumbItem: 4,
            slideMargin: 0,
            enableDrag: false,
            currentPagerPosition: 'left',
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }
        });
    });
</script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@stop()