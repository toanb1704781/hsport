@extends('backend.contents.supplier.supplier_show')

@section('importdetail')

  <div class="card">

      @foreach ($importgoods as $importgoods)    
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0 table-striped" style="text-align: center" >
              <thead>
                <tr>
                  <th>Tên sản phẩm</th>
                  <th>Màu</th>
                  <th>Size</th>
                  <th>Số lượng</th>
                  <th>Đơn giá nhập</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($importgoods->importdetail as $importdetail)
                  <tr>
                    <td>
                      {{$importdetail->shoesdetail->shoescolor->shoes->shoesName}}
                    </td>
                    <td>
                      {{$importdetail->shoesdetail->shoescolor->color->colorName}}
                    </td>
                    <td>
                      {{$importdetail->shoesdetail->size}}
                    </td>
                    <td>
                      {{$importdetail->importQuan}}
                    </td>
                    <td>
                      {{number_format($importdetail->shoesCost,0, "", ".")}}₫
                    </td>
                  </tr>
                  @php
                    $total = $total + ($importdetail->importQuan * $importdetail->shoesCost);
                  @endphp  
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <hr>
        <h6>
          <small>Mã phiếu nhập:</small>  <strong>{{$importgoods->importID}}</strong> <br>
          <small>Người tạo phiếu:</small> <strong>{{$importgoods->employee->information->name}} - {{$importgoods->employee->role->role}}</strong>  <br>
          <small>Tạo lúc:</small>  <strong>{{$importgoods->created_at}}</strong> <br>
          <small>Tổng thành tiền:</small> <strong>{{number_format($total,0, "", ".")}}₫</strong>
        </h6>
        <hr>
      @endforeach


  </div>
@endsection