@extends('frontend.layouts.master')

@section('title', 'Chi tiết')

@section('main')
    <div class="container-fluid page-body-wrapper">
        <div class="main">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
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
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="shop__sidebar">
                                @include('frontend.contents.shoes.shop_sidebar.shop_sidebar')
                            </div>
                        </div> 
                        <div class="col-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product__details__text">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="{{asset($shoescolor->shoesAvatar)}}" class="text-center d-block mb-4" data-toggle="lightbox" data-gallery="example-gallery">
                                                    <img src="{{asset($shoescolor->shoesAvatar)}}" class="img-fluid" alt="Product" />
                                                </a>
                                                @foreach ($shoesimg as $shoesimg)
                                                    <a href="{{asset($shoesimg->img)}}" data-toggle="lightbox" data-gallery="example-gallery"></a>
                                                @endforeach
                                            </div>
                                            <div class="col-8">

                                                <h4>
                                                    {{$shoescolor->shoes->shoesName}} - {{$shoescolor->color->colorName}}
                                                </h4>
                                                <h3>
                                                    @if ($shoescolor->checkSize($shoescolor->shoescolorID))
                                                        <span>
                                                            @if ($shoescolor->salePrice)
                                                                {{number_format($shoescolor->shoesPrice,0, "", ".")}}₫
                                                            @endif
                                                        </span>
                                                        {{number_format($shoescolor->salePrice ?? $shoescolor->shoesPrice,0, "", ".")}}₫
                                                    @else
                                                        <h1>
                                                            <span class="badge badge-danger">HẾT HÀNG</span>
                                                        </h1>
                                                    @endif
                                                </h3>
                                                <div class="product-title">
                                                    <p class="prd-description"></p>
                                                    <p><span style="color: #ff0000; font-size: 15pt;"><strong>Khuyến mãi</strong></span></p>
                                                    <p><span style="color: #1100ff; font-size: 12pt;"><strong><span style="color: #000000; font-size: 12pt;"><span style="color: #38a803;">√</span></span>FREE SHIP TOÀN QUỐC</strong></span></p>
                                                    <p><span style="color: #000000; font-size: 12pt;"><strong><span style="color: #38a803;">√</span><span style="color: #1100ff;">Túi Hộp HSPORT</span></strong></span></p>
                                                    <p><span style="color: #000000; font-size: 12pt;"><strong><span style="color: #38a803;">√</span> <span style="color: #1100ff;">1 Đôi tất dệt kim HSPORT</span></strong></span></p>
                                                    <p><span style="color: #ff0000; font-size: 15pt;"><strong>CAM KẾT SẢN PHẨM CHÍNH HÃNG 100%. ĐƯỢC BỒI HOÀN GẤP 10 LẦN NẾU KHÔNG PHẢI CHÍNH HÃNG</strong></span></p>
                                                    <p></p>
                                                </div>
                                                <div class="product__details__option">
                                                    <div class="product__details__option__color">
                                                        <strong>
                                                            MÀU SẮC: <br>
                                                        </strong>
                                                        @foreach ($shoes->shoescolor as $row)
                                                            <span class="img-check">
                                                                <a href="{{route('shoesdetail', ['shoescolorID' => $row->shoescolorID])}}">
                                                                    <label style="background: {{$row->color->colorCode}}"></label>
                                                                </a>
                                                                <div>{{$row->color->colorName}}</div>
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                    <br><br>
                                                    <div class="product__details__option__size">
                                                        <strong>CHỌN SIZE:</strong>
                                                        <small> (Đã ẩn những size hết hàng)</small> <br>
                                                        <form action="{{route('cart.store', ['shoescolorID' => $shoescolor->shoescolorID])}}" method="post">
                                                            @csrf
                                                            @foreach ($shoesdetail as $shoesdetail)
                                                                <label for="{{$shoesdetail->size}}">{{$shoesdetail->size}}
                                                                    <input id="{{$shoesdetail->size}}" type="radio" name="size" value="{{$shoesdetail->size}}">
                                                                </label>
                                                            @endforeach
                                                            <div class="add-cart-btn">
                                                                @if ($shoescolor->checkSize($shoescolor->shoescolorID))
                                                                    <button class="btn btn-primary" id="" type="submit">Thêm vào giỏ hàng</button>
                                                                @endif
                                                            </div>
                                                        </form>
                                                    </div>
                                            </div>

                                        </div>
                                        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="product__details__tab">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Mô tả sản phẩm</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                                        <div class="product__details__tab__content">
                                                            <div class="product__details__tab__content__item">
                                                                {!!$shoescolor->shoesDesc!!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">GIÀY LIÊN QUAN</h3>
                        <div class="owl-carousel owl-theme rtl-carousel">
                            @foreach ($shoes_type as $row)
                                @foreach ($row->shoescolor as $row_shoescolor)
                                    <a href="{{route('shoesdetail', ['shoescolorID' => $row_shoescolor->shoescolorID])}}">
                                        <div class="item">
                                            @if ($row_shoescolor->checkNew($row_shoescolor->created_at))
                                                <span class="product_new">NEW</span>
                                            @endif
                                            @if($row_shoescolor->salePrice)
                                                <span class="product_sale">SALE</span>
                                            @endif
                                            <img class="rtlImg" src="{{asset($row_shoescolor->shoesAvatar)}}" alt="image" />
                                            <p class="shoes-name">
                                                {{$row_shoescolor->shoes->shoesName}} / {{$row_shoescolor->color->colorName}}
                                                <div class="shoesfooter">
                                                    <strong>
                                                        {{number_format($row_shoescolor->salePrice ?? $row_shoescolor->shoesPrice,0, "", ".")}}₫
                                                    </strong>
                                                    <del>
                                                        @if ($row_shoescolor->salePrice)
                                                            {{number_format($row_shoescolor->shoesPrice,0, "", ".")}}₫
                                                        @endif
                                                    </del>
                                                </div>
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection