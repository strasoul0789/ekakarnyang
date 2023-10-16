@extends("newSystem/frontendMain/layouts/template/template")

@section("content")
<div class="container">
    <div class="row"> 
        @php
            $brand_image = DB::table('carbrands')->where('brand',$carbrand)->value('image');
        @endphp
        <div class="col-md-12 mt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <picture>
                    <source type="image/jpeg" srcset="{{url('image_upload/image_brand_car')}}/{{$brand_image}}" class="img-responsive">
                    <img src="{{url('image_upload/image_brand_car')}}/{{$brand_image}}" class="img-responsive">
                </picture>
                <a href="#" class="bttn mb-5">
                    โช้ค {{$brand}}
                </a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
@php
    $brand_id = DB::table('shockbrands')->where('brand',$brand)->value('id');
    $models = DB::table('shockmodels')->where('brand_id',$brand_id)->get();
@endphp
<div class="container">
    <div class="row">
        @foreach ($models as $model => $value)
            @php
                $brand = DB::table('shockbrands')->where('id',$value->brand_id)->value('brand');
            @endphp
            <div class="col-md-4">
                <a class="bttn" href="{{url('/product-shock')}}/{{$brand}}/{{$carbrand}}/{{$value->model}}">รุ่น {{$value->model}}</a>
            </div>
        @endforeach
    </div><br>
    <p style="color: red;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง ทุกสาขา หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
</div>

@endsection