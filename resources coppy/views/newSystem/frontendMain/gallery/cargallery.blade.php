@extends("newSystem/frontendMain/layouts/template/template")
<style>
	.logo{
		margin-top: 10px;
	}
</style>
@section("content")
<br>
<div class="container">
	<div class="row">
		@foreach ($brands as $brand => $value)
			<div class="col-md-3">
				<a href="{{url('/gallery')}}/{{$value->brand}}">
					<img src="{{url('image_upload/image_brand_car')}}/{{$value->image}}" class="logo img-responsive">
				</a>
			</div>
		@endforeach
	</div>
</div>
<br>
@endsection