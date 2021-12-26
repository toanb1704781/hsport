@section('titel', 'Thanh Toán')
@extends('frontend.layouts.master')

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
                                <li class="breadcrumb-item">
                                    <a href="{{route('cart.index')}}">
                                        Giỏ hàng
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Thanh toán
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-md-6 info_checkout">
                            <div class="card">
                                <div class="card-body" style="min-width: 700px">
                                    <div class="checkout__title">
                                        <h4>Thông tin khách hàng</h4>
                                        <small>
                                            (*) Điền đầy đủ các thông tin
                                        </small>
                                    </div>
                                    <form action="{{route('checkout')}}" method="Post" id="form_infoCheckOut">  
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="checkout__input">
                                                    <p>Họ tên<span>*</span></p>
                                                    <input type="text" name="name" value="{{$customer->information->name ?? null}}" placeholder="Nhập đầy đủ họ tên" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="checkout__input">
                                                    <p>Địa chỉ<span>*</span></p>
                                                    <input type="text" name="address" value="{{$customer->information->address ?? null}}" placeholder="Địa chỉ nhận hàng" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="checkout__input">
                                                    <p>Số điện thoại<span>*</span></p>
                                                    <input type="text" name="phone" value="{{$customer->information->phone ?? null}}" placeholder="Nhập số điện thoại liên lạc" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="checkout__input">
                                                    <p>Email</p>
                                                    <input type="text"  name="email" value="{{$customer->information->email ?? null}}" placeholder="VD: petshop@gmail.com" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="checkout__input">
                                                    <p>Ghi chú</p>
                                                    <input type="text" name="note" value="" placeholder="Ghi chú đơn hàng của bạn">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="paymentID" id="paymentID" value="1">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="checkout__order">
                                        <h4 class="order__title">Đơn hàng của bạn</h4>
                                        <div class="checkout__order__products">Sản phẩm <span>Tổng cộng</span></div>
                                        <ul class="checkout__total__products">
                                            @foreach ($orderdetail as $orderdetail)
                                                <li>
                                                    {{$i++}}. {{ $orderdetail->shoesdetail->shoescolor->shoes->shoesName}}   x 
                                                    <small>
                                                        {{ $orderdetail->quantity}}
                                                    </small>
                                                    <span>
                                                        {{number_format(( $orderdetail->shoesdetail->shoescolor->salePrice ?? $orderdetail->shoesdetail->shoescolor->shoesPrice) * $orderdetail->quantity,0, "", ".")}}₫
                                                    </span>
                                                    @php
                                                        $total += ( $orderdetail->shoesdetail->shoescolor->salePrice ?? $orderdetail->shoesdetail->shoescolor->shoesPrice) * $orderdetail->quantity ;
                                                    @endphp
                                                </li>
                                            @endforeach
                                        </ul>
                                        <ul class="checkout__total__all">
                                            <li>
                                                Tạm tính 
                                                <span>
                                                    <h6>
                                                        {{number_format($total,0, "", ".")}}₫
                                                    </h6>
                                                </span>
                                            </li>
                                            <li>
                                                Giảm giá
                                                <span>
                                                    @if($order->disID != null)
                                                        {{number_format($order->discount->discount,0, "", ".")}}₫
                                                    @else
                                                        {{number_format(0,0, "", ".")}}₫
                                                    @endif
                                                </span>
                                            </li>
                                            <li>
                                                Tổng cộng
                                                <span>
                                                    <h4>
                                                        @php
                                                            $tongcong = ($order->total / 23099.92);
                                                            $viet_to_usd = round($tongcong, 2);
                                                        @endphp
                                                        {{number_format($order->total,0, "", ".")}}₫
                                                        <input type="hidden" name="total_order" id="total_order" value="{{$viet_to_usd}}">
                                                    </h4>
                                                </span>
                                            </li>
                                        </ul>
                                        <p></p>
                                        <button type="submit" form="form_infoCheckOut" class="btn btn-primary btn-block">ĐẶT HÀNG</button> <br>
                                            <div class="">
                                                <div id="paypal-button" style="text-align: center"></div>
                                                <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                                                <script>
                                                    var usd = document.getElementById('total_order').value;
                                                    paypal.Button.render({
                                                        // Configure environment
                                                        env: 'sandbox',
                                                        client: {
                                                          sandbox: 'AYE77f2QfvLizHTvwUsCXNiRKwyYfAjemMG8_JdQffL9FByreNAZxP6_IyKl1AC8U_M549DicL6GjkUS',
                                                          production: 'demo_production_client_id'
                                                        },
                                                        // Customize button (optional)
                                                        locale: 'en_US',
                                                        style: {
                                                          size: 'large',
                                                          color: 'gold',
                                                          shape: 'pill',
                                                        },
                                                    
                                                        // Enable Pay Now checkout flow (optional)
                                                        commit: true,
                                                    
                                                        // Set up a payment
                                                        payment: function(data, actions) {
                                                            return actions.payment.create({
                                                              transactions: [{
                                                                amount: {
                                                                  total: `${usd}`,
                                                                  currency: 'USD'
                                                                }
                                                              }]
                                                            });
                                                          },
                                                        // Execute the payment
                                                        onAuthorize: function(data, actions) {
                                                          return actions.payment.execute().then(function() {
                                                            // Show a confirmation message to the buyer
                                                            submit_form();
                                                          });
                                                        }
                                                      }, '#paypal-button');

                                                      function submit_form(){
                                                          var paymentID = document.getElementById('paymentID').value = 2;
                                                          var form = document.getElementById('form_infoCheckOut');
                                                          form.submit();
                                                      }
                                                </script>
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
@endsection


