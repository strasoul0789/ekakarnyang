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

.ellipsis-verti-title{
    display:block;
    width:100%;
    text-overflow:ellipsis;
    overflow:hidden;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
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
  /* height:200px; */
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  /* height: 200px; */
  object-fit:cover; 
  transition: all .25s ease;
} 
.card-content {
  padding:15px;
  text-align:left;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}
.card-read-more a {
  text-decoration: none !important;
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
<div class="container mt-5">
  <div style="border-bottom: 1px solid #00902b;" class="mb-5">
    <div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">สินค้าของเอกการยาง</h1></div>
  </div>
    <div class="row" style="margin-top: 5rem;">
        @foreach ($articles as $article => $value)
        <div class="col-md-4">
            <div class="card">
                <a class="img-card">
                    <img src="{{url('image_upload/article_product')}}/{{$value->image}}" />
                </a>
                <div class="card-content">
                    <h4 class="card-title kanit">
                        <a href="">{{$value->title}}</a>
                    </h4>
                    <div class="ellipsis-verti kanit">{!! $value->article !!}</div>
                </div>
                <div class="card-read-more">
                    <a href="{{url('/product-article/detail')}}/{{$value->id}}" class="btn btn-link btn-block kanit"><h3>ดูข้อมูลเพิ่มเติม</h3></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection