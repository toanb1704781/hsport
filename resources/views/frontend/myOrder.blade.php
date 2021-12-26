@extends('frontend.layouts.master')

@section('title', 'Đơn hàng của tôi')

@section('home')
<div class="container-fluid table-order">
    <div class="main">
        <div class="content-wrapper">
            
            <div class="container-fluid">
                <div class="row">
                    <div class="shop__sidebar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('frontend.index')}}">
                                        Trang chủ
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Đơn hàng của tôi
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-12 mb-30">
                            <div class="card bg-boxshadow full-height">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Ngày tạo</th>
                                                    <th>Trạng thái</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_order as $order)
                                                    <tr>
                                                        <td>
                                                            {{$i++}}
                                                        </td>
                                                        <td>
                                                            <a href="{{route('frontend.myOrderDetail', ['orderID' => $order->orderID])}}">
                                                                {{$order->orderID}}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            {{number_format($order->total,0, "", ".")}}₫
                                                        </td>
                                                        <td>
                                                            {{$order->created_at}}
                                                        </td>
                                                        <td>
                                                            @if ($order->statusID == 1)
                                                                <span class="badge badge-primary">Đang chờ xử lý</span>
                                                            @endif
                                                            @if ($order->statusID == 2)
                                                                <span class="badge badge-danger">Đang giao hàng</span>
                                                            @endif
                                                            @if ($order->statusID == 3)
                                                                <span class="badge badge-success">Đã giao hàng</span>
                                                            @endif
                                                            @if ($order->statusID == 4)
                                                                <span class="badge badge-secondary">Đã hủy đơn hàng</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($order->statusID == 1)
                                                                <form action="{{route('frontend.myOrderDel', ['orderID' => $order->orderID])}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger" type="submit">
                                                                        <i class="fa fa-close"></i>
                                                                        Hủy
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{$all_order->links()}}
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection