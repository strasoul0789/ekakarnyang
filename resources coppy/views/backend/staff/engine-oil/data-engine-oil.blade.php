@extends("/backend/layouts/template/template-staff")

@section("content")
<div class="container-fluid mt-7">
    <h1>ค้นหาน้ำมันเครื่องตามยี่ห้อรถยนต์</h1><br>
    <div class="row">
        @foreach($brands as $brand => $value)
        <div class="col-xl-2 col-6"> 
            <a href="{{url('/staff/data-engine-oil')}}/{{$value->brand}}" class="bttn">
                {{$value->brand}}
            </a>
        </div>
        @endforeach
    </div>
</div>
{{-- <div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">ข้อมูลน้ำมันเครื่อง</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{$engine_oils->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>ยี่ห้อสินค้า</th>
                                    <th>ยี่ห้อรถยนต์</th>
                                    <th>รุ่นรถยนต์</th>
                                    <th>ชื่อ</th>
                                    <th>ราคาขายล่าสุด (บาท)</th>
                                </tr>
                            </thead>
                            @foreach($engine_oils as $engine_oil => $value)
                            <tbody>
                                @php
                                    $brand = DB::table('carbrands')->where('id',$value->brand_id)->value('brand');
                                    $model = DB::table('carmodels')->where('id',$value->model_id)->value('model');
                                    $price = DB::table('engine_oil_sale_prices')->where('engine_oil_id',$value->id)->orderBy('id','desc')->value('price');
                                    $price_format = number_format($price);
                                @endphp
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $engine_oil+1}}</td>
                                    <td>{{$value->brand}}</td>
                                    <td>{{$brand}}</td>
                                    <td>{{$model}}</td>
                                    <td>{{$value->name}}</td>
                                    @if($price == null)
                                        <td style="color: red;">0 บาท</td>
                                    @else 
                                        <td>{{$price_format}} บาท</td>
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
</div> --}}
@endsection