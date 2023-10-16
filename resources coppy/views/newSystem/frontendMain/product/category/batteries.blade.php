@extends("newSystem/frontendMain/layouts/template/template")
<script type="text/javascript" src="{{asset('js/halkaBox.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/halkaBox.min.css')}}">
<script type="text/javascript" src="{{asset('js/image-lightbox.js')}}"></script>
<style>
    .card {
        display: block; 
        margin-bottom: 20px;
        line-height: 1.42857143;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
        transition: box-shadow .25s; 
    }
    .card:hover {
      box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    }
    .img-card {
      width: 100%;
      /* height:200px; */
      border-top-left-radius:2px;
      border-top-right-radius:2px;
      display:block;
        overflow: hidden;
    }
    .img-card img{
      width: 100%;
      /* height: 200px; */
      /* object-fit:cover;  */
      transition: all .25s ease;
    } 
    .card-content {
      padding:15px;
      text-align:left;
    }
    .card-content a {
        text-decoration: none !important;
    }
    .card-read-more {
      border-top: 1px solid #D4D4D4;
    }
    .card-read-more a {
      text-decoration: none !important;
    }
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
    <div style="border-bottom: 3px solid #00902b;" class="mb-5">
      <div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">แบตเตอรี่รถยนต์</h1></div>
    </div>
    <p style="color: #ff0000; text-align:right;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
    <div class="row">
        @foreach ($batterys as $battery => $value)
        <div class="col-md-4">
            <div class="card mt-5">
                <a class="img-card">
                    <img src="{{url('image_upload/image_product_battery')}}/{{$value->image}}"/>
                </a>
                <div class="card-content">
                    <h4 class="card-title kanit">
                        <a href="#">{{$value->subcategory}}</a>
                    </h4>
                    <div class="ellipsis-verti kanit">{{$value->detail}}</div>
                </div>
                <div class="card-read-more" style="text-align: right;">
                    <a href="" class="btn btn-link kanit"><h3>ราคา {{$value->price}} บาท</h3></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection