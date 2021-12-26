@extends('frontend.layouts.master')

@section('title', 'Chi tiết đơn hàng')

@section('main')
    <div class="row order__detail">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('frontend.index')}}">
                            Trang chủ
                        </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{route('frontend.order')}}">
                            Đơn hàng của tôi
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Đơn hàng {{$orderID}}
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
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
                                @foreach ($orderdetail as $rowCart)
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
                                            <td class="quantity__item">
                                                <span class="badge badge-success">
                                                    {{$rowCart->quantity}}
                                                </span>
                                            </td>
                                            <td class="cart__price">
                                                {{number_format(( $rowCart->shoesdetail->shoescolor->salePrice ?? $rowCart->shoesdetail->shoescolor->shoesPrice) * $rowCart->quantity,0, "", ".")}}₫
                                                @php
                                                    $total += ( $rowCart->shoesdetail->shoescolor->salePrice ?? $rowCart->shoesdetail->shoescolor->shoesPrice) * $rowCart->quantity ;
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
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
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <a href="{{route('frontend.order')}}" class="btn btn-secondary">Quay lại</a>
@endsection