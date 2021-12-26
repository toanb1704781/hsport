@extends('frontend.layouts.master')
@section('title', 'Tin tức')

@section('main')
    <div class="container-fluid page-body-wrapper">

        <div class="main">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="shop__sidebar">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{route('frontend.index')}}">
                                                Trang chủ
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Tin tức
                                        </li>
                                    </ol>
                                </nav>
                                @include('frontend.contents.shoes.shop_sidebar.shop_sidebar')
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="shop__product__option">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="shop__product__option__left">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="shop__product__option__right">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($news as $row_news)
                                <div class="col-md-4 col-lg-4">
                                    <div class="card bg-light-news mb-3">
                                        <a href="{{route('tintuc.show', ['newsID' => $row_news->newsID])}}">
                                            <div class="news-hovereffect">
                                                <img class="img-responsive" src="{{asset($row_news->newsIMG)}}" alt="">
                                                <div class="overlay">
                                                    <h2>{{$row_news->newsTitle}}</h2>
                                                    <p>{!!Str::limit($row_news->news, 100)!!}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {{$news->links()}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection