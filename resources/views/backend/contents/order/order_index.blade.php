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

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{route('backend.index')}}">
                <i class="fas fa-home"></i> 
                Trang chủ
              </a>
              </li>
              <li class="breadcrumb-item">
                Quản lý đơn hàng
              </li>
          </ol>
          <hr>
        </div>
      </div>
    </div>
    <h2 class="main-title">QUẢN LÝ ĐƠN HÀNG</h2>
  </div>

  <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0 table-striped" style="text-align:">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thông tin</th>
                            <th>Mã đơn</th>
                            <th>Trạng thái</th>
                            <th>Thanh toán</th>
                            <th>Tổng</th>
                            <th>Đặt lúc</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                          <tr>
                            <td>
                              {{$i++}}
                            </td>
                            <td>
                              <ul>
                                <li>
                                  Tên: {{$order->customer->information->name}}
                                <li>
                                  Địa chỉ: {{$order->customer->information->address}}
                                </li>
                                <li>
                                  SĐT: {{$order->customer->information->phone}}
                                </li>
                              </ul>
                            </td>
                            <td>
                              <a href="{{route('don-hang.show', ['orderID' => $order->orderID])}}">
                                {{$order->orderID}}
                              </a>
                            </td>
                            <td>
                              @if ($order->orderstatus->statusID == 1)
                                  <span class="badge badge-info">{{$order->orderstatus->status}}</span>
                              @endif
                              @if ($order->orderstatus->statusID == 2)
                                  <span class="badge badge-danger">{{$order->orderstatus->status}}</span>
                              @endif
                              @if ($order->orderstatus->statusID == 3)
                                  <span class="badge badge-success">{{$order->orderstatus->status}}</span>
                              @endif
                              @if ($order->orderstatus->statusID == 4)
                                  <span class="badge badge-secondary">{{$order->orderstatus->status}}</span>
                              @endif
                            </td>
                            <td>
                              {{$order->payment->payment}}
                            </td>
                            <td>
                              {{number_format($order->total,0, "", ".")}}₫
                            </td>
                            <td>
                              {{$order->created_at}}
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              {{$orders->links()}}
@endsection