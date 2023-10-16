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
<body style="background-color: #363636;">
    <img src="{{url('images/maxs/kmc/kmc.png')}}" class="img-responsive">
    <div style="margin: 3rem;">
        <div class="row">
            @php
                $products = DB::table('maxproducts')->where('brand_id',$brand_id)->get();
            @endphp
            @foreach ($products as $product => $value)
                @php
                    $brand = DB::table('maxbrands')->where('id',$value->brand_id)->value('brand');
                @endphp
                <div class="col-lg-3 col-xl-3 col-md-3 col-12" style="margin-top: 5rem;">
                    <img src="{{url('image_upload/image_product_max')}}/{{$value->image}}" class="img-responsive">
                    <center><h1 style="color: #858585;">{{$value->model}}</h1></center>
                    <center><p style="color: #ffffff;">{{$value->size}}</p></center>
                    <center><p style="color: #ffffff;">ราคาแม็กซ์ล้อละ {{$value->price}} บาท</p></center><br>
                    <center><a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:16px; margin-top:10px;">สอบถามเพิ่มเติม</h1></div></a></center>
                </div>
            @endforeach
        </div><br>
        <div class="row mt-5">
            <div class="col-md-2"></div>
            <div class="col-md-6" style="margin-top: 10rem;">
                <div style="text-align: center !important;"><h1 style="color: #fff; font-size: 7rem;">KMC WHELLS</h1></div>
                <center><h2 style="color: #fff; line-height:1.8;">KMC wheels แม็กซ์ออฟโรด สไตล์อเมริกัน ถูกออกแบบมาให้มีความโดดเด่น มีเอกลักษณ์เฉพาะตัว มีความแข็งแรง และสามารถรับน้ำหนักได้ดี ล้อแม็กซ์สไตล์อเมริกันกำลังเป็นที่นิยมในประเทศไทย</h2></center>
                <center><p style="color: #ff0000;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p></center>
            </div>
            <div class="col-md-4">
                <div style="text-align: left !important;"><img src="{{url('images/maxs/kmc/kmc-footer.png')}}" width="100%"></div> 
            </div>
        </div>
    </div>
</body>
@endsection