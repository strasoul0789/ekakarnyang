@extends("newSystem/frontendMain/layouts/template/template")

@section("content")
<style>
    .title-bg-sspec {
        background-color: #00902b;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .title-bg-sspec::after{
        content: '';
        border: 24.5px solid transparent;
        border-bottom-color: #00902b;
        border-left-color: #00902b;
        position: absolute;
        left: 0;
        top: 0;
        margin-left: 112px;
    }
    .title-bg-bspec {
        background-color: #00902b;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .title-bg-bspec::after{
        content: '';
        border: 24.5px solid transparent;
        border-bottom-color: #00902b;
        border-left-color: #00902b;
        position: absolute;
        left: 0;
        top: 0;
        margin-left: 114px;
    }
</style>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div style="border-bottom: 3px solid #00902b;" class="mb-5">
                <div class="title-bg-sspec"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">S-SPEC</h1></div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{url('images/shock/s-spec.jpg')}}" class="img-responsive">
        </div>
        <div class="col-md-6">
            <p style="color: #000000; font-size:18px;">
                <strong style="color: red;">โช้ค H.DRIVE รุ่น S-SPEC</strong> เป็นโช้คอัพที่เหมาะกับผู้ใช้รถเก๋งและรถ SUV ทุกรุ่น ด้วยคุณสมบัติโช้คอัพแก๊สจะช่วยให้รถเกาะถนนได้ดีกว่าโช้คอัพน้ำมัน ตอบสนองการใช้งานได้รวดเร็วกว่า แม้ในการขับขี่ที่ความเร็วสูง สามารถปรับสูง-ต่ำได้ 32 ระดับ ราคาพิเศษ 29,900.- และค่าติดตั้ง 1,000.-
            </p><br>
            <p style="color: red;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง ทุกสาขา หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div style="border-bottom: 3px solid #00902b;" class="mb-5">
                <div class="title-bg-bspec"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">B-SPEC</h1></div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{url('images/shock/b-spec.jpg')}}" class="img-responsive">
        </div>
        <div class="col-md-6">
            <p style="color: #000000; font-size:18px;">
                <strong style="color: red;">โช้ค H.DRIVE รุ่น B-SPEC</strong> เป็นโช๊คอัพในระบบ MONOTUBE ซึ่งตัวสปริงจะถูกออกแบบมาพร้อมค่า K เพื่อตอบสนองในการใช้งานจริงบนท้องถนน วัสดุผลิตจากอลูมิเนียมเพื่อลดน้ำหนัก และเพิ่มความทนทาน สามารถปรับสูงต่ำแบบสไลด์กระบอกได้
                และสามารถปรับค่าความหนืดได้ 16 ระดับ ราคาพิเศษ 19,900.- และค่าติดตั้ง 1,000.-
            </p><br>
            <p style="color: red;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง ทุกสาขา หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
        </div>
    </div>
</div>
@endsection