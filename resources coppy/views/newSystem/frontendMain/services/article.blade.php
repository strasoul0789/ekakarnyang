@extends("newSystem/frontendMain/layouts/template/template")
<style>
.ellipsis-verti{
    display:block;
    width:100%;
    text-overflow:ellipsis;
    overflow:hidden;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    height: 110px;
}
.card {
  display: block; 
  margin-bottom: 20px;
  line-height: 1.42857143;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
  transition: box-shadow .25s; 
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
  overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 200px;
  object-fit:cover; 
  transition: all .25s ease;
} 
.card-content {
  padding:15px;
  text-align:left;
}

.title-bg {
  background-color: #00902b;
  color: #ffffff;
  position: relative;
  display: inline-block;
  line-height: 56px;
  padding-left: 20px;
  padding-right: 20px;
}
</style>
@section("content")
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 col-lg-12">
          <div style="border-bottom: 1px solid #00902b;" class="mb-5">
            <div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">บริการของเอกการยาง</h1></div>
          </div>
          <div class="row" style="margin-top: 5rem;">
              @foreach ($article_services as $article_service => $value)
              <div class="col-xs-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                  <div class="card overflow-hidden">
                      <img src="{{url('image_upload/article_service')}}/{{$value->image}}" class="img-fluid">
                      <div class="card-body">
                          <h5 class="card-title mt-3">
                              <h2>{{$value->service}}</h2>
                              <div class="ellipsis-verti">{!!$value->article!!}</div>
                          </h5>
                      </div>
                      <ul class="list-group list-group-flush kanit">
                          <li class="list-group-item text-muted">
                            <a href="{{url('/service-article/detail')}}/{{$value->id}}"><span class="float-right"><i class="fa fa-hand-o-right mr-1"></i> อ่านต่อ</span></a>
                          </li>
                      </ul>
                  </div>
              </div>
              @endforeach
            </div><br>
        </div>
    </div>
</div>
@endsection