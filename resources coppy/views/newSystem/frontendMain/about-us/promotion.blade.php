@extends("newSystem/frontendMain/layouts/template/template")
<title>เอกการยาง โปรโมชั่น</title>
<style>
    @import 'https://fonts.googleapis.com/css?family=Kanit:700';
    
     a.bttn {
         color: #00902B;
         text-decoration: none !important;
         -webkit-transition: 0.3s all ease;
         transition: 0.3s ease all;
    }
     a.bttn:hover {
         color: #fff;
    }
     a.bttn:focus {
         color: #fff;
    }
     .bttn {
         font-size: 20px;
         font-family: 'Kanit';
         /* letter-spacing: 1px; */
         text-transform: uppercase;
         display: inline-block;
         text-align: center;
         width: 100%;
         font-weight: bold;
         padding: 10px 0px;
         border: 3px solid #00902B;
         border-radius: 2px;
         position: relative;
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.1);
         margin-bottom: 10px;
    }
     .bttn:before {
         -webkit-transition: 0.5s all ease;
         transition: 0.5s all ease;
         position: absolute;
         top: 0;
         left: 50%;
         right: 50%;
         bottom: 0;
         opacity: 0;
         content: '';
         background-color: #00902B;
         z-index: -2;
    }
     .bttn:hover:before {
         -webkit-transition: 0.5s all ease;
         transition: 0.5s all ease;
         left: 0;
         right: 0;
         opacity: 1;
    }
     .bttn:focus:before {
         transition: 0.5s all ease;
         left: 0;
         right: 0;
         opacity: 1;
    }
    </style>
