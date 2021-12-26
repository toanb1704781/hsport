@section('title', 'Tin tức')
@extends('frontend.layouts.master')

    
@section('main')
<div class="container-fluid page-body-wrapper">

    <div class="main">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="shop__sidebar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('frontend.index')}}">
                                        Trang chủ
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a href="{{route('tintuc.index')}}">
                                        Tin tức
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{$news->newsTitle}}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="shop__sidebar">
                            @include('frontend.contents.shoes.shop_sidebar.shop_sidebar')
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="mb-4 card-title">TIN TỨC MỚI</h4>
                                </div>
                                @foreach ($all_news as $all_news)
                                    <div class="col-md-12 col-lg-12">
                                        <div class="card bg-light-news mb-3">

                                            <a href="{{route('tintuc.show', ['newsID' => $all_news->newsID])}}">
                                                <div class="card-body">
                                                    <img src="{{asset($all_news->newsIMG)}}" alt="">
                                                    <h6>
                                                        {{$all_news->newsTitle}}
                                                    </h6>
                                                    <p>{!!Str::limit($all_news->news, 100)!!}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="extends-news">
                                <a href="{{route('tintuc.index')}}">
                                    Xem thêm tin tức...
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12 news_css">
                                <h1>
                                    {{$news->newsTitle}}
                                </h1>
                                <br>
                                <i>
                                    Người đăng: {{$news->employee->information->name}}
                                </i> <br>
                                <i>
                                    Đăng vào lúc: {{$news->created_at}}
                                </i> <br> <hr><hr>
                                <p>
                                    {!!$news->news!!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection