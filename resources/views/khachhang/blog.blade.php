@extends('master')

@section('title', '| Blog')

@section('content')
<div class="container my-5">
    <h5 class="text-success fw-bold">BLOG</h5>
    <div class="row">
        @foreach($allblog as $ab)
        <div class="col-12 d-flex py-3">
            <div class="blog-thumb">
                <a href="{{ route('blog.detail',['slug'=>$ab->slug]) }}">
                    <img src="{{url('uploads')}}/{{$ab->hinhanh}}" alt="" width="350" height="200">
                    <div class="item-pic--effect"></div>
                </a>
            </div>
            <div class="blog-info ps-3">
                <h6 class="blog-topic">
                    <a href="{{ route('blog.detail',['slug'=>$ab->slug]) }}">{{$ab->chude}}</a>
                </h6>
                <p class="release">
                    {{date('d-m-Y',strtotime($ab->created_at))}}
                </p>
                <div class="brief-des">{!! $ab->mota_ngan !!}</div>
                <span class="blog-author" style="position: absolute;bottom: 0;font-weight: 500;color: #9a9b9c;">
                    by Eden Beauty
                </span>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="phantrang">

</div>
@stop()

@section('css')
<style>
    .blog-thumb {
        position: relative;
    }
    .blog-thumb:hover .item-pic--effect {
        opacity: 1;
    }
    .blog-info {
        position: relative;
    }
    .blog-topic {
        font-size: 18px;
    }
    .blog-topic a {
        text-decoration: none;
        color: #212529!important;
    }
    .blog-topic:hover a {
        color: #198a56 !important;
    }
    .release {
        font-size: 15px;
        margin-bottom: 1rem;
        font-weight: 500;
        color: #666666;
    }
    .brief-des {
        font-size: 15px;
    }
</style>
@stop()