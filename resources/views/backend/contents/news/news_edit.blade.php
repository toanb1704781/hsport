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
        <a href="{{route('tin-tuc.index')}}" class="nav-link active">
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

    <section class="content-header">
      <div class="col-sm-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{route('backend.index')}}">
              <i class="fas fa-home"></i> 
              Trang chủ
            </a>
            </li>
          <li class="breadcrumb-item">Cập nhật tin tức</li>
        </ol>
        <hr>
      </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cập nhật tin tức</h3>
            </div>
            <form action="{{route('tin-tuc.update', ['tin_tuc' => $news->newsID])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div>
                        <img src="{{asset($news->newsIMG)}}" alt="" style="width: 200px; height:200px">
                    </div>
                    <div class="form-group">
                        <label for="newsIMG">Hình ảnh</label> <br>
                        <input type="file" id="newsIMG" name="newsIMG">
                    </div>
                    <div class="form-group">
                        <label for="newsTitle">Tiêu đề</label>
                        <input type="text" class="form-control" id="newsTitle" name="newsTitle" value="{{$news->newsTitle}}" placeholder="Nhập tiêu đề">
                    </div>
                    <div class="form-group">
                        <label for="news">Nội dung</label>
                        <textarea id="ckeditorNewsEdit" class="form-control" id="news" name="news" rows="5" placeholder="Nội dung chính">{{$news->news}}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{route('tin-tuc.index')}}" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-primary" style="float:right">Cập nhật</button>
                </div>
            </form>
        </div>
    </section>
@endsection