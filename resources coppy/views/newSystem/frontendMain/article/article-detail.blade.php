@extends("newSystem/frontendMain/layouts/template/template")

@section("content")
<div class="container mt-5">
    <center><h1>{{$article->title}}</h1></center>
	<div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	        <div class="">
	            <div class="image">
	            	<picture>
                        <img src="{{url('image_upload/article')}}/{{$article->image}}" class="img-responsive">
                    </picture>
	            </div>
	        </div>
	    </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
    </div>
	<div class="row mt-5">
	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	        <div class="blog-details">
	            {!!$article->article!!}
	        </div>
	    </div>
	</div>
</div> 
@endsection