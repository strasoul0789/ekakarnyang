@extends("newSystem/frontendMain/layouts/template/template")

@section("content")
<div class="container">
    <div class="row"> 
        @php
            $brand_image = DB::table('carbrands')->where('brand',$brand)->value('image');
        @endphp
        <div class="col-md-12 mt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <picture>
                    <source type="image/jpeg" srcset="{{url('image_upload/image_brand_car')}}/{{$brand_image}}" class="img-responsive">
                    <img src="{{url('image_upload/image_brand_car')}}/{{$brand_image}}" class="img-responsive">
                </picture>
                <a href="#" class="bttn mb-5">
                    {{$model}}
                </a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

@if(count($engine_oils) == 0)
    <center><p style="color: red;">** ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง ทุกสาขา หรือแอดไลน์ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank"><strong>คลิ๊ก</strong></a></p></center>
@else
    <div class="container">  
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <p style="color: red; text-align:right;">**ราคานี้ไม่รวมไส้กรอง <strong>น้ำมันเครื่อง</strong></p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ยี่ห้อสินค้า</th>
                            <th>รายละเอียดสินค้า</th>
                            <th>ราคาน้ำมันเครื่อง</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($engine_oils as $engine_oil => $value)
                            @php
                                $price = DB::table('engine_oil_sale_prices')->where('engine_oil_id',$value->id)->orderBy('id','desc')->value('price');
                                $price_format = number_format($price);
                            @endphp
                            <tr>
                                <td>{{$value->brand}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$price_format}} บาท</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p style="color: #00902b;">* ขอสงวนสิทธิ์ในการเปลี่ยนแปลงโดยไม่ต้องแจ้งให้ทราบล่วงหน้า และกรุณาตรวจสอบเงื่อนไขก่อนรับบริการ</p>
                <h3 style="font-family: 'Kanit' !important; color: #00902b;">เปลี่ยน <strong>น้ำมันเครื่อง</strong> ที่ไทร์พลัสเอกการยาง ทุกสาขา ฟรี!! ค่าแรงและแหวนรอง</h3>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endif
@endsection