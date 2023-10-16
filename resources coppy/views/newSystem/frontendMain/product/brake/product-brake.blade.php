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

<div class="container">  
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ยี่ห้อสินค้า</th>
                        <th>รายละเอียดสินค้า</th>
                        <th>ราคาผ้าเบรก</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brakes as $brake => $value)
                        @php
                            $price = DB::table('brake_sale_prices')->where('brake_id',$value->id)->orderBy('id','desc')->value('price');
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
        </div>
        <div class="col-md-2"></div>
    </div>
  </div>
@endsection