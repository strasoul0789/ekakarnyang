@extends("newSystem/frontendMain/layouts/template/template")

@section("content")
<div class="container">
    <div class="row"> 
        @php
            $brand_image = DB::table('carbrands')->where('brand',$carbrand)->value('image');
        @endphp
        <div class="col-md-12 mt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <picture>
                    <source type="image/jpeg" srcset="{{url('image_upload/image_brand_car')}}/{{$brand_image}}" class="img-responsive">
                    <img src="{{url('image_upload/image_brand_car')}}/{{$brand_image}}" class="img-responsive">
                </picture>
                <a href="#" class="bttn mb-5">
                    โช้ค {{$brand}}
                </a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

@if(count($shocks) == 0)
    <center><p style="color: red;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง ทุกสาขา หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p></center>
@else
    <div class="container">  
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <p style="color: red; text-align:right;">**ราคานี้ไม่รวมค่าติดตั้ง</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>รุ่นรถยนต์</th>
                            <th>ราคาคู่หน้า / ราคาคู่หลัง</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shocks as $shock => $value)
                            <tr>
                                <td>{{$value->carmodel}}</td>
                                <td>{{$value->price}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p style="color: #00902b;">* ขอสงวนสิทธิ์ในการเปลี่ยนแปลงโดยไม่ต้องแจ้งให้ทราบล่วงหน้า และกรุณาตรวจสอบเงื่อนไขก่อนรับบริการ</p>
                <p style="color: red;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง ทุกสาขา หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endif
@endsection