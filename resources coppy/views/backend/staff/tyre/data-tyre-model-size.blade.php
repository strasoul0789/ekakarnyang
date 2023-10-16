@extends("/backend/layouts/template/template-staff")

@section("content")
<div class="container-fluid mt-7">
    <h1>ค้นหายางรถยนต์ {{$brand}} รุ่น {{$model}} {{$width}}/{{$ratio}}{{$diameter}}</h1>
</div>
<div class="container-fluid">
    {{$tyres->links()}}
    <div class="row justify-content-center mt-5">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0"></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>รุ่นยางรถยนต์</th>
                                    <th>ขนาดยางรถยนต์</th>
                                    <th>ราคาขายล่าสุด (บาท)</th>
                                    <th>หมายเหตุ</th>
                                </tr>
                            </thead>
                            @foreach($tyres as $tyre => $value)
                            <tbody>
                                @php
                                    $brand = DB::table('brands')->where('id',$value->brand_id)->value('brand');
                                    $model = DB::table('models')->where('id',$value->model_id)->value('model');
                                    $price = DB::table('tyre_sale_prices')->where('tyre_id',$value->id)->orderBy('id','desc')->value('price');
                                    $price_format = number_format($price);
                                    $cost_price = DB::table('tyre_cost_prices')->where('tyre_id',$value->id)->orderBy('id','desc')->value('cost_price');
                                    $cost_price_format = number_format($cost_price);
                                @endphp
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $tyre+1}}</td>
                                    <td>{{$model}}</td>
                                    <td>{{$value->width}}/{{$value->ratio}}{{$value->diameter}}</td>
                                    @if($price == null)
                                        <td style="color: red;">0 บาท</td>
                                    @else 
                                        <td>{{$price_format}} บาท</td>
                                    @endif
                                    @if($value->comment != null)
                                        <td style="color: red;">{{$value->comment}}</td>
                                    @else 
                                        <td></td>
                                    @endif
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                {{$tyres->links()}}
            </div>
        </div>
    </div>  
</div>
@endsection