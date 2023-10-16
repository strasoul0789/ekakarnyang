@extends("newSystem/frontendMain/layouts/template/template")
<script type="text/javascript" src="{{asset('js/halkaBox.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/halkaBox.min.css')}}">
<script type="text/javascript" src="{{asset('js/image-lightbox.js')}}"></script>
<style>
.gallery {
    border: 2px solid #fff;
    border-radius: 7px;
    margin-top: 10px;
}
.gallery:hover {
    border: 2px solid #2B3282;
    border-radius: 7px;
}
</style>
@section("content")
<br>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div id="single-images" class="gallery">
				<a href="{{asset('/images/gallery/ford/ford-a.jpg')}}" class="singleImage2">
					<picture>
				        <source type="image/webp" srcset="{{ asset('/images/gallery/ford/ford-a.webp')}}" class="img-rounded img-responsive">
				        <source type="image/jpeg" srcset="{{ asset('/images/gallery/ford/ford-a.jpg')}}" class="img-rounded img-responsive">
				        <img src="{{ asset('/images/gallery/ford/ford-a.jpg')}}" class="img-rounded img-responsive">
			    	</picture>
				</a> 
			</div>
		</div>
		<div class="col-md-4">
			<div id="single-images" class="gallery">
				<a href="{{asset('/images/gallery/ford/ford-b.jpg')}}" class="singleImage2">
					<picture>
				        <source type="image/webp" srcset="{{ asset('/images/gallery/ford/ford-b.webp')}}" class="img-rounded img-responsive">
				        <source type="image/jpeg" srcset="{{ asset('/images/gallery/ford/ford-b.jpg')}}" class="img-rounded img-responsive">
				        <img src="{{ asset('/images/gallery/ford/ford-b.jpg')}}" class="img-rounded img-responsive">
			    	</picture>
				</a> 
			</div>
		</div>
		<div class="col-md-4">
			<div id="single-images" class="gallery">
				<a href="{{asset('/images/gallery/ford/ford-c.jpg')}}" class="singleImage2">
					<picture>
				        <source type="image/webp" srcset="{{ asset('/images/gallery/ford/ford-c.webp')}}" class="img-rounded img-responsive">
				        <source type="image/jpeg" srcset="{{ asset('/images/gallery/ford/ford-c.jpg')}}" class="img-rounded img-responsive">
				        <img src="{{ asset('/images/gallery/ford/ford-c.jpg')}}" class="img-rounded img-responsive">
			    	</picture>
				</a> 
			</div>
		</div>
		<div class="col-md-4">
			<div id="single-images" class="gallery">
				<a href="{{asset('/images/gallery/ford/ford-d.jpg')}}" class="singleImage2">
					<picture>
				        <source type="image/webp" srcset="{{ asset('/images/gallery/ford/ford-d.webp')}}" class="img-rounded img-responsive">
				        <source type="image/jpeg" srcset="{{ asset('/images/gallery/ford/ford-d.jpg')}}" class="img-rounded img-responsive">
				        <img src="{{ asset('/images/gallery/ford/ford-d.jpg')}}" class="img-rounded img-responsive">
			    	</picture>
				</a> 
			</div>
		</div>
	</div>
</div>
<br>
@endsection