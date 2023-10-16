@extends("newSystem/frontendMain/layouts/template/template")

@section("content")
<div class="container mt-5">
	<div class="card">
		<div class="card-body">
			<center><h1 class="mt-5 mb-5">{{$service->title}}</h1></center>
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<div class="">
						<div class="image">
							<picture>
								<img src="{{url('image_upload/article_service')}}/{{$service->image}}" class="img-responsive">
							</picture>
						</div>
					</div>
				</div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
			</div>
			<div class="row mt-5">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="blog-details">
						{!!$service->article!!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
@endsection