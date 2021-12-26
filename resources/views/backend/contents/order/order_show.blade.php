@extends('backend.layouts.master')
@section('title', 'Quản lý đơn hàng')

@section('sidebar')
  {{--  Sidebar Menu  --}}
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
      {{--  Trang chủ  --}}
      <li class="nav-item">
        <a href="{{route('backend.index')}}" class="nav-link">
          <p>
            Trang chủ
          </p>
        </a>
      </li>

      {{--  Quản lý đơn hàng  --}}
      <li class="nav-item">
        <a href="{{route('don-hang.index')}}" class="nav-link active">
          <p>
            Quản lý đơn hàng
            @if($countNewOrder != 0)
              <span class="badge badge-danger navbar-badge">{{$countNewOrder}} đơn mới</span>
            @endif
          </p>
        </a>
      </li>

      {{--  Quản lý khách hàng  --}}
      <li class="nav-item">
        <a href="{{route('khach-hang.index')}}" class="nav-link">
          <p>
            Quản lý khách hàng
          </p>
        </a>
      </li>

      {{--  Quản lý sản phẩm  --}}
      <li class="nav-item">
        <a href="#" class="nav-link">
          <p>
            Quản lý giày
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('thuoc-tinh.index')}}" class="nav-link">
              <i class="fas fa-ellipsis-h"></i>
              <p>
                Thuộc tính giày
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('loai-giay.index')}}" class="nav-link">
              <i class="fas fa-ellipsis-h"></i>
              <p>
                Loại giày
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('thuong-hieu.index')}}" class="nav-link">
              <i class="fas fa-ellipsis-h"></i>
              <p>
                Các thương hiệu
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('giay.index')}}" class="nav-link">
              <i class="fas fa-ellipsis-h"></i>
              <p>
                Danh sách giày
              </p>
            </a>
          </li>
        </ul>
      </li>

      {{--  Quản lý nhà cung cấp  --}}
      <li class="nav-item">
        <a href="{{route('nha-cung-cap.index')}}" class="nav-link">
          <p>
            Quản lý nhà cung cấp
          </p>
        </a>
      </li>

      {{--  Quản lý khuyến mãi  --}}
      <li class="nav-item">
        <a href="{{route('khuyen-mai.index')}}" class="nav-link">
          <p>
            Quản lý khuyến mãi
          </p>
        </a>
      </li>

      {{--  Quản lý slider  --}}
      <li class="nav-item">
        <a href="{{route('slider.index')}}" class="nav-link">
          <p>
            Quản lý slider
          </p>
        </a>
      </li>

      {{--  Quản lý tin tức  --}}
      <li class="nav-item">
        <a href="{{route('tin-tuc.index')}}" class="nav-link">
          <p>
            Quản lý tin tức
          </p>
        </a>
      </li>

      {{--  Quản lý nhân viên  --}}
      @if ($empSS->roleID < 3)          
        <li class="nav-item">
          <a href="{{route('nhan-vien.index')}}" class="nav-link">
            <p>
              Quản lý nhân viên
            </p>
          </a>
        </li>

       
      @endif
    </ul>
  </nav>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route('backend.index')}}">
                  <i class="fas fa-home"></i> 
                  Trang chủ
                </a>
                </li>
                <li class="breadcrumb-item active">
                  <a href="{{route('don-hang.index')}}">
                    Quản lý đơn hàng
                  </a>
                </li>
                <li class="breadcrumb-item">
                  Chi tiết đơn hàng
                </li>
            </ol>
          </div>
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-9">
                          <img src="{{asset('backend/img/logo.png')}}" alt="" style="width: 180px; height: 70px">
                        </div>
                        <div  class="col-3">
                          @if ($order->statusID == 3)
                            <div class="shipped">ĐÃ GIAO HÀNG</div>
                          @endif
                          @if ($order->statusID == 4)
                            <div class="cancel">ĐÃ HỦY</div>
                          @endif
                        </div>
                    </div>

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address>
                                Khách hàng:
                                <strong>
                                    {{$order->customer->information->name}} <br>
                                </strong>
                                Địa chỉ giao hàng: 
                                <strong>
                                    {{$order->customer->information->address}} <br>
                                </strong>
                                Số điện thoại:
                                <strong>
                                    {{$order->customer->information->phone}} <br>
                                </strong> 
                                Email: 
                                <strong>
                                    {{$order->customer->information->email}}
                                </strong>
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            Mã đơn hàng: 
                            <strong>
                                {{$order->orderID}}<br>
                            </strong>
                            Hình thức thanh toán: 
                            <strong>
                                {{$order->payment->payment}}<br>
                            </strong>
                            Thanh toán lúc:
                            <strong>
                                {{$order->created_at}} <br>
                            </strong>
                            Áp dụng khuyến mãi:
                            <strong>
                              {{$order->disID ?? 'Không'}}
                            </strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th> Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderdetail as $orderdetail)
                                        <tr>
                                            <td>
                                                <img src="{{asset($orderdetail->shoesdetail->shoescolor->shoesAvatar)}}" alt="" style="width: 100px; height:100px">
                                            </td>
                                            <td>
                                              <a href="{{route('giay.show', ['giay' => $orderdetail->shoesdetail->shoescolor->shoesID])}}">
                                                {{$orderdetail->shoesdetail->shoescolor->shoes->shoesName}}
                                              </a>
                                            </td>
                                            <td>
                                                {{$orderdetail->quantity}}
                                            </td>
                                            <td>
                                                {{number_format($orderdetail->shoesdetail->shoescolor->salePrice ?? $orderdetail->shoesdetail->shoescolor->shoesPrice,0, "", ".")}}₫
                                            </td>
                                            <td>
                                                {{number_format(($orderdetail->shoesdetail->shoescolor->salePrice ?? $orderdetail->shoesdetail->shoescolor->shoesPrice) * $orderdetail->quantity,0, "", ".")}}₫
                                            </td>
                                        </tr>
                                        @php
                                            $totalQuan +=  $orderdetail->quantity;
                                            $totalPrice += ($orderdetail->shoesdetail->shoescolor->salePrice ?? $orderdetail->shoesdetail->shoescolor->shoesPrice) * $orderdetail->quantity;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <strong>Ghi chú:</strong>
                              <i>
                                  {{$order->note}}
                              </i>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <h3>THANH TOÁN</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Tổng số lượng:</td>
                                        <td>
                                            {{$totalQuan}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tạm tính</td>
                                        <td>
                                            {{number_format($totalPrice,0, "", ".")}}₫
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Giảm giá:</td>
                                        <td>
                                            @if ($order->disID != null)
                                                {{number_format($order->discount->discount,0, "", ".")}}₫
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <h5>
                                                <b>Tổng cộng</b>
                                            </h5>
                                        </th>
                                        <td>
                                            <h3>
                                                {{number_format($order->total,0, "", ".")}}₫
                                            </h3>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                      <form action="{{route('don-hang.update', ['orderID' => $order->orderID])}}" method="post" class="form-group">
                        @csrf
                        @method('PUT')
                        <a href="{{route('don-hang.index')}}" class="btn btn-secondary">
                          Quay lại
                        </a>
                        @if ($order->statusID == 1)
                          <input type="hidden" name="statusID" value="2">
                          <button style="width:250px" type="submit" class="btn btn-danger float-right"> Giao hàng
                        @endif
                        @if ($order->statusID == 2)
                          <input type="hidden" name="statusID" value="3">
                          <button style="width:250px" type="submit" class="btn btn-success float-right"> Đã giao xong
                        @endif
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection