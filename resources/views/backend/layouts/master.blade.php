<!DOCTYPE html>
<html lang="en">
<head>

  {{--  Head  --}}
  @include('backend.layouts.head')

</head>
<body class="hold-transition sidebar-mini layout-fixed">

  {{--  Wrapper  --}}
  <div class="wrapper">

    {{--  Navbar  --}}
    @include('backend.layouts.navbar')

    {{--  Main Sidebar  --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="sidebar">
        {{--  Sidebar Panel  --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset($empSS->information->avatar ?? 'backend/img/avt.jpeg')}}" class="img-circle elevation-2">
          </div>
          <div class="info">
            <a href="{{route('nhan-vien.edit', ['nhan_vien' => session()->get('empID')])}}" class="d-block">
              {{$empSS->information->name ?? $empSS->username}}
            </a>
            @if ($empSS->roleID == 1)
              <span class="badge badge-danger">
                {{$empSS->role->role}}
              </span>
            @else
              @if ($empSS->roleID == 2)
                <span class="badge badge-success">
                  {{$empSS->role->role}}
                </span>
              @else
                <span class="badge badge-primary">
                  {{$empSS->role->role}}
                </span>
              @endif
            @endif
          </div>
        </div>
    
        {{--  Sidebar Menu  --}}
        @yield('sidebar')
      </div>
    </aside>

    {{--  Main content  --}}
    <div class="content-wrapper">
      @yield('content')
    </div>

  </div>

  {{--  Scripts  --}}
  @include('backend.layouts.script')
  @yield('script')

</body>
</html>
