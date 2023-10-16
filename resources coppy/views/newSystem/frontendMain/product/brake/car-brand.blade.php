@extends("newSystem/frontendMain/layouts/template/template")
<style>
    .title-bg {
        background-color: #00902b;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }
</style>
@section("content")
<div class="container mt-5">
    <div style="border-bottom: 3px solid #00902b;" class="mb-5">
        <div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">ผ้าเบรกตามรุ่นรถ</h1></div>
    </div>
    <p style="color: #ff0000; text-align:right;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
    <div class="row">
        @php
            $car_image = DB::table('carbrands')->where('id',$brand_id)->value('image');
        @endphp
        <div class="col-md-12 mt-5 mb-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img src="{{url('image_upload/image_brand_car')}}/{{$car_image}}" class="img-responsive">
            </div>
            <div class="col-md-4"></div>
        </div>
        @foreach ($carmodels as $carmodel => $value)
            @php
                $brand = DB::table('carbrands')->where('id',$value->brand_id)->where('status','เปิด')->value('brand');
            @endphp
            <div class="col-lg-3 col-xl-3 col-md-3">
                <a href="{{url('/product-brake')}}/{{$brand}}/{{$value->model}}" class="bttn">
                    {{$value->model}}
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection