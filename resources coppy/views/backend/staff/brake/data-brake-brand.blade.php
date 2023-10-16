@extends("/backend/layouts/template/template-staff")

@section("content")
<div class="container-fluid mt-5">
    <h1>ผ้าเบรก {{$brand}}</h1>

    @if(count($model_sedans) != 0)
    <h1>รถเก๋ง รถสปอร์ต</h1><br>
    <div class="row">
        @foreach($model_sedans as $model_sedan => $value)
        <div class="col-xl-2 col-6"> 
            <a href="{{url('/staff/data-brake')}}/{{$brand}}/{{$value->model}}" class="bttn">
                {{$value->model}}
            </a>
        </div>
        @endforeach
    </div>
    @endif

    @if(count($model_suvs) != 0)
    <h1>รถ SUV รถอเนกประสงค์</h1><br>
    <div class="row">
        @foreach($model_suvs as $model_suv => $value)
        <div class="col-xl-2 col-6"> 
            <a href="{{url('/staff/data-brake')}}/{{$brand}}/{{$value->model}}" class="bttn">
                {{$value->model}}
            </a>
        </div>
        @endforeach
    </div>
    @endif

    @if(count($model_pickups) != 0)
    <h1>รถกระบะ รถตู้</h1><br>
    <div class="row">
        @foreach($model_pickups as $model_pickup => $value)
        <div class="col-xl-2 col-6"> 
            <a href="{{url('/staff/data-brake')}}/{{$brand}}/{{$value->model}}" class="bttn">
                {{$value->model}}
            </a>
        </div>
        @endforeach
    </div>
    @endif

</div>
{{-- <div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">ข้อมูลผ้าเบรก</h3>
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
                                    <th>ยี่ห้อรถยนต์</th>
                                    <th>รุ่นรถยนต์</th>
                                    <th>ชื่อ</th>
                                    <th>ราคาขายล่าสุด (บาท)</th>
                                </tr>
                            </thead>
                            @foreach($brakes as $brake => $value)
                            <tbody>
                                @php
                                    $brand = DB::table('carbrands')->where('id',$value->brand_id)->value('brand');
                                    $model = DB::table('carmodels')->where('id',$value->model_id)->value('model');
                                    $price = DB::table('brake_sale_prices')->where('brake_id',$value->id)->orderBy('id','desc')->value('price');
                                    $price_format = number_format($price);
                                @endphp
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $brake+1}}</td>
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