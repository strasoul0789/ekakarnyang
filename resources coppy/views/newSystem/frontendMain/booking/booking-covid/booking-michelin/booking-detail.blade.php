<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <!-- Title Page-->
    <title>เอกการยาง ไว้ใจผู้เชี่ยวชาญ เรื่องรถยนต์</title>

    <!-- Icons font CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('jquery.Thailand.js/dist/jquery.Thailand.min.css')}}">

    <!-- Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datepicker/daterangepicker.css')}}" media="all">

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
                <div class="card-heading"></div>
                <div class="card-body">
                    <center><img class="img-logo" src="{{ asset('/images/new-template/logo-tyreplus.png')}}" class="img-responsive" style="width:40%;"></center>
                    <center><img class="img-logo" src="{{ asset('/images/tyres/michelin_logo.png')}}" class="img-responsive" style="width:40%;"></center>
                    <center><h2 class="kanit">ลงทะเบียนจองสิทธิ์ซื้อยางรถยนต์ยี่ห้อมิชลิน</h2></center>
                    <center><h3 class="kanit" style="color: red;">ลดพิเศษสูงสุดถึง <strong>30%</strong></h3></center>
                    <center><h4 class="title" style="color: red;">(สิทธิพิเศษสำหรับรถป้ายเขียว-ป้ายเหลืองเท่านั้น)</h4></center>
                    <center><h3 class="kanit">มิชลินช่วยเหลือผู้ประกอบการ</h3></center>
                    <center><h3 class="title kanit">เพื่อส่งเสริมการท่องเที่ยวภายในจังหวัดภูเก็ต และพังงา</h3></center>
                    <form action="{{url('/booking-michelin-support-phuket')}}" enctype="multipart/form-data" id="demo1" class="frm" method="post" autocomplete="off">@csrf
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                          @if(Session::has('alert-' . $msg))
                          <p class="alertdesign alert alert-{{ $msg }}"><i class="fa fa-times"></i> {{ Session::get('alert-' . $msg) }}</p>
                          @endif
                        @endforeach
                        <div style="border-radius: 25px; border: 2px solid #2c6ed5; padding: 20px; margin-top:20px;">
                            <center><h3 class="title">ข้อมูลการลงทะเบียนจองสิทธิ์ซื้อยางรถยนต์ยี่ห้อมิชลิน</h2></center>
                            <center><h3><a style="color: red;" href="{{url('/michelin-support-phuket')}}">คลิ๊กเพื่อแก้ไข เปลี่ยนแปลง ยี่ห้อยาง หรือขนาดยางรถยนต์</a></h3></center><br>
                                    
                            <div class="row row-space">
                                @php
                                    $model = DB::table('product_models')->where('id',$model_id)->value('model');
                                @endphp
                                <div class="col-2">
                                    <div class="input-group">
                                        <input style="width:100%" class="input--style-1" type="text" value="รุ่น {{$model}}" readonly="readonly">
                                        <input type="hidden" name="model" value="{{$model}}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <input style="width:100%" class="input--style-1" type="text" value="ขนาดยาง {{$width}}/{{$ratio}}{{$diameter}}" readonly="readonly">
                                        <input type="hidden" name="size" value="{{$width}}/{{$ratio}}{{$diameter}}">
                                    </div>
                                </div>
                            </div>
                            <div style="border-radius: 25px; border: 2px solid #2c6ed5; padding: 9px; margin-top:10px; text-align:center;">
                                {{-- <h4>ราคายางต่อเส้น {{$price}} บาท</h4> --}}
                                @php
                                    $priceNumber = str_replace( ',', '', $price );
                                    $sum = $priceNumber*4;
                                    $sumTotal = number_format($sum);
                                    $promotion = $priceNumber*3;
                                    $promotion = number_format($promotion);
                                @endphp
                                <h3 style="color: red;">ราคายาง 4 เส้น ปกติ <span style='text-decoration:line-through'>{{$sumTotal}}</span> บาท <br> เหลือเพียง {{$promotion}} บาท</h3>
                                <p style="color: red;">** ราคานี้พร้อมเปลี่ยนใส่ ไม่รวมถ่วงล้อ และตั้งศูนย์</p>
                                <input type="hidden" name="price" value="{{$promotion}}">
                                <input type="hidden" name="sumTotal" value="{{$sumTotal}}">
                            </div>
                            <br>
                            <div class="input-group" style="width:100%">
                                
                                <div class="rs-select2 js-select-simple select--no-search">
                                    @if ($errors->has('service'))
                                    <span style="font-size: 17px; color:red;">({{ $errors->first('service') }})</span>
                                    @endif
                                    <select name="service">
                                        <option disabled="disabled" selected="selected"> <p style="color:red !important;">*</p> เลือกร้านตัวแทนเปลี่ยนยางรถยนต์</option>
                                        <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาโคกกลอย' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาโคกกลอย</option>  
                                        <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาเมืองพังงา' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาเมืองพังงา</option>
                                        <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาถลาง' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาถลาง</option>
                                        <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาไทวัสดุ' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาไทวัสดุ</option>
                                        <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาบายพาส' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาบายพาส</option>
                                        <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาเจ้าฟ้า' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาเจ้าฟ้า</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                        <div style="border-radius: 25px; border: 2px solid #2c6ed5; padding: 20px; margin-top:20px;">    
                            <center><h3 class="title">ข้อมูลส่วนตัว</h2></center>
                            <div class="input-group">
                                @if ($errors->has('card_id'))
                                    <span style="font-size: 17px; color:red;">({{ $errors->first('card_id') }})</span>
                                @endif
                                <input onkeyup="autoTab(this)" id="txtID" style="width:100%" class="input--style-1" type="text" placeholder="* เลขบัตรประชาชน" name="card_id" value="{{ old('card_id') }}">
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('name'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('name') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* ชื่อ ตามบัตรประชาชน" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('surname'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('surname') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* นามสกุล ตามบัตรประชาชน" name="surname" value="{{ old('surname') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('bday'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('bday') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* วัน/เดือน/ปีเกิด" name="bday" value="{{ old('bday') }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('tel'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('tel') }})</span>
                                        @endif
                                        <input style="width:100%" class="phone_format input--style-1" type="text" placeholder="* เบอร์โทรติดต่อ" name="tel" value="{{ old('tel') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('address'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('address') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* ที่อยู่" name="address" value="{{ old('address') }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="หมู่" name="moo" value="{{ old('moo') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="ชื่ออาคาร/หมู่บ้าน" name="village" value="{{ old('village') }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="ซอย/ถนน" name="road" value="{{ old('road') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('district'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('district') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* ตำบล" name="district" value="{{ old('district') }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('amphoe'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('amphoe') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* อำเภอ" name="amphoe" value="{{ old('amphoe') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('province'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('province') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* จังหวัด" name="province" value="{{ old('province') }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('zipcode'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('zipcode') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* รหัสไปรษณีย์" name="zipcode" value="{{ old('zipcode') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="border-radius: 25px; border: 2px solid #2c6ed5; padding: 20px; margin-top:20px;">
                            <center><h3 class="title">ข้อมูลรถยนต์ ป้ายเขียว-ป้ายเหลือง แกร็บคาร์</h2></center>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('carnumber'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('carnumber') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* ป้ายทะเบียน ( ไม่ต้องใส่ - )" name="carnumber" value="{{ old('carnumber') }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('carbrand'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('carbrand') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* ยี่ห้อรถ" name="carbrand" value="{{ old('carbrand') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('carmodel'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('carmodel') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* รุ่นรถ" name="carmodel" value="{{ old('carmodel') }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        @if ($errors->has('carcolor'))
                                            <span style="font-size: 17px; color:red;">({{ $errors->first('carcolor') }})</span>
                                        @endif
                                        <input style="width:100%" class="input--style-1" type="text" placeholder="* สีรถ" name="carcolor" value="{{ old('carcolor') }}">
                                    </div>
                                </div>
                            </div>
                            <p style="color:red;">* ในกรณี รถป้ายเขียว-ป้ายเหลือง ให้แนบรูปภาพรถยนต์มองเห็นป้ายทะเบียน <br>* ในกรณี แกร็บคาร์ ให้แนบหลักฐานยืนยันตัวตนผู้ขับแกร็บ</p>
                            <div class="input-group">
                                @if ($errors->has('image'))
                                    <span style="font-size: 17px; color:red;">({{ $errors->first('image') }})</span>
                                @endif
                                <input style="width:100%" class="input--style-1" type="file" name="image">
                            </div>
                        </div>
                        <div style="border-radius: 25px; border: 2px solid #2c6ed5; padding: 20px; margin-top:20px;">
                            <center><h3 class="title kanit">ข้อตกลงและเงื่อนไขในการลงทะเบียนจองสิทธิ์ซื้อยางรถยนต์ยี่ห้อมิชลิน</h3></center>
                            <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> ขอสงวนสิทธิ์เฉพาะรถป้ายเขียว-ป้ายเหลือง แกร็บคาร์ เท่านั้น รถส่วนบุคคลไม่สามารถใช้สิทธิพิเศษนี้ได้</p>
                            <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> ลงทะเบียนจองสิทธิ์ซื้อยางรถยนต์ยี่ห้อมิชลินผ่านระบบออนไลน์ จำกัดการลงทะเบียน 1 ท่าน / 1 สิทธิ์ / 1 คัน เท่านั้น</p>
                            <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> ชื่อผู้ลงทะเบียนการจองต้องตรงกับผู้ที่รับเข้าบริการ พร้อมแสดงบัตรประจำตัวประชาชน</p>
                            <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> ไม่สามารถเลือกปีผลิตยางได้ และทางบริษัทฯ ขอสงวนสิทธิ์ในการนำยางเก่ากลับ</p>
                            <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> สินค้ามีจำนวนจำกัด เงื่อนไขเป็นไปตามที่บริษัทฯกำหนด ขอสงวนสิทธิ์ในการเปลี่ยนแปลง หรือแก้ไข โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</p>
                            <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> นโยบายการเปิดเผยข้อมูลส่วนบุคคลต่อบริษัท เพื่อผลประโยชน์ของลูกค้า ยินยอมให้บริษัทฯ ใช้ข้อมูลของลูกค้าซึ่งได้ให้ไว้ข้างต้น และยินยอมรับข้อมูลข่าวสารและข้อเสนอเกี่ยวกับสินค้า บริการ ส่วนลด และสิทธิประโยชน์ต่างๆ เพื่อให้ท่านได้สิทธิประโยชน์และข้อเสนอพิเศษจากบริษัทฯ ผ่านช่องทาง SMS</p>
                            <p class="kanit" style="font-size:15px;"><i class="fa fa-angle-double-right"></i> หลังจากลงทะเบียนสำเร็จ กรุณาแคปหน้าจอการลงทะเบียนจองสิทธิ์ส่งทางไลน์ รอผลการตอบกลับภายใน 15 วันทำการ</p>
                        </div><br>
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                          @if(Session::has('alert-' . $msg))
                          <p class="alertdesign alert alert-{{ $msg }}"><i class="fa fa-times"></i> {{ Session::get('alert-' . $msg) }}</p>
                          @endif
                        @endforeach
                        <div class="p-t-20"> 
                            <center><input type="checkbox" id="checkme"/> ยอมรับเงื่อนไขและข้อตกลง</center><br>
                            <input type="hidden" name="brand" value="MICHELIN">
                            <center><button class="btn btn--radius btn--blue btn_sub" disabled="disabled" id="sendNewSms" type="submit">ลงทะเบียนจองสิทธิ์</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

    <!-- Vendor JS-->
    <script type="text/javascript" src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/datepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script type="text/javascript" src="{{asset('js/global.js')}}"></script>

    <script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>
    <script type="text/javascript" src="{{asset('jquery.Thailand.js/dependencies/zip.js/zip.js')}}"></script>
    <script type="text/javascript" src="{{asset('jquery.Thailand.js/dependencies/JQL.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('jquery.Thailand.js/dependencies/typeahead.bundle.js')}}"></script>
    <script type="text/javascript" src="{{asset('jquery.Thailand.js/dist/jquery.Thailand.min.js')}}"></script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
         m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-33058582-1', 'auto', {
          'name': 'Main'
        });
        ga('Main.send', 'event', 'jquery.Thailand.js', 'GitHub', 'Visit');
</script>
      
<script type="text/javascript">
    $.Thailand({
      database: '{{asset('jquery.Thailand.js/database/db.json')}}',
      $district: $('#demo1 [name="district"]'),
      $amphoe: $('#demo1 [name="amphoe"]'),
      $province: $('#demo1 [name="province"]'),
      $zipcode: $('#demo1 [name="zipcode"]'),
        onDataFill: function(data){
          console.info('Data Filled', data);
        },
        onLoad: function(){
          console.info('Autocomplete is ready!');
          $('#loader, .demo').toggle();
        }
    });
      
    $('#demo1 [name="district"]').change(function(){
      console.log('ตำบล', this.value);
    });
    $('#demo1 [name="amphoe"]').change(function(){
      console.log('อำเภอ', this.value);
    });
    $('#demo1 [name="province"]').change(function(){
      console.log('จังหวัด', this.value);
    });
    $('#demo1 [name="zipcode"]').change(function(){
      console.log('รหัสไปรษณีย์', this.value);
    });
</script>
<script>
     var checker = document.getElementById('checkme');
 var sendbtn = document.getElementById('sendNewSms');
 // when unchecked or checked, run the function
 checker.onchange = function(){
if(this.checked){
    sendbtn.disabled = false;
} else {
    sendbtn.disabled = true;
}

}
</script>

<script language="javascript">
    //เมื่อมีการคลิกฟังก์ชัน
    $(function (){
     $('.btn_sub').click(function (){
       if($('#txtID').val().trim()==''){
        $('#msg').text('กรุณากรอกเลขประจำตัว');
        $('#txtID').focus();
       }else{
        //checkID($('#txtID').val() จะไปเรียกฟังก์ชัน  checkID(id)
        if(!checkID($('#txtID').val().trim())){
         alert('รหัสประชาชนไม่ถูกต้อง');
         return false;
        }
       }
     });
    });
    
    //ตรวจสอบเลข ปปช ว่ามีจริงหรือไม่
    function checkID(id)
    {
    
    //ตัดข้อความ - ออก
    var zid = id;
    var zids = zid.split("-");
    for(var i=0;i<zids.length;i++){
     zids[i];
    }
    var id_val = zids[0]+zids[1]+zids[2]+zids[3]+zids[4];
    
    if(id_val.length != 13) return false;
    for(i=0, sum=0; i < 12; i++)
    sum += parseFloat(id_val.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id_val.charAt(12)))
    return false; return true;
    }
    
    //ฟังก์ชัน รูปแบบ
    function autoTab(obj){
     /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
     หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
     4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
     รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
     หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
     ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
     */
      var pattern=new String("_-____-_____-_-__"); // กำหนดรูปแบบในนี้
      var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
      var returnText=new String("");
      var obj_l=obj.value.length;
      var obj_l2=obj_l-1;
      for(i=0;i<pattern.length;i++){   
       if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
        returnText+=obj.value+pattern_ex;
        obj.value=returnText;
       }
      }
      if(obj_l>=pattern.length){
       obj.value=obj.value.substr(0,pattern.length);   
      }
    }  
</script>

<script>
    function phoneFormatter() {
        $('input.phone_format').on('input', function() {
            var number = $(this).val().replace(/[^\d]/g, '')
                if (number.length >= 5 && number.length < 10) { number = number.replace(/(\d{3})(\d{2})/, "$1-$2"); } else if (number.length >= 10) {
                    number = number.replace(/(\d{3})(\d{3})(\d{3})/, "$1-$2-$3"); 
                }
            $(this).val(number)
            $('input.phone_format').attr({ maxLength : 12 });    
        });
    };
    $(phoneFormatter);
</script>
</body>

</html>
