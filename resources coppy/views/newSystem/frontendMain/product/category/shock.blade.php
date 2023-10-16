@extends("newSystem/frontendMain/layouts/template/template")
<style>
    .title-bg-monroe {
        background-color: #00902b;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .title-bg-monroe::after{
        content: '';
        border: 23.5px solid transparent;
        border-bottom-color: #00902b;
        border-left-color: #00902b;
        position: absolute;
        left: 0;
        top: 0;
        margin-left: 127px;
    }
    .title-bg-kayaba {
        background-color: #00902b;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .title-bg-kayaba::after{
        content: '';
        border: 24.5px solid transparent;
        border-bottom-color: #00902b;
        border-left-color: #00902b;
        position: absolute;
        left: 0;
        top: 0;
        margin-left: 120px;
    }
    .title-bg-profender {
        background-color: #00902b;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .title-bg-profender::after{
        content: '';
        border: 24.5px solid transparent;
        border-bottom-color: #00902b;
        border-left-color: #00902b;
        position: absolute;
        left: 0;
        top: 0;
        margin-left: 159px;
    }
    .title-bg-TEIN {
        background-color: #00902b;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .title-bg-TEIN::after{
        content: '';
        border: 24.5px solid transparent;
        border-bottom-color: #00902b;
        border-left-color: #00902b;
        position: absolute;
        left: 0;
        top: 0;
        margin-left: 84px;
    }
    .title-bg-H-DRIVE {
        background-color: #00902b;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .title-bg-H-DRIVE::after{
        content: '';
        border: 24.5px solid transparent;
        border-bottom-color: #00902b;
        border-left-color: #00902b;
        position: absolute;
        left: 0;
        top: 0;
        margin-left: 124px;
    }
</style>
@section("content")
<div class="container mt-5">
    <div class="row">
        @foreach ($shock_brands as $shock_brand => $value)
            <div class="col-md-12">
                <div style="border-bottom: 3px solid #00902b;" class="mb-5">
                    <div class="title-bg-{{$value->brand}}"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">{{$value->brand}}</h1></div>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <img src="{{url('image_upload/image_brand_shock')}}/{{$value->image}}" class="img-responsive">
            </div>
            <div class="col-md-6 mb-5">
                @if($value->brand == "KAYABA")
                    <p style="color: #000000; font-size:18px;"><strong>โช้คอัพ Kayaba</strong> เป็นโช้คอัพที่เหมาะกับผู้ใช้รถกระบะที่มีการบรรทุกหนัก ด้วยคุณสมบัตโช้คอัพแก๊สจะช่วยให้รถเกาะถนนได้ดีกว่าโช้คอัพน้ำมัน ตอบสนองการใช้งานได้รวดเร็วกว่า แม้ในการขับขี่ที่ความเร็วสูง</p><br>
                    <a href="{{url('/product-shock')}}/{{$value->brand}}" class="kanit" style="color: #fff; background-color: #ff0000; padding:5px;">ดูเพิ่มเติม</a>
                @elseif($value->brand == "MONROE")
                    <p style="color: #000000; font-size:18px;"><strong>โช้คอัพ Monroe</strong> เป็นโช้คที่มียอดขายสูงสุดทั่วโลก โดยเฉพาะในทวีปอเมริกา ยุโรป และออสเตรเลีย ด้วยประสบการณ์กว่า 93 ปี ที่เป็นผู้นำในการพัฒนา และคิดค้นนวัตกรรมโช้คอัพให้กับยานยนต์ชั้นนำทั่วโลก 
                        ทั้งนี้เพราะ Monroe เชื่อว่าความปลอดภัยในการขับขี่คือหัวใจสำคัญ โช้คอัพ Monroe จึงมีสมรรถนะสูงกว่ามาตรฐาน และตอบสนองทุกความต้องการในการขับขี่</p><br>
                    <a href="{{url('/product-shock')}}/{{$value->brand}}" class="kanit" style="color: #fff; background-color: #ff0000; padding:5px;">ดูเพิ่มเติม</a>
                @elseif($value->brand == "PROFENDER")
                    <p style="color: #000000; font-size:18px;"><strong>โช้คอัพ Profender</strong> โช้คอัพ ยอดนิยม สำหรับ รถกระบะ และ รถ SUV รุ่น PREMIUM : โข้คอัพน้ำมัน JUMBO, โช้คอัพปรับ 4 ระดับ(PAG), 
                        โช้คอัพปรับ 4 ระดับ ยกสูง(PAG), MONOTURE 2.0 SUPER SERIES : MONOTURE 2.0 + MONOTURE ปรับ 8 ระดับ, MONOTURE + PIGGYBACK, MONOTURE ปรับ 8 ระดับ, QUEEN SERIES และรุ่น HIGH-PERFORMANCE</p><br>
                    <a href="{{url('/product-shock')}}/{{$value->brand}}" class="kanit" style="color: #fff; background-color: #ff0000; padding:5px;">ดูเพิ่มเติม</a>
                @elseif($value->brand == "TEIN")
                    <p style="color: #000000; font-size:18px;"><strong>โช้คอัพ TEIN STREETADVANCE Z / ADVANCE</strong> โช๊คอัพประสิทธิภาพสูงคู่ใจเหล่ารถซิ่งแนวสตรีท / รองรับการใช้งานทุกรูปแบบ 
                        และ ENDURAPRO & ENDURAPROPLUS เติมเต็มความสบาย และความทนทานกับโช๊คอัพประสิทธิภาพสูงที่มาพร้อมกับระบบ H.B.S. ใหม่ล่าสุด</p><br>
                    <a href="{{url('/product-shock')}}/{{$value->brand}}" class="kanit" style="color: #fff; background-color: #ff0000; padding:5px;">ดูเพิ่มเติม</a>
                @elseif($value->brand == "H-DRIVE")
                    <p style="color: #000000; font-size:18px;"><strong>โช้คอัพ H-DRIVE</strong> โช้คสตรัทปรับเกลียว H-Drive แบรนด์ดังจากอเมริกา รุ่น S-SPEC สำหรับรถเก๋ง และ รถ SUV ทุกรุ่น และรุ่น B-SPEC 
                        คุณภาพคุ้มเกินราคา ไม่กระด้าง ตัวสตรัทผลิตจากอลูมิเนียม น้ำหนักเบา ตัวแกนโช้คเป็นระบบ Mono Tube ตอบสนองพื้นถนน เวลาขับขี่ได้ดี หนึบ มั่นใจทุกการขับขี่ สามารถปรับความสูง-ต่ำ ได้ด้วยการสไลด์กระบอกโช้ค 32 ระดับ</p><br>
                    <a href="{{url('/product-shock')}}/{{$value->brand}}" class="kanit" style="color: #fff; background-color: #ff0000; padding:5px;">ดูเพิ่มเติม</a>
                @endif
            </div>
        @endforeach
    </div>
</div>

@endsection
