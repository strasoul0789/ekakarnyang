<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>เอกการยาง ไว้ใจผู้เชี่ยวชาญ เรื่องรถยนต์</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('jquery.Thailand.js/dist/jquery.Thailand.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datepicker/daterangepicker.css')}}" media="all">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <style>
        @media (max-width: 991px) {
        .img-logo {
            width: 80%;
        }
    }
    </style>
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo" style="font-family: 'Mitr'">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <center><img class="img-logo" src="{{ asset('/images/tyres/model_bf.jpg')}}" class="img-responsive" style="width:50%;"></center>
                    <div style="border-radius: 25px; border: 2px solid #2c6ed5; padding: 20px; margin-top:20px;">
                        <center><h3>หลักฐานการลงทะเบียนจองสิทธิ์ซื้อยางรถยนต์ยี่ห้อ BF Goodrich</h2></center>
                        <center><h4 style="color: red;">(สิทธิพิเศษสำหรับรถป้ายเขียว-ป้ายเหลือง แกร็บคาร์ เท่านั้น)</h4></center>
                        <h2 style="text-align:center;">คุณ{{$name}} {{$surname}}</h2>
                        <h3 style="text-align:center;">ป้ายทะเบียน {{$carnumber}} {{$carbrand}} รุ่น {{$carmodel}} สี{{$carcolor}}</h3><br>
                        <div style="background-color:red; color:#fff; border-radius: 25px; border: 2px solid red; padding: 15px; margin-top:15px;"><h3 style="text-align:center;">รุ่น {{$model}} ขนาด {{$size}}</h3></div><br>
                        <h3 style="color: red; text-align:center;">ราคายาง 4 เส้น ปกติ <span style='text-decoration:line-through'>{{$sumTotal}}</span> บาท เหลือเพียง {{$price}} บาท</h3>
                        <h5 style="text-align:center;">เปลี่ยนที่{{$service}}</h5><br>
                        <p style="text-align:center;color:red;line-height: 30px !important;font-size:20px !important;">* ส่งหลักฐานการลงทะเบียนรับสิทธิ์ผ่านทางไลน์ "<a href="https://line.me/ti/p/@638mkbno">แอดไลน์ คลิ๊ก</a>" รอผลการตอบกลับภายใน 15 วันทำการ</p>
                        <br><p style="text-align:center;color:red;line-height: 30px !important;font-size:16px !important;">** ขอสงวนสิทธิ์เฉพาะรถป้ายเขียว-ป้ายเหลือง แกร็บคาร์ เท่านั้น รถส่วนบุคคลไม่สามารถใช้สิทธิ์นี้ได้</p>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/datepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/datepicker/daterangepicker.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/global.js')}}"></script>


</body>

</html>
