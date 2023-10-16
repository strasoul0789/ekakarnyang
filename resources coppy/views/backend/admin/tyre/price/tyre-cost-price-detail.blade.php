@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">ข้อมูลยางรถยนต์</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>วันที่อัพเดตราคา</th>
                                    <th>ราคาขายล่าสุด (บาท)</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($prices as $price => $value)
                            <tbody>
                                @php
                                    $brand = DB::table('brands')->where('id',$value->brand_id)->value('brand');
                                    $model = DB::table('models')->where('id',$value->model_id)->value('model');
                                    $cost_price_format = number_format($value->cost_price);
                                @endphp
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $price+1}}</td>
                                    <td>{{ date('Y-m-d', strtotime($value->created_at)) }}</td>
                                    @if($value->cost_price == null)
                                        <td style="color: red;">0 บาท</td>
                                    @else 
                                        <td>{{$cost_price_format}} บาท</td>
                                    @endif
                                    <td>{{$value->status}}</td>
                                    @if(Auth::guard('admin')->user()->role == "ผู้ดูแล")
                                    <td>             
                                        <a href="{{url('/admin/delete-tyre-cost-price/')}}/{{$value->id}}" style="color: red;" onclick="return confirm('Are you sure to delete ?')">
                                            ลบราคาขาย
                                        </a> 
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection