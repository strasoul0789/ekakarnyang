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
.card-article {
    width: 330px;
    height: 100%;
    border-radius: 8px;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    position: relative;
    top: 0;
    transition: all 0.25s;
}
.card-article:nth-child(2) {
    margin: 0 50px;
}
.card-article:hover {
    top: -15px;
    box-shadow: 0 12px 16px rgba(0, 0, 0, 0.2);
}
.card-article h4 {
    font-weight: 600;
    text-align: center;
    margin-top: 20px;
    font-size: 18px;
    margin-bottom: 10px;
    color: #008d2b;
}
.card-article p {
    padding: 0 1.5rem;
    font-size: 15px;
    font-weight: 300;
}
.card-article a {
    font-weight: 500;
    text-decoration: none;
    color: #007bff;
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
        <div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:22px; margin-top:10px;">สาระน่ารู้ ... จากเอกการยาง</h1></div>
    </div>
    <div class="row">
        @foreach ($articles as $article => $value)
        <div class="col-md-4 mt-5">
            <div class="card-article">
                <img src="{{url('image_upload/article')}}/{{$value->image}}" class="img-fluid">
                <article><h4 class="kanit ellipsis-verti-title">{{$value->title}}</h4>
                <div class="ellipsis-verti">{!! $value->article !!}</div><br></article>
                <ul class="list-group list-group-flush kanit">
                    <li class="list-group-item text-muted">
                      <a href="{{url('/article/detail')}}/{{$value->id}}"><span class="float-right"><i class="fa fa-hand-o-right mr-1"></i> อ่านเพิ่มเติม</span></a>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
    {{$articles->links()}}
</div>
@endsection