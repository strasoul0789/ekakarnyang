@extends("newSystem/frontendMain/layouts/template/template")
<script type="text/javascript" src="{{asset('js/halkaBox.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/halkaBox.min.css')}}">
<script type="text/javascript" src="{{asset('js/image-lightbox.js')}}"></script>
@section("content")
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
    .model-bg {
        background-color: #961a1a;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 10px;
    }
</style>
<div style="margin: 3rem; mt-5">
    <center><h1 style="color:red;"><strong>โช๊ค {{$brand}}</strong></h1></center>
    <div class="row">
        <div class="col-md-12">
            <div style="border-bottom: 3px solid #00902b;" class="mb-5">
                <div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">รุ่น PREMIUM พรีเมี่ยม</h1></div>
            </div>
        </div>
    </div>
    @php
        $brand_id = DB::table('shockbrands')->where('brand',$brand)->value('id');
        $premium_shocks = DB::table('shockproducts')->where('brand_id',$brand_id)->where('carmodel','PREMIUM พรีเมี่ยม')->get();
    @endphp
    <div class="row">
        @foreach ($premium_shocks as $premium_shock => $value)
            <div class="col-md-3 mt-5">
                <div style="text-align: right;"><div class="model-bg"><h2><strong>{{$value->model}}</strong></h2></div></div>
                <a href="{{url('image_upload/image_shock')}}/{{$value->image}}" class="singleImage2">
                    <img src="{{url('image_upload/image_shock')}}/{{$value->image}}" class="img-responsive">
                </a>
            </div>
        @endforeach
    </div><br>
    <p style="color: red; text-align:right !important;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
    <br>
    <div class="row mt-5">
        <div class="col-md-12">
            <div style="border-bottom: 3px solid #00902b;" class="mb-5">
                <div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">รุ่น SUPER SERIES ซุปเปอร์ซีรีย์</h1></div>
            </div>
        </div>
    </div>
    @php
        $brand_id = DB::table('shockbrands')->where('brand',$brand)->value('id');
        $superseries_shocks = DB::table('shockproducts')->where('brand_id',$brand_id)->where('carmodel','SUPER SERIES ซุปเปอร์ซีรีย์')->get();
    @endphp
    <div class="row">
        @foreach ($superseries_shocks as $superseries_shock => $value)
            <div class="col-md-3 mt-5">
                <div style="text-align: right;"><div class="model-bg"><h2><strong>{{$value->model}}</strong></h2></div></div>
                <a href="{{url('image_upload/image_shock')}}/{{$value->image}}" class="singleImage2">
                    <img src="{{url('image_upload/image_shock')}}/{{$value->image}}" class="img-responsive">
                </a>
            </div>
        @endforeach<br>
    </div>
    <p style="color: red; text-align:right !important;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
    <br>
    <div class="row mt-5">
        <div class="col-md-12">
            <div style="border-bottom: 3px solid #00902b;" class="mb-5">
                <div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">รุ่น High-Performance ไฮ-เพอร์ฟอร์มานซ์</h1></div>
            </div>
        </div>
    </div>
    @php
        $brand_id = DB::table('shockbrands')->where('brand',$brand)->value('id');
        $high_shocks = DB::table('shockproducts')->where('brand_id',$brand_id)->where('carmodel','High-Performance ไฮ-เพอร์ฟอร์มานซ์')->get();
    @endphp
    <div class="row">
        @foreach ($high_shocks as $high_shock => $value)
            <div class="col-md-3 mt-5">
                <div style="text-align: right;"><div class="model-bg"><h2><strong>{{$value->model}}</strong></h2></div></div>
                <a href="{{url('image_upload/image_shock')}}/{{$value->image}}" class="singleImage2">
                    <img src="{{url('image_upload/image_shock')}}/{{$value->image}}" class="img-responsive">
                </a>
            </div>
        @endforeach
    </div>
    <br>
    <p style="color: red; text-align:right !important;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
</div>
@endsection