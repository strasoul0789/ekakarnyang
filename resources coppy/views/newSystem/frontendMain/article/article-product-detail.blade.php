@extends("newSystem/frontendMain/layouts/template/template")

@section("content")
<div class="container mt-5">
    <center><h1>{{$article->title}}</h1></center>
	<div class="row mt-5">
	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	        <div class="blog-details kanit">
	            {!!$article->article!!}
	        </div>
	    </div>
	</div>
</div> 
@endsection