@extends('frontend.layouts.master')

@section('title', 'Giỏ hàng')

@section('main')
    <div class="container-fluid page-body-wrapper">
        <div class="main">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" >
                                <li class="breadcrumb-item">
                                    <a href="{{route('frontend.index')}}">
                                        Trang chủ
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Giỏ hàng
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body" style="min-width: 824px">
                                    <div class="shopping__cart__table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart as $rowCart)
                                                        <tr>
                                                            <td class="product__cart__item">
                                                                <div class="product__cart__item__pic">
                                                                    <a href="{{route('shoesdetail', ['shoescolorID' => $rowCart->shoesdetail->shoescolorID])}}">
                                                                        <img src="{{asset($rowCart->shoesdetail->shoescolor->shoesAvatar)}}" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="product__cart__item__text">
                                                                    <h6>
                                                                        <a href="{{route('shoesdetail', ['shoescolorID' => $rowCart->shoesdetail->shoescolorID])}}">
                                                                            {{ $rowCart->shoesdetail->shoescolor->shoes->shoesName}}
                                                                        </a>
                                                                    </h6>
                                                                    <h5>
                                                                        {{number_format(( $rowCart->shoesdetail->shoescolor->salePrice ?? $rowCart->shoesdetail->shoescolor->shoesPrice),0, "", ".")}}₫
                                                                    </h5>
                                                                    <small>
                                                                        Mã SKU: {{ $rowCart->SKU}} <br>
                                                                        Màu: {{ $rowCart->shoesdetail->shoescolor->color->colorName}} <br>
                                                                        Size: {{ $rowCart->shoesdetail->size}}
                                                                    </small>
                                                                </div>
                                                            </td>
                                                            <form action="{{route('cart.update', ['orderID' => $rowCart->orderID, 'SKU' => $rowCart->SKU])}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <td class="quantity__item">
                                                                    <div class="quantity">
                                                                        <input type="number" name="quantity" min="1" max="{{$rowCart->shoesdetail->shoesQuan}}" value="{{$rowCart->quantity}}">
                                                                    </div>
                                                                </td>
                                                                <td class="cart__price">
                                                                    {{number_format(( $rowCart->shoesdetail->shoescolor->salePrice ?? $rowCart->shoesdetail->shoescolor->shoesPrice) * $rowCart->quantity,0, "", ".")}}₫
                                                                    @php
                                                                        $total += ( $rowCart->shoesdetail->shoescolor->salePrice ?? $rowCart->shoesdetail->shoescolor->shoesPrice) * $rowCart->quantity ;
                                                                    @endphp
                                                                </td>
                                                                <td class="cart__close">
                                                                    <button type="submit" class="btn">
                                                                        <i class="fa fa-refresh"></i>
                                                                    </button>
                                                                </td>
                                                            </form>
                                                            <td class="cart__close">
                                                                <form action="{{route('cart.destroy', ['orderID' => $rowCart->orderID, 'SKU' => $rowCart->SKU])}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn">
                                                                        <i class="fa fa-close"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="continue__btn">
                                                <a href="{{route('shoes.index')}}">Tiếp tục mua sắm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body" style="min-width: 397px">
                                    <div class="cart__discount">
                                        <h6>Mã khuyến mãi</h6>
                                        <form action="{{route('cart.discount')}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="disID" placeholder="Nhập mã khuyến mãi">
                                            <input type="hidden" name="total_order" value="{{$total}}">
                                            <button class="btn btn-secondary" type="submit">Áp dụng</button>
                                        </form>
                                    </div>
                                    <div class="cart__total">
                                        <h6>Thanh toán</h6>
                                        <ul>
                                            <li>
                                                Tạm tính
                                                <span>
                                                    {{number_format($total,0, "", ".")}}₫
                                                </span>
                                            </li>
                                            <li>
                                                Giảm giá
                                                <span class="dis-price">
                                                    @if($order->disID != null)
                                                        {{number_format($order->discount->discount,0, "", ".")}}₫
                                                    @else
                                                        {{number_format(0,0, "", ".")}}₫
                                                    @endif
                                                </span>
                                            </li>
                                            <li>
                                                <strong>
                                                    Tổng cộng 
                                                </strong>
                                                <span>
                                                    <h5>
                                                        @if ($order->disID != null)
                                                            @php
                                                                $total = $total- ($order->discount->discount);
                                                            @endphp
                                                        @endif
                                                        {{number_format($total, 0, "", ".")}}₫ 
                                                    </h5>
                                                </span>
                                            </li>
                                        </ul>
                                        @if ($total != 0)
                                            <form action="{{route('thanhtoan.putCheckout', ['total' => $total])}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    Tiến hành thanh toán
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection