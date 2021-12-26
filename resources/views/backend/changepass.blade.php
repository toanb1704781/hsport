<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đổi mật khẩu</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('backend/css/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="" class="h1">
          Đổi mật khẩu
        </a>
      </div>
      <div class="card-body">
        <form action="{{route('backend.putchangepass')}}" method="POST">
          @csrf
          @method('PUT')
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Tài khoản" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Mật khẩu cũ" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Mật khẩu mới" name="newpass">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="re-newpass">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-5"> 
              <a href="{{route('backend.getLogin')}}" class="btn btn-secondary btn-block">
                Đăng nhập
              </a>
            </div>
            <div class="col-7">
              <button type="submit" class="btn btn-primary btn-block">Đổi mật khẩu</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{--  SCRIPT  --}}
  <!-- jQuery -->
  <script src="{{asset('backend/js/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('backend/js/adminlte.js')}}"></script>
</body>
</html>
