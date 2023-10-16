@extends("/backend/layouts/template/template-staff")

@section("content")
<div class="container-fluid mt-7">
    <h1>ค้นหาน้ำมันเครื่อง {{$brand}} รุ่น {{$model}}</h1>
</div>
<div class="container-fluid">
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
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>ยี่ห้อสินค้า</th>
                                    <th>ชื่อ</th>
                                    <th>ราคาขายล่าสุด (บาท)</th>
                                </tr>
                            </thead>
                            @foreach($engine_oils as $engine_oil => $value)
                            <tbody>
                                @php
                                    $price = DB::table('engine_oil_sale_prices')->where('engine_oil_id',$value->id)->orderBy('id','desc')->value('price');
                                    $price_format = number_format($price);
                                @endphp
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $engine_oil+1}}</td>
                                    <td>{{$value->brand}}</td>
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
</div>
@endsection