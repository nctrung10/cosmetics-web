@extends('master')

@section('title', '| '.$blog->chude)

@section('content')
<!-- Breadcrumb -->
<section>
    <div class="container">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <div class="col-12">
                    <ul class="breadcrumb my-3">
                        <li class="breadcrumb-item">
                            <a href="{{ route('show.blog') }}" class="home-page">Blog</a>
                        </li>
                        <li class="breadcrumb-item text-success fw-bold">{{$blog->chude}}</li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>
<!-- CONTENT -->
<div class="container mt-3 mb-5">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-xxl-8 col-lg-8 col-md-12 col-12">
            <h1 class="blog-topic mb-4">{{ $blog->chude }}</h1>
            <div>
                <span class="release">{{ date('d-m-Y',strtotime($blog->created_at))}}</span>
                <span class="author float-end">by Eden Beauty</span>
            </div>
            <div class="mt-3">
                <img class="img-responsive" src="{{url('uploads')}}/{{$blog->hinhanh}}" width="100%" height="auto" alt="">
            </div>
            <div class="brief-des mt-2">
                {!! $blog->mota_ngan !!}
            </div>
            <hr>
            <div class="content">
                {!! $blog->noidung !!}
            </div>
            <hr>

        </div>
        <div class="col-xxl-3 col-lg-9 col-md-12 col-12"></div>
    </div>
</div>
@stop()
@section('css')
<style>
    .blog-topic {
        font-size: 36px; 
        color: #4a4a4a; 
        line-height:44px;
    }
    .release, .author {
        font-weight: 500;
        color: #666666;
    }
    .release {
        border-top: 4px solid #198754;
    }
</style>
@stop()