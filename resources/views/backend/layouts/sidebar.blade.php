{{--  Main Sidebar  --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <div class="sidebar">

    {{--  Sidebar Panel  --}}
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset($employee->information->avatar ?? 'backend/img/avt.jpeg')}}" class="img-circle elevation-2">
      </div>
      <div class="info">
        <a href="{{route('nhan-vien.edit', ['nhan_vien' => session()->get('empID')])}}" class="d-block">
          {{$employee->information->name ?? $employee->username}}
        </a>
        @if ($employee->roleID == 1)
          <span class="badge badge-danger">
            {{$employee->role->role}}
          </span>
        @else
          @if ($employee->roleID == 2)
            <span class="badge badge-success">
              {{$employee->role->role}}
            </span>
          @else
            <span class="badge badge-primary">
              {{$employee->role->role}}
            </span>
          @endif
        @endif
      </div>
    </div>

    {{--  Sidebar Menu  --}}
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        {{--  Trang chủ  --}}
        <li class="nav-item">
          <a href="{{route('backend.index')}}" class="nav-link active">
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

        {{--  Quản lý danh mục  --}}
        <li class="nav-item">
          <a href="" class="nav-link">
            <p>
              Quản lý danh mục
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('danh-muc.create')}}" class="nav-link">
                <i class="fas fa-plus"></i>
                <p>
                  Thêm danh mục
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('danh-muc.index')}}" class="nav-link">
                <i class="fas fa-list"></i>
                <p>
                  Liệt kê danh mục
                </p>
              </a>
            </li>
          </ul>
        </li>

        {{--  Quản lý sản phẩm  --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Quản lý sản phẩm
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('san-pham.create')}}" class="nav-link">
                <i class="fas fa-plus"></i>
                <p>
                  Thêm sản phẩm
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('san-pham.index')}}" class="nav-link">
                <i class="fas fa-list"></i>
                <p>
                  Danh sách sản phẩm
                </p>
              </a>
            </li>
          </ul>
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
        @if ($employee->roleID < 3)          
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
  </div>
</aside>