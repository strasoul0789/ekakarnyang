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
    <img src="{{url('images/maxs/lenso/lenso-01.jpeg')}}" class="img-responsive">
    <img src="{{url('images/maxs/lenso/lenso-02.jpeg')}}" class="img-responsive">
    <img src="{{url('images/maxs/lenso/lenso-03.jpeg')}}" class="img-responsive">
    <p style="color: #ff0000; text-align:right; margin-right:10px;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
    <div style="border-top: 2px solid #ffffff; text-align:right;" class="mb-5">
        <a href="https://www.lensowheel.co.th/product" target="_blank"><div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:16px; margin-top:10px;">ดูข้อมูลแม็กซ์ LENSO เพิ่มเติม</h1></div></a>
    </div>
</body>
@endsection