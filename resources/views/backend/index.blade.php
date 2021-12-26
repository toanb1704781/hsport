@extends('backend.layouts.master')

@section('title', 'Trang chủ quản trị')

@section('sidebar')
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
<div class="modal fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title">Success Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <div class="content-header">
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
          </ol>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1">
              <i class="far fa-user"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Nhân viên</span>
              <span class="info-box-number">
                {{$countEmp}}
                <small>nhân viên</small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1">
              <img src="https://cdn4.iconfinder.com/data/icons/shoes-vol-1-add-on/48/v-08-512.png" alt="">
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Tổng kho</span>
              <span class="info-box-number">
                {{$countShoes}}
                <small>đôi</small>
              </span>
            </div>
          </div>
        </div>

        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1">
              <i class="fas fa-shopping-cart"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Đơn hàng thành công</span>
              <span class="info-box-number">
                {{$countOrder}}
                <small>đơn</small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1">
              <i class="fas fa-users"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Khách hàng</span>
              <span class="info-box-number">
                {{$countCus}}
                <small>khàng hàng</small>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </section>

  <div class="" style="width:100%; height:200px">
    <div class="row">

      <div class="col-md-4">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">ĐƠN HÀNG HÔM NAY {{$orderOfDayNow_string}}</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="orderOfDayNow" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card card-info">
          <div class="card-header">
            <h5 class="card-title">DOANH THU THEO TUẦN</h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
                <h3 class="text-center">
                  <strong>Doanh thu tuần {{$day_string}}</strong>
                </h3>
                <div class="chart">
                   <canvas id="myChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-sm-6 col-6">
                <div class="description-block border-right">
                  <span class="description-text">Tuần trước</span>
                  <h6 class="description-header">
                    {{number_format($total_week_old,0, "", ".")}}₫
                  </h6>
                </div>
              </div>
              <div class="col-sm-6 col-6">
                <div class="description-block border-right">
                  <span class="description-text">Tuần hiện tại</span> <br>
                  <h3>
                    <strong>
                      {{number_format($total_week,0, "", ".")}}₫
                    </strong>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{--  Báo cáo tháng --}}
    <div class="col-md-12">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">BÁO CÁO THEO THÁNG</h3>
          </div>
          <div class="row">

            <div class="col-4">
              <div class="col-md-12" style="margin-bottom: 20px">
                <form action="{{route('backend.index')}}" method="get">
                  <input class="form-control" type="month" name="thang" value="{{$month}}">
                  <button class="btn btn-primary form-control" type="submit" id="submit_month">Thống kê</button>
                </form>
              </div>
              <div class="card card-danger" style="background: #f7edef;">
                <h3 class="text-center">
                  <strong>Đơn hàng tháng {{$month_string}}</strong>
                </h3>
                <div class="card-body">
                  <canvas id="orderOfMonth" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
            <div class="col-8">
              <div class="card card-danger" style="background: #f7edef;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <h3 class="text-center">
                        <strong>Doanh thu tháng {{$month_string}}</strong>
                      </h3>
                      <div class="chart">
                         <canvas id="month_sales_chart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
      
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-12 col-6">
                      <div class="description-block border-right">
                        <span class="description-text">TỔNG DOANH THU THÁNG {{$month_string}}</span> <br>
                        <h3>
                          <strong>
                            {{number_format($total_month,0, "", ".")}}₫
                          </strong>
                        </h3>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          
        </div>
    </div>
  </div>
  </div>

@endsection

@section('script')

  {{-- Biểu đồ báo cáo đơn hàng hôm nay --}}
  <script>
    var orderDayDatas = @php
        echo json_encode($orderDayDatas);
    @endphp ;
    var orderOfDayNow = document.getElementById('orderOfDayNow');
    var chart_orderOfDayNow = new Chart(orderOfDayNow, {
        type: 'doughnut',
        data: {
            labels:['Đơn mới', 'Đang giao', 'Đã giao xong', 'Đã hủy'],
            datasets: [{
                label: 'Đơn hàng',
                data: orderDayDatas,
                backgroundColor: [
                    'rgb(23 162 184)',
                    'rgb(220 53 69)',
                    'rgb(40 167 69)',
                    'rgb(108 117 125)',
                ]
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    align: 'end',
                    labels: {
                        color: 'blue',
                    }
                },
            },
        }
    });
  </script>

  <script>
    var data_new = @php
        echo json_encode($datas);
    @endphp ;
    var data_old = @php
        echo json_encode($datas_old);
    @endphp ;
    var day_string = @php
        echo json_encode($day_string);
    @endphp ;
    var day_string_old = @php
        echo json_encode($day_string_old);
    @endphp ;
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7',  'Chủ nhật'],
            datasets: [{
                label:day_string_old + '(Đơn vị: VNĐ)',
                data: data_old,
                backgroundColor: [
                    'rgb(172 172 181)',
                ]
            },
            {
                label:day_string + '(Đơn vị: VNĐ)',
                data: data_new,
                backgroundColor: [
                    'rgb(0 123 255)',
                ],
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    align: 'end',
                    labels: {
                        color: 'blue',
                    }
                },
            },
            scales: {
                y: {
                    beginAtZero: true
                },
            }
        }
    });
  </script>

  {{-- Biểu đồ báo cáo đơn hàng theo tháng --}}
  <script>
    var orderMonthDatas = @php
        echo json_encode($orderMonthDatas);
    @endphp ;
    var orderOfMonth = document.getElementById('orderOfMonth');
    var chart_orderOfMonth = new Chart(orderOfMonth, {
        type: 'doughnut',
        data: {
            labels:['Đơn mới', 'Đang giao', 'Đã giao xong', 'Đã hủy'],
            datasets: [{
                label: 'Đơn hàng',
                data: orderMonthDatas,
                backgroundColor: [
                    'rgb(23 162 184)',
                    'rgb(220 53 69)',
                    'rgb(40 167 69)',
                    'rgb(108 117 125)',
                ]
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    align: 'end',
                    labels: {
                        color: 'blue',
                    }
                },
            },
        }
    });
  </script>
  <script>
    var datas_month = @php
        echo json_encode($datas_month);
    @endphp ;
    var month_sales_chart = document.getElementById('month_sales_chart');
    var myChart = new Chart(month_sales_chart, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Doanh thu (Đơn vị: VNĐ)',
                data: datas_month,
                backgroundColor: [
                  'rgb(189 46 89)',
                ]
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    align: 'end',
                    labels: {
                        color: 'blue',
                    }
                },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
  </script>

@endsection