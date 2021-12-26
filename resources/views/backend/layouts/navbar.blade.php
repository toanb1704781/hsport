{{--  Navbar  --}}
<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">

  {{--  Left Navbar  --}}
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
  </ul>

  {{--  Right Navbar  --}}
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('backend.logout')}}" role="button">
        Đăng xuất
      </a>
    </li>
  </ul>
  
</nav>