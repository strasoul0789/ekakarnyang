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
        <div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">น้ำมันเครื่องตามยี่ห้อรถ</h1></div>
    </div>
    <p style="color: #ff0000; text-align:right;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
    <div class="row">
        @foreach ($brands as $brand => $value)
            @php
                $models = DB::table('carmodels')->where('brand_id',$value->id)->where('status','เปิด')->get();
            @endphp
            @if(count($models) != 0)
                <div class="col-md-3 mt-5">
                    <a href="{{url('/carbrand-oil')}}/{{$value->brand}}"><img src="{{url('image_upload/image_brand_car')}}/{{$value->image}}" class="img-responsive"></a>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection