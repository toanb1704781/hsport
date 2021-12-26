@extends('backend.layouts.master')

@section('title', 'Quản lý nhân viên')

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

    <div class="card">
        
        <section class="content-header">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route('backend.index')}}">
                  <i class="fas fa-home"></i> 
                  Trang chủ
                </a>
                </li>
              <li class="breadcrumb-item">Danh sách nhân viên</li>
            </ol>
            <hr>
          </div>
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách nhân viên</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a class="btn btn-success btn-sm" href="{{route('nhan-vien.create')}}">
                                <i class="fas fa-plus"></i>
                                Thêm nhân viên
                            </a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0 table-striped"  style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tài khoản</th>
                            <th>Họ tên</th>
                            <th>Hình ảnh</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Chức vụ</th>
                            <th>Ngày tạo</th>
                            <th>Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee as $emp)
                          <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                                {{$emp->username}}
                            </td>
                            <td>
                                {{$emp->information->name}}
                            </td>
                            <td>
                                <img src="{{asset($emp->information->avatar)}}" alt="" style="height:60px; weight:60px">
                            </td>
                            <td>
                                {{$emp->information->address}}
                            </td>
                            <td>
                                {{$emp->information->phone}}
                            </td>
                            <td>
                                @if($emp->roleID == 1)
                                    <span class="badge badge-danger">
                                      {{$emp->role->role}}
                                    </span>
                                @else
                                    @if($emp->roleID == 2)
                                        <span class="badge badge-success">
                                          {{$emp->role->role}}
                                        </span>
                                    @else
                                        <span class="badge badge-primary">
                                          {{$emp->role->role}}
                                        </span>
                                    @endif
                                @endif
                            </td>
                            <td>
                                {{$emp->created_at}}
                            </td>
                            <td>
                              <form action="{{route('nhan-vien.destroy', ['nhan_vien' => $emp->empID])}}" method="POST">
                                @csrf
                                @method('delete')
                                @if($emp->username != 'admin' || session()->get('empID') == 1)
                                  <a class="btn btn-primary btn-sm" href="{{route('nhan-vien.edit', ['nhan_vien' => $emp->empID])}}">
                                    <i class="far fa-edit"></i>
                                  </a>
                                @endif
                                @if(session()->get('empID') != $emp->empID && $emp->username != 'admin')
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#employee{{$emp->empID}}">
                                  <i class="fas fa-trash"></i>
                                </button>
                                <div class="modal fade" id="employee{{$emp->empID}}">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">
                                          Bạn có muốn xóa <strong>{{$emp->information->name}}</strong> không?
                                        </h4>
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @endif
                              </form>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection