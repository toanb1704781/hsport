<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <title>Đăng nhập</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">
    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="{{asset('frontend/css/main_style.css')}}">

</head>
<body class="login-area">

    <div id="preloader">
        <div class="lds-hourglass"></div>
    </div>

    <div class="main-content- dark-color-overlay  bg-img h-100vh" style="background-image: url('frontend/img/bg-img/11.jpg')">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-7 col-lg-5 mx-auto">
                    <div class="middle-box">
                        <div class="card">
                            <div class="card-body login-padding">
                                <h4 class="font-28 mb-30">Đăng nhập tài khoản</h4>
                                <form action="{{route('frontend.postLogin')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="float-left" for="username">Tên đăng nhập</label>
                                        <input class="form-control" type="text" id="username" name="username" placeholder="Nhập tên tài khoản">
                                    </div>

                                    <div class="form-group">
                                        {{--  <a href="forget-password.html" class="text-muted float-right"><small>Forgot your password?</small></a>  --}}
                                        <label class="float-left" for="password">Mật khẩu</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                            <label class="custom-control-label" for="checkbox-signin">Nhớ mật khẩu</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Đăng nhập </button>
                                        <a href="{{route('frontend.getRegister')}}" class="btn btn-secondary btn-block" type="submit"> Đăng ký </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @include('frontend.layouts.script')

</body>

</html>