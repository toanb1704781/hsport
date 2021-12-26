@extends('backend.layouts.master')
@section('title', 'Cập nhật tin tức')

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
        <a href="{{route('nha-cung-cap.index')}}" class="nav-link active">
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

    <section class="content">
      <div class="card card-primary">
        
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
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
                        <li class="breadcrumb-item active">Cập nhật thông tin nhà cung cấp</li>
                      </ol>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


            <div class="card-header">
                <h3 class="card-title">Cập nhật nhà cung cấp</h3>
            </div>
            <form action="{{route('nha-cung-cap.update', ['nha_cung_cap' => $supplier->supID])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="supID">Mã nhà cung cấp</label>
                    <input type="text" class="form-control" id="supID" name="supID" value="{{$supplier->supID}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="supName">Tên nhà cung cấp</label>
                    <input type="text" class="form-control" id="supName" name="supName" value="{{$supplier->supName}}">
                  </div>
                  <div class="form-group">
                    <label for="supAddress">Địa chỉ</label>
                    <input type="text" class="form-control" id="supAddress" name="supAddress" value="{{$supplier->supAddress}}">
                  </div>
                  <div class="form-group">
                    <label for="supPhone">Số điện thoại</label>
                    <input type="text" class="form-control" id="supPhone" name="supPhone" value="{{$supplier->supPhone}}">
                  </div>
                  <div class="form-group">
                    <label for="supEmail">Email</label>
                    <input type="text" class="form-control" id="supEmail" name="supEmail" value="{{$supplier->supEmail}}">
                  </div>
                </div>

                <div class="card-footer">
                    <a href="{{route('nha-cung-cap.index')}}" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-primary" style="float:right">Cập nhật</button>
                </div>
            </form>
        </div>
    </section>
@endsection