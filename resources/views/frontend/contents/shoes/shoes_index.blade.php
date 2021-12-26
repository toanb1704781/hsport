@extends('frontend.layouts.master')
@section('title', 'Giày')

@section('main')
    <div class="container-fluid page-body-wrapper">

        <div class="main">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 shop__sidebar">
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
                        <div class="col-6">
                            <div class="shop__product__option">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="shop__product__option__left">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <form action="{{route('shoes.index')}}" method="GET" id="form">
                                        <div class="shop__product__option__right">
                                            <p>Sắp xếp theo:</p>
                                                <select id="filter" name="sapxep" onchange="filter_change()">
                                                    <option id="" value="">...</option>
                                                    <option id="gia-thap-toi-cao" value="gia-thap-toi-cao">Giá thấp tới cao</option>
                                                    <option id="gia-cao-toi-thap" value="gia-cao-toi-thap">Giá cao tới thấp</option>
                                                </select>
                                            </form>
                                            <script>
                                                var value = @php
                                                    echo json_encode($value)
                                                @endphp;
                                                var option = document.getElementById(value).selected = true;
                                                function filter_change() {
                                                    var form = document.getElementById('form');
                                                    form.submit();
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="shop__sidebar">
                                @include('frontend.contents.shoes.shop_sidebar.shop_sidebar')
                            </div>
                        </div>
                        <div class="col-lg-9">

                            <div class="row">
                                @foreach ($shoescolor as $row)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <a href="{{route('shoesdetail', ['shoescolorID' => $row->shoescolorID])}}">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="product__item">
                                                        @if ($row->checkNew($row->created_at))
                                                            <span class="product_new">NEW</span>
                                                        @endif
                                                        @if($row->salePrice)
                                                            <span class="product_sale">SALE</span>
                                                        @endif
                                                        <div class="product__item__pic">
                                                            <img src="{{asset($row->shoesAvatar)}}" alt="">
                                                        </div>
                                                        <div class="product__item__text">
                                                            <h6>
                                                                {{$row->shoes->shoesName}} - {{$row->color->colorName}}
                                                            </h6>
                                                            @if ($row->checkSize($row->shoescolorID))
                                                                <del>
                                                                    @if ($row->salePrice)
                                                                        {{number_format($row->shoesPrice,0, "", ".")}}₫
                                                                    @endif
                                                                </del>
                                                                <strong>
                                                                    {{number_format($row->salePrice ?? $row->shoesPrice,0, "", ".")}}₫
                                                                </strong>
                                                            @else
                                                            <span>
                                                                <strong>
                                                                    <span class="badge badge-danger">HẾT HÀNG</span>
                                                                </strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>  
                                    @endforeach
                                </div>
                                {{$shoescolor->links()}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection