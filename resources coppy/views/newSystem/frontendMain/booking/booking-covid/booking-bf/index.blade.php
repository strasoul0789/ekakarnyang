<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>เอกการยาง ไว้ใจผู้เชี่ยวชาญ เรื่องรถยนต์</title>

    <!-- Icons font CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" media="all">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        @media (max-width: 991px) {
        .img-logo {
            width: 80%;
        }
    }
    .alertdesign {
        text-align: center;
        color: red;
        border-style: solid;
        border-color: red;
        font-size: 20px;
    }
    </style>
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body" >
                    {{-- <center><img class="img-logo" src="{{ asset('/images/tyres/model_bf.jpg')}}" class="img-responsive" style="width:50%;"></center>
                    <center><h2 class="kanit">ลงทะเบียนจองสิทธิ์ซื้อยางรถยนต์ยี่ห้อ BF Goodrich</h2></center>
                    <center><h3 class="kanit" style="color: red;">ลดพิเศษสูงสุดถึง <strong>30%</strong></h3></center>
                    <center><h4 class="title" style="color: red;">(สิทธิพิเศษสำหรับรถป้ายเขียว-ป้ายเหลืองเท่านั้น)</h4></center>
                    <center><h3 class="kanit">บีเอฟกู๊ดริชช่วยเหลือผู้ประกอบการ</h3></center>
                    <center><h3 class="title kanit">เพื่อส่งเสริมการท่องเที่ยวภายในจังหวัดภูเก็ต และพังงา</h3></center>
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alertdesign alert alert-{{ $msg }}"><i class="fa fa-times"></i> {{ Session::get('alert-' . $msg) }}</p>
                        @endif
                    @endforeach
                    <div style="border-radius: 25px; border: 2px solid #2c6ed5; padding: 20px; margin-top:20px;">
                        <center><h3><a style="color: red;" class="kanit" href="{{url('/bf-covid-19')}}">คลิ๊ก ที่นี่ เพื่อเลือกรุ่น และขนาดยางรถยนต์</a></h3></center>
                    </div>
                    <div style="border-radius: 25px; border: 2px solid #2c6ed5; padding: 20px; margin-top:20px;">
                        <center><h3 class="title kanit">เงื่อนไขในการลงทะเบียนจองสิทธิ์ซื้อยางรถยนต์ยี่ห้อ BF Goodrich</h3></center>
                        <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> ขอสงวนสิทธิ์เฉพาะรถป้ายเขียว-ป้ายเหลือง แกร็บคาร์ เท่านั้น รถส่วนบุคคลไม่สามารถใช้สิทธิพิเศษนี้ได้</p>
                        <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> ลงทะเบียนจองสิทธิ์ซื้อยางรถยนต์ยี่ห้อบีเอฟกู๊ดริชผ่านระบบออนไลน์ จำกัดการลงทะเบียน 1 ท่าน / 1 สิทธิ์ / 1 คัน เท่านั้น</p>
                        <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> ชื่อผู้ลงทะเบียนการจองต้องตรงกับผู้ที่รับเข้าบริการ พร้อมแสดงบัตรประจำตัวประชาชน</p>
                        <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> ไม่สามารถเลือกปีผลิตยางได้ และทางบริษัทฯ ขอสงวนสิทธิ์ในการนำยางเก่ากลับ</p>
                        <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> สินค้ามีจำนวนจำกัด เงื่อนไขเป็นไปตามที่บริษัทฯกำหนด ขอสงวนสิทธิ์ในการเปลี่ยนแปลง หรือแก้ไข โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</p>
                        <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> นโยบายการเปิดเผยข้อมูลส่วนบุคคลต่อบริษัท เพื่อผลประโยชน์ของลูกค้า ยินยอมให้บริษัทฯ ใช้ข้อมูลของลูกค้าซึ่งได้ให้ไว้ข้างต้น และยินยอมรับข้อมูลข่าวสารและข้อเสนอเกี่ยวกับสินค้า บริการ ส่วนลด และสิทธิประโยชน์ต่างๆ เพื่อให้ท่านได้สิทธิประโยชน์และข้อเสนอพิเศษจากบริษัทฯ ผ่านช่องทาง SMS</p>
                        <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> หลังจากลงทะเบียนสำเร็จ กรุณาแคปหน้าจอการลงทะเบียนจองสิทธิ์ส่งทางไลน์ รอผลการตอบกลับภายใน 15 วันทำการ</p>
                    </div><br> --}}
                    <center><h2 class="kanit" style="color: red;">>> ปิดลงทะเบียนจองสิทธิ์ซื้อยางรถยนต์ยี่ห้อ BF Goodrich <<</h2></center>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
