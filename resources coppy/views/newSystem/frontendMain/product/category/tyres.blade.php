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
    <p class="mt-5" style="color: #ff0000; text-align:right;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
    <div class="row">
        @foreach ($brands as $brand => $value)
            @php
                $Model_ = DB::table('model')->where('subcategory_id',$value->id)
                                                             ->orderByRaw("HAIYADUN")
                                                             ->where('status','เปิด')
                                                             ->get(); 
            @endphp
            <div class="col-md-12" id="{{$value->brand}}">
                <div style="border-bottom: 3px solid #00902b;" class="mb-5 mt-5">
                    <div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">{{$value->brand}}</h1></div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4 mt-5 mb-5">
                    <picture>
                        <source type="image/jpeg" srcset="{{url('image_upload/image_brand_tyre')}}/{{$value->image}}" class="img-responsive">
                        <img src="{{url('image_upload/image_brand_tyre')}}/{{$value->image}}" class="img-responsive">
                    </picture>
                </div>
                <div class="col-md-4"></div>
            </div>
            @foreach ($product_models as $product_model => $value)
                @php
                    $brand = DB::table('product_brands')->where('id',$value->subcategory_id)->value('brand');
                @endphp
                <div class="col-lg-3 col-xl-3 col-md-3" style="margin-top: 15px;">  
                    <a href="{{url('/product-tyre')}}/{{$brand}}/{{$value->model}}" class="bttn">
                        {{$value->model}}
                    </a>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection