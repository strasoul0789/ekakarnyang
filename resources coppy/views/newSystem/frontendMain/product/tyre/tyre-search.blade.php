@extends("newSystem/frontendMain/layouts/template/template")
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{{asset('js/halkaBox.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/halkaBox.min.css')}}">
<script type="text/javascript" src="{{asset('js/image-lightbox.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style-search.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/new-template/card-product.css')}}">
<style>
	@media only screen and (max-width: 768px) {
		#mobile {
		display: inline !important;
		}
		#desktop {
		display: none;
		}
	}
</style>
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="panel panel-body" style="background-color: #00902B; margin-top:15px;">
                <form id="tyre-form" action="{{url('/tyre-search')}}" method="post" role="form" enctype="multipart/form-data">{{csrf_field()}}
					<div class="row">
                        <div class="col-md-4 col-lg-4 col-xl-4"></div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <h1 style="color:#fff !important; text-align:center;" class="kanit">ค้นหายางรถยนต์</h1>   
                            </div><br>
                        </div>
						<div class="col-md-4 col-lg-4 col-xl-4"></div>
					</div>
					<div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <select class="form-control kanit" id="width" name="width" style="height: calc(4rem + 2px)">
                                    <option>ความกว้าง</option>
                                    @foreach($widths as $width)
                                    <option value="{{$width->id}}">{{$width->width}}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
						<div class="col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <select class="form-control kanit" id="ratio" name="ratio" style="height: calc(4rem + 2px)">
                                    <option>อัตราส่วน</option>
                                </select>
							</div>
						</div>
						<div class="col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <select class="form-control kanit" id="diameter" name="diameter" style="height: calc(4rem + 2px)">
                                    <option>เส้นผ่านศูนย์กลาง</option>
                                </select>
							</div>
						</div>
						<div class="col-md-3 col-lg-3 col-xl-3">
                            <button type="submit" style="height: calc(4rem + 2px); color:#005cbf !important; background-color:#fff; width:100%; font-size:20px;" class="col-md-12 btn btn-primary kanit">ค้นหา</button>
                        </div>
						<div class="col-md-3 col-lg-3 col-xl-3" style="margin-top: 5px;">
                            <a id="btn" data-url="{{url('/tyre-search')}}/{{$width_search}}-{{$ratio_search}}-{{$diameter}}" href="#" style="height: calc(4rem + 2px); color:#005cbf !important; background-color:#fff; width:100%; font-size:20px;" class="col-md-12 btn btn-primary kanit">COPY LINK</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
	<h1 class="kanit" style="text-align:center; color:#00902b;">ยางรถยนต์ขนาด {{$width_search}}/{{$ratio_search}} {{$diameter}}</h1>
	<main class="col-md-12">
		@if(count($tyres)==0)
			สอบถามข้อมูลเพิ่มเติมได้ที่ศูนย์บริการเอกการยางทุกสาขาใกล้บ้านคุณ
		@else
		@foreach($tyres as $tyre => $value)
		@php
			$subcategory = DB::table('product_brands')->where('id',$value->subcategory_id)->value('brand');
			$model = DB::table('product_models')->where('id',$value->model_id)->value('model');
		@endphp
		<div class="card">
			@if($subcategory == 'MICHELIN')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_michelin.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_michelin.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'BF Goodrich')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_BF.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_BF.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'OTANI')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_otani.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_otani.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'YOKOHAMA ')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_yokohama.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_yokohama.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'MAXXIS')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_maxxis.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_maxxis.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'RAIDEN')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_raiden.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_raiden.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'TOYO')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_toyo.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_toyo.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'NITTO')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_nitto.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_nitto.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'GOODYEAR')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_goodyear.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_goodyear.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'BRIDGESTONE')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_bridgestone.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_bridgestone.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'KENDA')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_kenda.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_kenda.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'YOKOHAMA')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_yokohama.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_yokohama.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'BRIDGSTONE')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_bridgestone.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_bridgestone.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'KUMHO')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/model_kumho.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;"	>
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/model_kumho.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'DUNLOP')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/dunlop.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;"	>
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/dunlop.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'ATLANDER')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/atlander.jpg')}}" class="img-responsive" width="15%" style="margin-left: 10px;"	>
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/atlander.jpg')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@elseif($subcategory == 'LINGLONG')
			<div class="card__title" id="desktop">
				<img src="{{ asset('/images/tyres/linglong.png')}}" class="img-responsive" width="15%" style="margin-left: 10px;"	>
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3>{{$model}}</h3>
			</div>
			<div class="card__title" id="mobile" style="display: none;">
				<img src="{{ asset('/images/tyres/linglong.png')}}" class="img-responsive" width="50%">
				<div class="icon">
				<a href="#"></a>
				</div>
				<h3 style="margin-left: 10px;">{{$model}}</h3>
			</div>
			@endif
			<div class="row card__body">
				<div class="col-md-3 col-12">
					<div class="image">
						<a href="{{url('products')}}/{{$value->image}}" class="singleImage2">
							<img src="{{url('products')}}/{{$value->image}}" class="img-responsive" width="100%">
						</a>
					</div>
				</div>
					@php
						$drive_id = DB::table('product_models')->where('model','TA Drive')->value('id');
						$suv_id = DB::table('product_models')->where('model','TA SUV')->value('id');
						$ko_id = DB::table('product_models')->where('model','All-Terrain KO2')->value('id');
						$touring_id = DB::table('product_models')->where('model','ADVANTAGE TOURING')->value('id');
						$trail_terrain_id = DB::table('product_models')->where('model','TRAIL TERRAIN')->value('id');
						$e70_id = DB::table('product_models')->where('model','E70')->value('id');
						$e75_id = DB::table('product_models')->where('model','E75')->value('id');
						$e100_id = DB::table('product_models')->where('model','E100')->value('id');
						$cross_terrain_id = DB::table('product_models')->where('model','CROSS TERRAIN')->value('id');
						$excellence_id = DB::table('product_models')->where('model','EXCELLENCE')->value('id');
						$agilis3_id = DB::table('product_models')->where('model','AGILIS 3')->value('id');
						$xm2plus_id = DB::table('product_models')->where('model','ENERGY XM2+')->value('id');
						$pilot3_id = DB::table('product_models')->where('model','PILOT SPORT 3')->value('id');
						$pilot4_id = DB::table('product_models')->where('model','PILOT SPORT 4')->value('id');
						$primacy4_id = DB::table('product_models')->where('model','PRIMACY 4')->value('id');
						$primacy_suv_id = DB::table('product_models')->where('model','PRIMACY SUV')->value('id');
						$ltx_force_id = DB::table('product_models')->where('model','LTX FORCE')->value('id');
						$ltx_trail_id = DB::table('product_models')->where('model','LTX TRAIL')->value('id');
						$xcd_id = DB::table('product_models')->where('model','XCD2')->value('id');
						$km3_id = DB::table('product_models')->where('model','MUD TERRAIN KM3')->value('id');
						$trail_id = DB::table('product_models')->where('model','TRAIL TERRAIN')->value('id');
						$ko2_id = DB::table('product_models')->where('model','All-Terrain KO2')->value('id');
						$ek1000_id = DB::table('product_models')->where('model','EK1000')->value('id');
						$kc2000_id = DB::table('product_models')->where('model','KC2000')->value('id');
						$sa1000_id = DB::table('product_models')->where('model','SA1000')->value('id');
						$sa2000_id = DB::table('product_models')->where('model','SA2000')->value('id');
						$tr1_id = DB::table('product_models')->where('model','PROXES TR1')->value('id');

						$toyo_id = DB::table('product_brands')->where('brand','TOYO')->value('id');
						$nitto_id = DB::table('product_brands')->where('brand','NITTO')->value('id');
						$bridgstone_id = DB::table('product_brands')->where('brand','BRIDGSTONE')->value('id');
						$otani_id = DB::table('product_brands')->where('brand','OTANI')->value('id');
						$michelin_id = DB::table('product_brands')->where('brand','MICHELIN')->value('id');
						$bf_id = DB::table('product_brands')->where('brand','BF Goodrich')->value('id');
						$atlander_id = DB::table('product_brands')->where('brand','ATLANDER')->value('id');
					@endphp
				{{-- ช่องที่ 2 --}}
				<div class="col-md-4 col-12 featured_text">
					<p class="sub">ขนาดยาง : {{$value->width}}/{{$value->ratio}} {{$value->diameter}}</p>

					@if($value->width == '225' && $value->ratio == '75' && $value->diameter == 'R15'  && $value->model_id == $xcd_id)
						<p class="price" style="color:red;">ราคาพิเศษ เส้นละ : 5,250.-</p>
						<p style="font-size: 20px;">จากราคาปกติ เส้นละ <del>5,650.-</del></p>
						<p style="color:red;">* รับชำระเป็นเงินสดเท่านั้น ไม่สามารถเข้าร่วมโปรโมชั่นส่งเสริมการขาย และไม่สามารถผ่อน 0% ได้</p><br>
					@elseif($value->width == '225' && $value->ratio == '75' && $value->diameter == 'R14'  && $value->model_id == $xcd_id)
						<p class="price" style="color:red;">ราคาพิเศษ เส้นละ : 4,750.-</p>
						<p style="font-size: 20px;">จากราคาปกติ เส้นละ <del>4,990.-</del></p>
						<p style="color:red;">* รับชำระเป็นเงินสดเท่านั้น ไม่สามารถเข้าร่วมโปรโมชั่นส่งเสริมการขาย และไม่สามารถผ่อน 0% ได้</p><br>
					@else
						<p class="price">ราคาต่อเส้น : {{$value->price}}.-</p>
					@endif
					<p style="color:red;">ราคาพร้อมเปลี่ยนใส่ ถ่วงล้อ จุ๊บลม และลมไนโตรเจน</p>
					<h2>ราคาถึงวันที่ 30 กันยายน 2566</h2>
					@if($value->model_id == $drive_id || $value->model_id == $suv_id)
					@elseif($value->width == '185' && $value->ratio == '60' && $value->diameter == 'R15'  && $value->model_id == $e70_id)
					@elseif($value->width == '205' && $value->ratio == '55' && $value->diameter == 'R16'  && $value->model_id == $e70_id)
					@elseif($value->width == '215' && $value->ratio == '60' && $value->diameter == 'R16'  && $value->model_id == $e75_id)
					@elseif($value->width == '215' && $value->ratio == '55' && $value->diameter == 'R17'  && $value->model_id == $e70_id)
					@elseif($value->width == '265' && $value->ratio == '65' && $value->diameter == 'R17'  && $value->model_id == $cross_terrain_id)
					@elseif($value->width == '185' && $value->ratio == '55' && $value->diameter == 'R16'  && $value->model_id == $excellence_id)
					@elseif($value->subcategory_id == $toyo_id || $value->subcategory_id == $nitto_id || $value->subcategory_id == $bridgstone_id)
					<p style="color:red;">* สินค้าพรีออเดอร์ กรุณาตรวจเช็คสินค้า ณ จุดขาย ก่อนรับบริการ</p>
					@endif
				</div>
				{{-- ช่องที่ 3 --}}
				<div class="col-md-5 col-12 featured_text">
					@if($value->model_id == $e70_id)
						@if($value->width == '185' && $value->ratio == '60' && $value->diameter == 'R15')
							<picture>
								<source type="image/webp" srcset="{{ asset('/images/hotprice/3free1.webp')}}" class="img-responsive" height="10%;" width="20%">
								<source type="image/jpeg" srcset="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" height="10%;" width="20%">
								<center><img src="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" width="100%"></center>
							</picture>
						@elseif($value->width == '205' && $value->ratio == '55' && $value->diameter == 'R16')
							<picture>
								<source type="image/webp" srcset="{{ asset('/images/hotprice/3free1.webp')}}" class="img-responsive" height="10%;" width="20%">
								<source type="image/jpeg" srcset="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" height="10%;" width="20%">
								<center><img src="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" width="100%"></center>
							</picture>
						@elseif($value->width == '215' && $value->ratio == '55' && $value->diameter == 'R17')
							<picture>
								<source type="image/webp" srcset="{{ asset('/images/hotprice/3free1.webp')}}" class="img-responsive" height="10%;" width="20%">
								<source type="image/jpeg" srcset="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" height="10%;" width="20%">
								<center><img src="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" width="100%"></center>
							</picture>
						@endif
					@elseif($value->model_id == $e75_id)
						@if($value->width == '215' && $value->ratio == '60' && $value->diameter == 'R16')
							<picture>
								<source type="image/webp" srcset="{{ asset('/images/hotprice/3free1.webp')}}" class="img-responsive" height="10%;" width="20%">
								<source type="image/jpeg" srcset="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" height="10%;" width="20%">
								<center><img src="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" width="100%"></center>
							</picture>
						@endif
					@elseif($value->model_id == $excellence_id)
						@if($value->width == '185' && $value->ratio == '55' && $value->diameter == 'R16')
							<picture>
								<source type="image/webp" srcset="{{ asset('/images/hotprice/3free1.webp')}}" class="img-responsive" height="10%;" width="20%">
								<source type="image/jpeg" srcset="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" height="10%;" width="20%">
								<center><img src="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" width="100%"></center>
							</picture>
						@endif
					@elseif($value->subcategory_id == $atlander_id)
						<picture>
							<source type="image/webp" srcset="{{ asset('/images/hotprice/3free1.webp')}}" class="img-responsive" height="10%;" width="20%">
							<source type="image/jpeg" srcset="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" height="10%;" width="20%">
							<center><img src="{{ asset('/images/hotprice/3free1.png')}}" class="img-responsive" width="100%"></center>
						</picture>
					@elseif($value->subcategory_id == $michelin_id)
						<picture>
							<source type="image/webp" srcset="{{ asset('/images/hotprice/ฟรีล้างแอร์.webp')}}" class="img-responsive" height="10%;" width="20%">
							<source type="image/jpeg" srcset="{{ asset('/images/hotprice/ฟรีล้างแอร์.png')}}" class="img-responsive" height="10%;" width="20%">
							<center><img src="{{ asset('/images/hotprice/ฟรีล้างแอร์.png')}}" class="img-responsive" width="100%"></center>
						</picture>
					@elseif($value->model_id == $touring_id)
						@if($value->diameter == 'R18' || $value->diameter == 'R19' || $value->diameter == 'R20' || $value->diameter == 'R21' || $value->diameter == 'R22')
							<picture>
								<source type="image/webp" srcset="{{ asset('/images/hotprice/hotprice2000.webp')}}" class="img-responsive" height="10%;" width="20%">
								<source type="image/jpeg" srcset="{{ asset('/images/hotprice/hotprice2000.png')}}" class="img-responsive" height="10%;" width="20%">
								<center><img src="{{ asset('/images/hotprice/hotprice2000.png')}}" class="img-responsive" width="100%"></center>
							</picture>
							<center><h1 style="color: red;">หรือ</h1></center>
							<picture>
								<source type="image/webp" srcset="{{ asset('/images/hotprice/ฟรีล้างแอร์.webp')}}" class="img-responsive" height="10%;" width="20%">
								<source type="image/jpeg" srcset="{{ asset('/images/hotprice/ฟรีล้างแอร์.png')}}" class="img-responsive" height="10%;" width="20%">
								<center><img src="{{ asset('/images/hotprice/ฟรีล้างแอร์.png')}}" class="img-responsive" width="100%"></center>
							</picture>
						@elseif($value->diameter == 'R13' || $value->diameter == 'R14' || $value->diameter == 'R15' || $value->diameter == 'R16' || $value->diameter == 'R17')
							<picture>
								<source type="image/webp" srcset="{{ asset('/images/hotprice/hotprice1000.webp')}}" class="img-responsive" height="10%;" width="20%">
								<source type="image/jpeg" srcset="{{ asset('/images/hotprice/hotprice1000.png')}}" class="img-responsive" height="10%;" width="20%">
								<center><img src="{{ asset('/images/hotprice/hotprice1000.png')}}" class="img-responsive" width="100%"></center>
							</picture>
							<center><h1 style="color: red;">หรือ</h1></center>
							<picture>
								<source type="image/webp" srcset="{{ asset('/images/hotprice/ฟรีล้างแอร์.webp')}}" class="img-responsive" height="10%;" width="20%">
								<source type="image/jpeg" srcset="{{ asset('/images/hotprice/ฟรีล้างแอร์.png')}}" class="img-responsive" height="10%;" width="20%">
								<center><img src="{{ asset('/images/hotprice/ฟรีล้างแอร์.png')}}" class="img-responsive" width="100%"></center>
							</picture>
						@endif
					@elseif($value->subcategory_id == $otani_id)
					<picture>
						<source type="image/webp" srcset="{{ asset('/images/hotprice/hotprice10.webp')}}" class="img-responsive" height="10%;" width="20%">
						<source type="image/jpeg" srcset="{{ asset('/images/hotprice/hotprice10.jpg')}}" class="img-responsive" height="10%;" width="20%">
						<center><img src="{{ asset('/images/hotprice/hotprice10.jpg')}}" class="img-responsive" width="100%"></center>
					</picture>
					<center><h1 style="color: red;">หรือ</h1></center>
					<picture>
						<source type="image/webp" srcset="{{ asset('/images/hotprice/ฟรีล้างแอร์.webp')}}" class="img-responsive" height="10%;" width="20%">
						<source type="image/jpeg" srcset="{{ asset('/images/hotprice/ฟรีล้างแอร์.png')}}" class="img-responsive" height="10%;" width="20%">
						<center><img src="{{ asset('/images/hotprice/ฟรีล้างแอร์.png')}}" class="img-responsive" width="100%"></center>
					</picture>
					@endif
				</div>
			</div>
		</div><br>
		@endforeach
		@endif
	</main>
</div>


<!-- Script Search Size Tyre -->
<script src="{{ asset('/js/app.js') }}"></script>

<script>
    $('#width').on('change',function(e){
    console.log(e);
    var width_id = e.target.value;
        //ajax
        $.get('../ajax-width?cat_id=' + width_id,function(data){
            $('#ratio').empty();
            $.each(data, function(index, subcatObj){
                $('#ratio').append('<option value="'+subcatObj.id+'">'+subcatObj.ratio+'</option>');
            });
        });
        });
</script>

<script>
    $('#ratio').on('change',function(e){
    console.log(e);
    var ratio_id = e.target.value;
        //ajax
        $.get('../ajax-ratio?cat_id=' + ratio_id,function(data){
            $('#diameter').empty();
        console.log(data);
            $.each(data, function(index, subcatObj){
                $('#diameter').append('<option value="'+subcatObj.diameter+'">'+subcatObj.diameter+'</option>');
            });
        });
        });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		var $temp = $("<input>");
		var $url = $('#btn').attr('data-url');
		$('#btn').click(function() {
			$("body").append($temp);
			$temp.val($url).select();
			document.execCommand("copy");
			$temp.remove();
		});
	});
</script>
@endsection