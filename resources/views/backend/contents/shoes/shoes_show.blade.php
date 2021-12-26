@extends('backend.layouts.master')
@section('title', 'Chi tiết sản phẩm')

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
      <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
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
            <a href="{{route('giay.index')}}" class="nav-link active">
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

  <div class="card">

    <section class="content-header">
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
              <li class="breadcrumb-item active">
                <a href="{{route('giay.index')}}">
                  Danh sách giày
                </a>
              </li>
              <li class="breadcrumb-item">
                  {{$shoes->shoesName}}
              </li>
            </ol>
            <hr>
          </div>
          <div class="col-sm-12">
            <h2 class="main-title">Tồn kho</h2>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-success btn-sm" href="{{route('shoescolor.create', ['shoesID' => $shoes->shoesID])}}">
                <i class="fas fa-plus"></i>
                Nhập hàng mới
              </a>
            </ol>
          </div>
        </div>
      </div> 
    </section>

    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0 table-striped" style="text-align: center" border=1>
          <thead style="text-align: center; margin: auto;">
            <tr>
              <th rowspan="2">#</th>
              <th rowspan="2">Hình đại diện</th>
              <th colspan="2">Hàng tồn trong kho</th>
              <th rowspan="2">Giá nhập hàng</th>
              <th rowspan="2">Giá bán</th>
              <th rowspan="2">Giá khuyến mãi</th>
              <th rowspan="2">Tùy chỉnh</th>
            </tr>
            <tr>
              <td>Size</td>
              <td>Số lượng</td>
            </tr>
          </thead>
          <tbody>
            @foreach ($shoescolor->sortByDesc('created_at') as $shoescolor)
              <tr>
                <td>
                  {{$i++}}
                </td>
                <td>
                  <a href="{{asset($shoescolor->shoesAvatar)}}"  data-toggle="lightbox" data-title="Hình ảnh" data-gallery="gallery">
                    <img src="{{asset($shoescolor->shoesAvatar)}}" alt="Avatar" style="width: 100px; height:100px">
                  </a>
                  @foreach ($shoescolor->shoesimg as $shoesimg)
                  <a href="{{asset($shoesimg->img)}}" data-toggle="lightbox" data-title="Hình ảnh" data-gallery="gallery">
                  </a>
                  @endforeach
                </td>
                <td>
                  @foreach ($shoescolor->shoesdetail as $shoesdetail)
                  <div class="ton_kho ton_kho_size">
                    <span class="badge">{{$shoesdetail->size}}</span>
                  </div>
                  @endforeach
                </td>
                <td>
                  @foreach ($shoescolor->shoesdetail as $shoesdetail)
                    <div class="ton_kho ton_kho_quantity">
                      @if ($shoesdetail->shoesQuan == 0)
                      <span class="badge badge-secondary">{{$shoesdetail->shoesQuan}}</span>
                      @else
                        @if ($shoesdetail->shoesQuan > 0 && $shoesdetail->shoesQuan <= 2)
                          <span class="badge badge-danger">{{$shoesdetail->shoesQuan}}</span>
                        @else
                          <span class="badge badge-success">{{$shoesdetail->shoesQuan}}</span>
                        @endif
                      @endif
                    </div>
                  @endforeach
                </td>
                <td>
                  {{number_format($shoescolor->getShoesCost($shoescolor->shoescolorID),0, "", ".")}}₫
                </td>
                <td>
                  <strong>
                    {{number_format($shoescolor->shoesPrice,0, "", ".")}}₫
                  </strong>
                </td>
                <td>
                  <strong>
                    @if ($shoescolor->salePrice)
                      {{number_format($shoescolor->salePrice,0, "", ".")}}₫
                    @endif
                  </strong>
                </td>
                <td>
                  <form action="{{route('shoescolor.destroy', ['shoescolorID' => $shoescolor->shoescolorID])}}" method="POST">
                    @csrf
                    @method('delete')
                    <a class="btn btn-primary btn-sm" href="{{route('shoescolor.edit', ['shoescolorID' => $shoescolor->shoescolorID])}}">
                      <i class="far fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#shoescolor{{$shoescolor->shoescolorID}}">
                      <i class="fas fa-trash"></i>
                    </button>
                    <div class="modal fade" id="shoescolor{{$shoescolor->shoescolorID}}">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">
                              Bạn có muốn xóa <small><strong>{{$shoescolor->shoes->shoesName}} - màu {{$shoescolor->color->colorName}}</small> </strong> không?
                            </h4>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-danger">Xóa</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      <a href="{{route('giay.index')}}" class="btn btn-secondary">Quay lại</a>
    </div>
  </div>
@endsection