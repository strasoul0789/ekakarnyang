@extends("newSystem/frontendMain/layouts/template/template")

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
    .title-bg::after{
        content: '';
        border: 24.5px solid transparent;
        border-bottom-color: #00902b;
        border-left-color: #00902b;
        position: absolute;
        left: 0;
        top: 0;
        margin-left: 120px;
    }
</style>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div style="border-bottom: 3px solid #00902b;" class="mb-5">
                <div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">{{$brand}}</h1></div>
            </div>
            <p style="color: red; text-align:right;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง ทุกสาขา หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
        </div>
    </div>
    <div class="row">
        @foreach ($carbrands as $carbrand => $value)
            <div class="col-md-3 col-6 mt-5">
                <a href="{{url('/product-shock')}}/{{$brand}}/{{$value->brand}}"><img src="{{url('image_upload/image_brand_car')}}/{{$value->image}}" class="img-responsive"></a>
            </div>
        @endforeach
    </div>
</div>
@endsection