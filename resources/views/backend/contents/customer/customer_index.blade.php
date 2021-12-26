@extends('backend.layouts.master')
@section('title', 'Quản lý khách hàng')

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
        <a href="{{route('don-hang.index')}}" class="nav-link">
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
        <a href="{{route('khach-hang.index')}}" class="nav-link active">
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
                Quản lý khách hàng
              </li>
          </ol>
          <hr>
        </div>
      </div>
      <h2 class="main-title">QUẢN LÝ KHÁCH HÀNG</h2>
    </div>
    <div class="row">
      <div class="col-9"></div>
      <div class="col-3">
        <form action="{{route('khach-hang.index')}}" method="GET">
          <input class="form-control" type="month" name="thang" value="{{$month}}">
          <button class="btn btn-primary form-control" type="submit">Lọc</button>
        </form>
      </div>
    </div>
  </div>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0 table-striped" style="text-align:center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Đơn/tháng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $cus)
                          <tr>
                              <td>
                                  {{$i++}}
                              </td>
                              <td>
                                  {{$cus->information->name}}
                              </td>
                              <td>
                                  {{$cus->information->address}}
                              </td>
                              <td>
                                  {{$cus->information->phone}}
                              </td>
                              <td>
                                {{$cus->information->email}}
                              </td>
                              <td>
                                @if ($cus->countOrderMonth($cus->cusID, $month) >= 5)
                                  <span class="badge badge-pill badge-success">
                                      {{$cus->countOrderMonth($cus->cusID, $month)}}
                                  </span>
                                @else
                                  <span class="badge badge-pill badge-secondary">
                                    {{$cus->countOrderMonth($cus->cusID, $month)}}
                                  </span>
                                @endif
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection