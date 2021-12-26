@extends('backend.layouts.master')
@section('title', 'Cập nhật nhân viên')

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
          <a href="{{route('nhan-vien.index')}}" class="nav-link active">
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

<section class="content-header">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('backend.index')}}">
          <i class="fas fa-home"></i> 
          Trang chủ
        </a>
        </li>
      <li class="breadcrumb-item">Cập nhật thông tin nhân viên</li>
    </ol>
    <hr>
  </div>
</section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cập nhật thông tin nhân viên</h3>
            </div>
            <form action="{{route('nhan-vien.update', ['nhan_vien' => $employee->empID])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <img src="{{asset($employee->information->avatar)}}" alt="" style="height:100px; weight:100px"> <br>
                  <div class="form-group">
                      <label for="ten">Tên nhân viên</label>
                      <input type="text" class="form-control" id="ten" name="name" value="{{$employee->information->name}}" placeholder="Nhập tên nhân viên">
                  </div>
                  <div class="form-group">
                      <label for="hinhanh">Hình đại diện</label> <br>
                      <input  type="file" id="hinhanh" name="avatar" value="asd">
                  </div>
                  <div class="form-group">
                      <label for="dchi">Địa chỉ</label>
                      <input type="text" class="form-control" id="dchi" name="address" value="{{$employee->information->address}}" placeholder="Nhập địa chỉ">
                  </div>
                  <div class="form-group">
                      <label for="sdt">Số điện thoại</label>
                      <input type="text" class="form-control" id="sdt" name="phone" value="{{$employee->information->phone}}" placeholder="Nhập số điện thoại">
                  </div>
                  <div class="form-group">
                      <label for="chucvu">Chức vụ</label>
                      @if($employee->roleID == 1)
                          <input type="text" class="form-control" id="auth" name="auth" value="Giám đốc" disabled>
                      @else
                          <select name="role" id="" class="form-control">
                          @if($employee->roleID == 2)
                              <option value="2" selected>Quản lý</option>
                              <option value="3">Nhân viên</option>
                          @else
                              @if ($employee->roleID == 3)
                                  <option value="2">Quản lý</option>
                                  <option value="3" selected>Nhân viên</option>                            
                              @endif
                          @endif
                          </select>
                      @endif
                  </div>
                  <div class="form-group">
                      <label for="ngaylam">Ngày vào làm</label>
                      <input type="text" class="form-control" id="ngaylam" name="createdat" value='{{$employee->information->created_at}}' disabled>
                  </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{route('nhan-vien.index')}}">
                        Quay lại
                    </a>
                    <button type="submit" class="btn btn-primary" style="float:right">Cập nhật</button>
                </div>
            </form>
        </div>
    </section>
@endsection