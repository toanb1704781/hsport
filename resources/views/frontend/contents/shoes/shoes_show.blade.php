@extends('frontend.layouts.master')
@section('title', 'Giày cỏ nhân tạo')

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
                                        <a href="{{route('shoes.index')}}">
                                            Giày
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{$breadcrumb}}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="shop__sidebar">
                                @include('frontend.contents.shoes.shop_sidebar.shop_sidebar')
                            </div>
                        </div>
                        <div class="col-lg-9">
                            {{--  <div class="shop__product__option">
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
                            </div>  --}}
                            <div class="row">
                                @foreach ($shoes as $row_shoes)
                                    @foreach ($row_shoes->shoescolor as $shoescolor)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <a href="{{route('shoesdetail', ['shoescolorID' => $shoescolor->shoescolorID])}}">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="product__item">
                                                        @if ($shoescolor->checkNew($shoescolor->created_at))
                                                            <span class="product_new">NEW</span>
                                                        @endif
                                                        @if($shoescolor->salePrice)
                                                            <span class="product_sale">SALE</span>
                                                        @endif
                                                        <div class="product__item__pic">
                                                            <img src="{{asset($shoescolor->shoesAvatar)}}" alt="">
                                                        </div>
                                                        <div class="product__item__text">
                                                            <h6>
                                                                {{$shoescolor->shoes->shoesName}} - {{$shoescolor->color->colorName}}
                                                            </h6>
                                                            <del>
                                                                @if ($shoescolor->salePrice)
                                                                    {{number_format($shoescolor->shoesPrice,0, "", ".")}}₫
                                                                @endif
                                                            </del>
                                                            <strong>
                                                                {{number_format($shoescolor->salePrice ?? $shoescolor->shoesPrice,0, "", ".")}}₫
                                                            </strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>  
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection