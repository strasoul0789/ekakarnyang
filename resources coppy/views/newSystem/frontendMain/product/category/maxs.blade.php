@extends("newSystem/frontendMain/layouts/template/template")
<title>ล้อแม็กซ์</title>
<style>
    .title-bg-lenso {
        background-color: #ff0000;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .title-bg-lenso::after{
        content: '';
        border: 30.5px solid transparent;
        border-bottom-color: #ff0000;
        border-left-color: #ff0000;
        position: absolute;
        left: 0;
        top: 0;
        margin-left: 148px;
    }
    .title-bg-fuel {
        background-color: #ff0000;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .title-bg-fuel::after{
        content: '';
        border: 30.5px solid transparent;
        border-bottom-color: #ff0000;
        border-left-color: #ff0000;
        position: absolute;
        left: 0;
        top: 0;
        margin-left: 122px;
    }
    .title-bg-kmc {
        background-color: #ff0000;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .title-bg-kmc::after{
        content: '';
        border: 30.5px solid transparent;
        border-bottom-color: #ff0000;
        border-left-color: #ff0000;
        position: absolute;
        left: 0;
        top: 0;
        margin-left: 113px;
    }
</style>
@section("content")
<body style="background-color: #363636;">
    <div class="container mt-5">
        <div class="row">
            @foreach ($max_brands as $max_brand => $value)
            <div class="col-md-12">
                <div style="border-bottom: 1px solid #ffffff;" class="mb-5">
                    <div class="title-bg-{{$value->brand}}">
                        <strong><h1 style="font-weight: bolder;">{{$value->brand}}</h1></strong>
                    </div>
                </div>
                <div class="row">
                    @if($value->brand == "LENSO")
                        <div class="col-md-6 mt-5 mb-5">
                            <img src="{{ asset('/images/maxs/Lenso.jpg')}}" class="img-responsive">
                        </div>
                        <div class="col-md-6 mt-5 mb-5">
                            <p style="color: #fff; font-size:18px;">
                                <strong>ล้อแม็กซ์ LENSO</strong> ถูกออกแบบมาเพื่อตอบสนองความต้องการของผู้ใช้งาน ดีไซน์โดนเด่นสวยงาม 
                                มีเอกลักษณ์เฉพาะตัว มีแบบให้เลือกหลากหลายสามารถใส่ได้กับรถหลายประเภททั้งรถเก๋ง รถเอสยูวี และรถกระบะ
                            </p><br>
                            <a href="{{url('/product-max')}}/{{$value->brand}}" class="kanit" style="color: #fff; background-color: #00902b; padding:5px;">ดูเพิ่มเติม</a>
                            <p class="mt-5" style="color: #ff0000;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
                        </div>
                    @elseif($value->brand == "FUEL")
                        <div class="col-md-6 mb-5">
                            <img src="{{ asset('/images/maxs/fuel.jpg')}}" class="img-responsive">
                        </div>
                        <div class="col-md-6 mb-5">
                            <p style="color: #fff; font-size:18px;">
                               <strong>ล้อแม็กซ์ FUEL</strong> ล้อแม็กซ์สัญชาติอเมริกัน สไตล์ออฟโรด และเอสยูวี ได้รับการออกแบบมาด้วยดีไซน์ที่ทันสมัย เหมาะกับสไตล์รถทรงสูง สไตล์สายลุย มีความเรียบหรู ดุดัน
                                เหมาะสำหรับการแต่งรถสไตล์ออฟโรด ทรงอเมริกัน ถูกใจขาลุยอย่างแน่นอน
                            </p><br>
                            <a href="{{url('/product-max')}}/{{$value->brand}}" class="kanit" style="color: #fff; background-color: #00902b; padding:5px;">ดูเพิ่มเติม</a>
                            <p class="mt-5" style="color: #ff0000;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
                        </div>
                    @elseif($value->brand == "KMC")
                        <div class="col-md-6 mb-5">
                            <img src="{{ asset('/images/maxs/kmc.jpg')}}" class="img-responsive">
                        </div>
                        <div class="col-md-6 mb-5">
                            <p style="color: #fff; font-size:18px;">
                                <strong>ล้อแม็กซ์ KMC</strong> ได้รับการออกแบบมาให้มีลักษณะแข็งแรง ออกแบบลวดลายสวยงาม เหมาะกับการแต่งรถสไตล์อเมริกัน สไตล์รถทรงสูง ที่สามารถลุยป่า ลุยเขา ลุยน้ำได้
                                โดยไม่ต้องมานั่งกังวลว่ารถของคุณจะพัง ออกแบบมาเพื่อตอบสนองรถประเภทออฟโรด ซึ่งแม็กซ์ KMC มีคุณลักษณะโดดเด่นอยู่ที่สไตล์ของแม็กซ์
                            </p><br>
                            <a href="{{url('/product-max')}}/{{$value->brand}}" class="kanit" style="color: #fff; background-color: #00902b; padding:5px;">ดูเพิ่มเติม</a>
                            <p class="mt-5" style="color: #ff0000;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
@endsection