@section("content")
<br>
<div class="container">
	{{-- <div class="col-xs-12"> --}}
    <h1 class="kanit" style="text-align:center; color:#00902b;">ข่าวสารและโปรโมชั่น</h1>
        {{-- <div class="panel"> --}}
            {{-- <div class="panel-body"> --}}
                <div class="row mt-5">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <p style="font-size: 17px;">TYREPLUS iCare คือ โปรแกรมดูแลสมาชิกของศูนย์บริการไทร์พลัสที่จะได้รับสิทธิประโยชน์ต่าง ๆ จากศูนย์บริการไทร์พลัสทั่วประเทศไทย แบ่งเป็น 3 ประเภท คือ</p>
                                <p>- <a href="https://www.tyreplus.co.th/th/icare" target="_blank">ไอแคร์ (iCare)</a>  : เมื่อเปลี่ยนยางมิชลิน หรือ บีเอฟกู๊ดริช รุ่นใดก็ได้ 4 เส้น พร้อมแอดไลน์ <a href="line.me/R/ti/p/@tyreplus?from=page">@tyreplus</a> และลงทะเบียน</p>
                                <p>- <a href="https://www.tyreplus.co.th/th/icare-plus" target="_blank">ไอแคร์ พลัส (iCare Plus)</a>  : เมื่อเปลี่ยนยางมิชลิน หรือ บีเอฟกู๊ดริช รุ่นใดก็ได้ 4 เส้น และซื้อแพคเกจประกันยางเพิ่ม มูลค่า 250 บาท ณ วันที่เปลี่ยนยางใหม่ พร้อมแอดไลน์ <a href="line.me/R/ti/p/@tyreplus?from=page">@tyreplus</a> และลงทะเบียน</p>
                                <p>- <a href="https://www.tyreplus.co.th/th/icare-ultra-plus" target="_blank">ไอแคร์ อัลตร้า พลัส (iCare Ultra Plus)</a>  : เมื่อเปลี่ยนยางมิชลิน หรือ บีเอฟกู๊ดริช รุ่นใดก็ได้ 4 เส้น และซื้อแพคเกจประกันยางเพิ่ม มูลค่า 450 บาท ณ วันที่เปลี่ยนยางใหม่ พร้อมแอดไลน์ <a href="line.me/R/ti/p/@tyreplus?from=page">@tyreplus</a> และลงทะเบียน</p>
                                <img src="{{ asset('/images/icare.png')}}" class="img-responsive" width="100%">
                                <p style="color: red; text-align:center;">ขอขอบคุณข้อมูลรูปจากเว็บไซต์ <a href="line.me/R/ti/p/@tyreplus?from=page">www.tyreplus.co.th</a></p>
                                <p>- <a href="https://www.tyreplus.co.th/th/icare-rhz" target="_blank">Road Hazard Warranty</a> การประกันความเสียหายของยางจากสภาพถนน อาทิ บาด บวม เบียด แตก ตำ</p>
                                <p>- <a href="https://www.tyreplus.co.th/th/icare-rsa" target="_blank">Roadside Assistance</a> การรับบริการช่วยเหลือเมื่อรถเกิดเหตุฉุกเฉินตลอด 24 ชั่วโมง นาน 2 ปี</p>
                                <p>- <a href="#">Data Tracking</a> การเช็กข้อมูลประวัติการเข้ารับบริการย้อนหลังโดยสามารถตรวจเช็คและประมาณกำหนดการเข้ารับบริการครั้งต่อไป</p>
                                <p>- <a href="#">ผ่อนสบาย 0%</a> การผ่อนชำระค่าสินค้า ดอกเบี้ย 0% สำหรับสินค้าที่ร่วมรายการตลอดอายุสมาชิก</p>
                                <p>- <a href="https://www.tyreplus.co.th/th/nitrogen" target="_blank">Nitrogen Inflation</a> การรับบริการเติมลมไนโตรเจนฟรี สำหรับสมาชิก ไอแคร์ 1 ครั้งต่อเดือน</p>
                                <p>- <a href="https://www.tyreplus.co.th/th/tyreplus-exclusive" target="_blank">TYREPLUS Exclusive</a> สิทธิพิเศษจากไทร์พลัส สำหรับสมาชิกไอแคร์โดยเฉพาะ เช่น บริการหลังการขาย, ส่วนลดพิเศษ ฯลฯ</p>
                                <p style="color: red; text-align:center;">ขอขอบคุณข้อมูลจากเว็บไซต์ <a href="line.me/R/ti/p/@tyreplus?from=page">www.tyreplus.co.th</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('/images/slideindex/slide-01.webp')}}" class="img-responsive" width="100%"> 
                            <source type="image/jpeg" srcset="{{ asset('/images/slideindex/slide-01.png')}}" class="img-responsive" width="100%">
                            <img src="{{ asset('/images/slideindex/slide-01.png')}}" class="img-responsive" width="100%">
                        </picture>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('/images/slideindex/slide-02.webp')}}" class="img-responsive" width="100%"> 
                            <source type="image/jpeg" srcset="{{ asset('/images/slideindex/slide-02.png')}}" class="img-responsive" width="100%">
                            <img src="{{ asset('/images/slideindex/slide-02.png')}}" class="img-responsive" width="100%">
                        </picture>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('/images/slideindex/slide-03.webp')}}" class="img-responsive" width="100%"> 
                            <source type="image/jpeg" srcset="{{ asset('/images/slideindex/slide-03.jpg')}}" class="img-responsive" width="100%">
                            <img src="{{ asset('/images/slideindex/slide-03.jpg')}}" class="img-responsive" width="100%">
                        </picture>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('/images/slideindex/slide-04.webp')}}" class="img-responsive" width="100%"> 
                            <source type="image/jpeg" srcset="{{ asset('/images/slideindex/slide-04.jpg')}}" class="img-responsive" width="100%">
                            <img src="{{ asset('/images/slideindex/slide-04.jpg')}}" class="img-responsive" width="100%">
                        </picture>
                    </div>
                </div>
                
            {{-- </div> --}}
        {{-- </div> --}}
    {{-- </div> --}}
</div>
@endsection
