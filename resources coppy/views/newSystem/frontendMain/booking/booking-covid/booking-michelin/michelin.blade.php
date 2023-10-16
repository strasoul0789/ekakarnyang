@extends("newSystem/frontendMain/layouts/template/template-booking")
<link rel="stylesheet" type="text/css" href="{{ asset('css/new-template/index.css')}}">
<style>
	@media (max-width: 991px) {
		.img-design {
		width: 100%;
		}
  	}
	a .ahover{
		  color: #0413a9 !important;
	  }
	a .ahover:hover {
		color: red !important;
	}
	hr {
		margin-top: 0rem !important;
	}
</style>
@section("content")

<div class="container">
	<!-- OTANI -->
	<br><center>	
	<picture>
		<source type="image/webp" srcset="{{ asset('/images/tyres/model_michelin.webp')}}" height="10%;">
		<source type="image/jpeg" srcset="{{ asset('/images/tyres/model_michelin.jpg')}}" height="10%;">
		<img src="{{ asset('/images/tyres/model_michelin.jpg')}}" height="10%;">
	</picture>
	</center>
	<br><p style="color:red;line-height: 30px !important;font-size:16px !important;">** ขอสงวนสิทธิ์เฉพาะรถป้ายเขียว-ป้ายเหลืองเท่านั้น รถส่วนบุคคลไม่สามารถใช้สิทธิ์นี้ได้</p>  
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div style="text-align:center;">
						<h2 class="bttn" style="color:#00902b;">MICHELIN AGILIS 3</h2>
					</div><br>
					<div class="row mb-5">
						<div class="col-md-12 col-12">
							<center><img class="img-design" src="{{ asset('/images/tyres/michelin/agilis.jpg')}}" width="100%;"></center>
						</div><br>
					</div>
					
					@foreach($agiliss as $agilis => $value)
					<a href="{{url('/booking-michelin')}}/{{$value->model_id}}/{{$value->width}}/{{$value->ratio}}{{$value->diameter}}/{{$value->price}}" style="color:#000;">
						<div class="row">
							<div class="col-md-5 col-5">
								<h3 class="ahover">{{$value->width}}/{{$value->ratio}}{{$value->diameter}}</h3>
							</div> 
							<div class="col-md-5 col-5">
								<h3 class="ahover" style="font-weight:bold; text-align:right;">{{$value->price}}</h3>
							</div>
							<i class="fa fa-hand-o-left" style="color:#0413a9;"></i>
						</div><hr>
					</a>
					@endforeach
				</div>
			</div><br>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div style="text-align:center;">
						<h2 class="bttn" style="color:#00902b;">MICHELIN ENERGY XM2+</h2>
					</div><br>
					<div class="row mb-5">
						<div class="col-md-12 col-12">
							<center><img class="img-design" src="{{ asset('/images/tyres/michelin/xm2+.jpg')}}" width="100%;"></center>
						</div><br>
					</div>
					
					@foreach($xm2s as $xm2 => $value)
					<a href="{{url('/booking-michelin')}}/{{$value->model_id}}/{{$value->width}}/{{$value->ratio}}{{$value->diameter}}/{{$value->price}}" style="color:#000;">
						<div class="row">
							<div class="col-md-5 col-5">
								<h3 class="ahover">{{$value->width}}/{{$value->ratio}}{{$value->diameter}}</h3>
							</div>
							<div class="col-md-5 col-5">
								<h3 class="ahover" style="font-weight:bold; text-align:right;">{{$value->price}}</h3>
							</div>
							<i class="fa fa-hand-o-left" style="color:#0413a9;"></i>
						</div><hr>
					</a>
					@endforeach
				</div>
			</div><br>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div style="text-align:center;">
						<h2 class="bttn" style="color:#00902b;">MICHELIN PRIMACY 4</h2>
					</div><br>
					<div class="row mb-5">
						<div class="col-md-12 col-12">
							<center><img class="img-design" src="{{ asset('/images/tyres/michelin/primacy4.jpg')}}" width="100%;"></center>
						</div><br>
					</div>

					@foreach($primacy4s as $primacy4 => $value)
					<a href="{{url('/booking-michelin')}}/{{$value->model_id}}/{{$value->width}}/{{$value->ratio}}{{$value->diameter}}/{{$value->price}}" style="color:#000;">
						<div class="row">
							<div class="col-md-5 col-5">
								<h3 class="ahover">{{$value->width}}/{{$value->ratio}}{{$value->diameter}}</h3>
							</div>
							<div class="col-md-5 col-5">
								<h3 class="ahover" style="font-weight:bold; text-align:right;">{{$value->price}}</h3>
							</div>
							<i class="fa fa-hand-o-left" style="color:#0413a9;"></i>
						</div><hr>
					</a>
					@endforeach
				</div>
			</div><br>
		</div>
	</div>
    
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div style="text-align:center;">
						<h2 class="bttn" style="color:#00902b;">MICHELIN PILOT SPORT 4</h2>
					</div><br>
					<div class="row mb-5">
						<div class="col-md-12 col-12">
							<center><img class="img-design" src="{{ asset('/images/tyres/michelin/pilotsport4.jpg')}}" width="100%;"></center>
						</div><br>
					</div>
					
					@foreach($pilotsport4s as $pilotsport4 => $value)
					<a href="{{url('/booking-michelin')}}/{{$value->model_id}}/{{$value->width}}/{{$value->ratio}}{{$value->diameter}}/{{$value->price}}" style="color:#000;">
						<div class="row">
							<div class="col-md-5 col-5">
								<h3 class="ahover">{{$value->width}}/{{$value->ratio}}{{$value->diameter}}</h3>
							</div>
							<div class="col-md-5 col-5">
								<h3 class="ahover" style="font-weight:bold; text-align:right;">{{$value->price}}</h3>
							</div>
							<i class="fa fa-hand-o-left" style="color:#0413a9;"></i>
						</div><hr>
					</a>
					@endforeach
				</div>
			</div><br>
		</div>
	</div>
</div>
@endsection