@extends("newSystem/frontendMain/layouts/template/template")
<link rel="stylesheet" type="text/css" href="{{ asset('/newSystem/frontendMain/css/index.css')}}">
@section("content")
<style>
    .title-bg {
        background-color: #00902b;
        color: #ffffff;
        position: relative;
        display: inline-block;
        line-height: 56px;
        padding-left: 20px;
        padding-right: 20px;
    }

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
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div id="bs4-slide-carousel" class="carousel slide" data-ride="carousel" >
              <div class="carousel-inner"> 
                <div class="carousel-item active">
                    <a href="{{url('/promotion/promotion')}}" target="_blank">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('/images/slideindex/slide-01.webp')}}" class="img-responsive" width="100%"> 
                            <source type="image/jpeg" srcset="{{ asset('/images/slideindex/slide-01.png')}}" class="img-responsive" width="100%">
                            <img src="{{ asset('/images/slideindex/slide-01.png')}}" class="img-responsive" width="100%">
                        </picture>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{url('/promotion/promotion')}}" target="_blank">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('/images/slideindex/slide-02.webp')}}" class="img-responsive" width="100%"> 
                            <source type="image/jpeg" srcset="{{ asset('/images/slideindex/slide-02.png')}}" class="img-responsive" width="100%">
                            <img src="{{ asset('/images/slideindex/slide-02.png')}}" class="img-responsive" width="100%">
                        </picture>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{url('/promotion/promotion')}}" target="_blank">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('/images/slideindex/slide-03.webp')}}" class="img-responsive" width="100%"> 
                            <source type="image/jpeg" srcset="{{ asset('/images/slideindex/slide-03.jpg')}}" class="img-responsive" width="100%">
                            <img src="{{ asset('/images/slideindex/slide-03.jpg')}}" class="img-responsive" width="100%">
                        </picture>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{url('/promotion/promotion')}}" target="_blank">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('/images/slideindex/slide-04.webp')}}" class="img-responsive" width="100%"> 
                            <source type="image/jpeg" srcset="{{ asset('/images/slideindex/slide-04.jpg')}}" class="img-responsive" width="100%">
                            <img src="{{ asset('/images/slideindex/slide-04.jpg')}}" class="img-responsive" width="100%">
                        </picture>
                    </a>
                </div>
              </div>
              <a class="carousel-control-prev" href="#bs4-slide-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#bs4-slide-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>  
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="panel panel-body" style="background-color: #00902B; margin-top:15px; padding-bottom:44px;">
                <center><h1 style="color:#fff !important; text-align:center;" class="kanit">ค้นหายางรถยนต์</h1></center>
                <form id="tyre-form" action="{{url('/tyre-search')}}" method="post" role="form" enctype="multipart/form-data">{{csrf_field()}}
                    <div class="row" style="margin-top: 15px;">
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
                            <button type="submit" style="height: calc(4rem + 2px); color:#00902B !important; background-color:#fff; width:100%; font-size:20px; border-color: #00902B;" class="col-md-12 btn btn-primary kanit">ค้นหา</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="panel panel-body" style="background-color: #00902B; margin-top:15px;">
                <center><h1 style="color:#fff !important; text-align:center;" class="kanit">ค้นหาสาขา</h1></center>
                <form action="{{url('/branch-search')}}" method="post" role="form" enctype="multipart/form-data">{{csrf_field()}}
                    <div style="margin-top: 15px;">
                        <div class="col-md-12 col-lg-12 col-xl-12" style="float: left;">
                            <div class="form-group">
                                 <select name="branch" class="form-control kanit" style="height: calc(4rem + 2px)">
                                    <option>เลือกสาขาที่ใช้บริการ</option>
                                    <option value="bypassPKT">สาขาบายพาสภูเก็ต</option>
                                    <option value="thalangPKT">สาขาถลาง (ทางเข้าสนามบิน)</option>
                                    <option value="chaofahEAST">สาขาเจ้าฟ้าตะวันออก</option>
                                    <option value="thaiwatsaduPKT">สาขาไทวัสดุ (ท่าเรือ)</option>
                                    <option value="khokkloiPHANGNGA">สาขาโคกกลอย</option>
                                    <option value="phangnga">สาขาเมืองพังงา</option>
                                </select>
                            </div>
                            <button type="submit" style="height: calc(4rem + 2px); color:#00902B !important; background-color:#fff; width:100%; font-size:20px; border-color: #00902B;" class="col-md-12 btn btn-primary kanit">ค้นหา</button> 
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 col-lg-12">
            <h1 class="kanit" style="text-align:center; color:#00902b;">บริการของเอกการยาง</h1>
            <center><div style="border-bottom: 5px solid #00902b; width:15rem;"></div></center>
            <div class="row" style="margin-top: 5rem;">
                @foreach ($article_services as $article_service => $value)
                <div class="col-xs-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="card overflow-hidden">
                        <img src="{{url('image_upload/article_service')}}/{{$value->image}}" class="img-fluid" style="width: 350px; height:220px;">
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
            <div style="border-top: 2px solid #00902b; text-align:right;" class="mb-5">
                <a href="{{url('/service-article')}}"><div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:16px; margin-top:10px;">ดูเพิ่มเติม</h1></div></a>
            </div>
        </div>
    </div>

    <div class="text-imgs" style="margin-top: 5rem;">
        <div class="row">
            <div id="promotion1" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong style="font-size: 22px; color: #00902b">ฟรีตรวจเช็คไม่มีเงื่อนไข 30 รายการ</strong>&nbsp<p style="font-size: 14px; color: #00902b">เอกการยาง ใส่ใจมากกว่าที่เห็น เพราะรถทุกคันสำคัญสำหรับเรา</p><br>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <p class="kanit">
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> การสึกหรอของยาง</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ลูกปืนล้อหน้า</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ลูกปืนล้อหลัง</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ระบบแสงสว่างรอบคัน</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ผ้าเบรกหน้า</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ผ้าเบรกหลัง</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> จานเบรกหน้า</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> จานเบรกหลัง+ดั๊มเบรก</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> โช้คอัพหน้า</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> โช้คอัพหลัง</h1>
                        </p>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <p class="kanit">
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ยางหุ้มเพลาขับ</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ยางกันกระแทกคู่หน้า</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ยางกันกระแทกคู่หลัง</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> เพลากลาง จุด 1,2,3</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ระบบบังคับเลี้ยว,ลูกหมาก</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ปีกนกบน</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ปีกนกล่าง</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ใบปัดน้ำฝน</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> แบตเตอรี่และระดับน้ำกลั่น</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> กรองอากาศ</h1>
                        </p>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <p class="kanit">
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> กรองแอร์</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> น้ำมันเครื่อง</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> น้ำมันเกียร์</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> น้ำมันเฟืองท้าย</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> น้ำมันคลัตซ์</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> น้ำมันเบรก</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> น้ำมันพวงมาลัยพาวเวอร์</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> หม้อน้ำ+น้ำยา</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ลมยางอะไหล่</h1>
                        <h1 style="font-size: 16px;"><i class="fa fa-caret-right" style="color:#00902B; font-size:18px;"></i> ตรวจเช็คสภาพภายนอกรอบคัน</h1>
                        </p>
                    </div>
                </div>
            </div>
        </div><br>
    </div>
</div>

<div class="container mt-5">
    <h1 class="kanit" style="text-align:center; color:#00902b;">สินค้าของเอกการยาง</h1>
    <center><div style="border-bottom: 5px solid #00902b; width:15rem;"></div></center>
    <div class="row" style="margin-top: 5rem;">
        @foreach ($article_products as $article_product => $value)
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
    <div style="border-top: 2px solid #00902b; text-align:right;" class="mb-5 mt-5">
        <a href="{{url('/product-article')}}"><div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:16px; margin-top:10px;">ดูเพิ่มเติม</h1></div></a>
    </div>
</div>

{{-- <div class="container" style="margin-top: 5rem;">
    <h1 class="kanit" style="text-align:center; color:#00902b;">รู้จัก ... ไทร์พลัสเอกการยาง</h1>
    <center><div style="border-bottom: 5px solid #00902b; width:15rem;"></div></center>
    <div class="row" style="margin-top: 5rem;">
        <div class="col-md-12">
            <center><iframe width="1000" height="600" class="responsive-iframe" src="https://www.youtube.com/embed/Kwtu33-klkY?autoplay=1&mute=1" title="ศูนย์บริการยางรถยนต์เอกการยาง ภูเก็ต พังงา เปลี่ยนยางรถยนต์" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
        </div>
    </div>
</div> --}}

<div class="container">
    <h1 class="kanit" style="text-align:center; color:#00902b;">โปรโมชั่นยางรถยนต์ ภูเก็ต</h1>
    <center><div style="border-bottom: 5px solid #00902b; width:15rem;"></div></center>
    <div class="kanit" style="margin-top: 5rem;">
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ศูนย์บริการ ไทร์พลัสเอกการยาง ร้านยางรถยนต์ ในพื้นที่จังหวัดภูเก็ต  และพังงา มีความเชี่ยวชาญในการดูแลรถยนต์  และพร้อมให้คำแนะนำกับลูกค้า ไม่ว่าจะเป็นยางรถยนต์ยี่ห้อไหนดี โปรโมชั่นยางรถยนต์ <a href="https://eakkarnyang.com/">เช็คราคายางรถยนต์</a> หรือบริการเกี่ยวกับยานยนต์ต่าง ๆ โปรโมชั่นอื่น ๆ อีกมากมาย ได้ที่ ศูนย์บริการ ไทร์พลัสเอกการยาง ทั้ง 6 สาขา ราคายางรถยนต์มีทุกระดับราคา ตั้งแต่ระดับพรีเมียม ปานกลาง หรือแม้กระทั่ง ยางรถยนต์ราคาถูก ซึ่งเป็นราคามาตรฐานเท่าเทียมกันทุกสาขา ทีมงานช่างระดับมืออาชีพ มีความเชี่ยวชาญ และมีประสบการณ์ในการดูแลรถยนต์ ให้คำแนะนำที่ดีที่สุดเกี่ยวกับยางรถยนต์ การดูแลรักษารถยนต์ และบริการด้านอื่น ๆ เราให้บริการด้วยความจริงใจ ใส่ใจทุกรายละเอียด เพื่อสร้างความมั่นใจให้กับลูกค้าที่เข้ามารับบริการ</p>
        
        <h2 class="mt-5" style="color:#00902b;">โปรโมชั่นยางรถยนต์ 2565</h2>
        <p class="mt-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เปลี่ยนยางรถยนต์ กับ <strong>ไทร์พลัสเอกการยาง ภูเก็ต-พังงา </strong>พบกับ โปรโมชั่นยางรถยนต์ โปรโมชั่นดี ๆ และยางรถยนต์ราคาถูก จะเปลี่ยนยางรถยนต์ทั้งทีต้องมาเปลี่ยนที่เอกการยาง ทางเรามีศูนย์บริการมากถึง 6 สาขา โปรโมชั่นเยอะ ๆ ล้น ๆ ต้องแวะมาที่เอกการยาง ร้านยางรถยนต์ ในจังหวัดภูเก็ต  และพังงา ยางดี ยางใหม่ ราคาถูกกว่านี้ไม่มีอีกแล้ว รับประกันยางที่ดีที่สุดสำหรับคุณ</p><br>

        <h3 class="mt-3"><strong>โปรโมชั่นยางรถยนต์ 3 แถม 1</strong></h3>
        <p class="mt-3">จ่าย 3 เส้น ได้ยางถึง 4 เส้น เมื่อเปลี่ยนยางรถยนต์ ยี่ห้อ Yokohama เฉพาะรุ่น <a href="https://eakkarnyang.com/product-tyre/YOKOHAMA/E70">E70</a> และรุ่น <a href="https://eakkarnyang.com/product-tyre/YOKOHAMA/E75">E75</a>   และเมื่อเปลี่ยนยางรถยนต์ ยี่ห้อ Goodyear ขนาด 185/55R16 รุ่น <a href="https://eakkarnyang.com/product-tyre/GOODYEAR/EXCELLENCE">Excellence</a></p>
        <h3><strong>เงื่อนไขในการใช้บริการ</strong></h3>
        <ul>
            <li><p>โปรโมชั่นยางรถยนต์ 3 แถม 1 ไม่สามารถผ่อน 0% ได้</p></li>
            <li><p>สินค้ามีจำนวนจำกัด กรุณาตรวจสอบสินค้าก่อนเข้ารับบริการ</p></li>
            <li><p>เงื่อนไขเป็นไปตามที่บริษัทกำหนด กรุณาตรวจสอบราคา  และสอบถามรายละเอียดโปรโมชั่นเพิ่มเติม ก่อนเข้ารับบริการ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงเงื่อนไขโดยมิต้องแจ้งให้ทราบล่วงหน้า</p></li>
        </ul><br>
    
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;นอกจากโปรโมชั่นยางรถยนต์ ทางไทร์พลัสเอกการยาง ยังมีโปรโมชั่นอื่น ๆ อีกมากมาย เช่น โปรโมชั่นน้ำมันเครื่อง โปรโมชั่นผ้าเบรก  และโปรโมชั่นส่วนลดค่าอะไหล่ต่าง ๆ สามารถติดตามโปรโมชั่นเพิ่มเติมได้ที่ ไทร์พลัสเอกการยาง ทั้ง 6 สาขา  หรือ  Call Center 076-609-779   หรือจะเป็นหน้าเพจหลัก <a href="https://www.facebook.com/Eakkarnyang/" target="_blank" rel="noopener">Tyreplus เอกการยาง</a>    และยังสามารถแอดไลน์เพื่อสอบถามข้อมูลเพิ่มเติมได้ที่ <a href="https://line.me/ti/p/@eakkarnyang" target="_blank" rel="noopener">@eakkarnyang</a></p><br><br>
    <h2 style="color:#00902b;">โปรโมชั่นสำหรับลูกค้าเอกการยาง</h2>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เอกการยางจัดให้ โปรแรง ๆ โปรโมชั่นพิเศษ สำหรับคุณคนพิเศษ แล้วอย่าลืมเข้ามาใช้บริการที่ ไทร์พลัสเอกการยาง</p>
    <ul>
         <li><p><a href="http://localhost/comma/%e0%b9%80%e0%b8%9b%e0%b8%a5%e0%b8%b5%e0%b9%88%e0%b8%a2%e0%b8%99%e0%b8%99%e0%b9%89%e0%b8%b3%e0%b8%a1%e0%b8%b1%e0%b8%99%e0%b9%80%e0%b8%84%e0%b8%a3%e0%b8%b7%e0%b9%88%e0%b8%ad%e0%b8%87/" target="_blank" rel="noopener">เปลี่ยนน้ำมันเครื่อง</a> ยี่ห้อ BP Visco ยี่ห้อ Castrol   และยี่ห้อ Tyreplus ฟรีค่าแรง   และแหวนรอง ( ใช้น้ำมันเครื่องสด   และใหม่ จากแกลอนเท่านั้น )</li>
         <li><p>เช็คก่อนคุ้มกว่าแน่นอน กับชุดสุขภาพรถยนต์ ลดสูงสุด 20%</p></li>
         <li><p>ผ่อนจ่าย สบายกระเป๋า ผ่อน 0% นานสูงสุด 6 เดือน</p></li>
    </ul><br>
    <h3><strong>เงื่อนไขในการใช้บริการ</strong></h3>
    <ul>
         <li><p>เงื่อนไขเป็นไปตามที่บริษัทกำหนด กรุณาตรวจสอบราคา  และสอบถามรายละเอียดโปรโมชั่นเพิ่มเติม ก่อนเข้ารับบริการ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงเงื่อนไขโดยมิต้องแจ้งให้ทราบล่วงหน้า</p></li>
    </ul>
    &nbsp;
    
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;และทางศูนย์บริการยางรถยนต์ ไทร์พลัสเอกการยาง ยังมีบริการเกี่ยวกับยานยนต์อีกมากมาย  เช่น  บริการติดตั้งยาง ติดตั้งแม็กซ์, บริการตั้งศูนย์ ถ่วงล้อ, บริการดูแลเบรก, บริการดูแลรถยนต์,  บริการดูแลแบตเตอรี่ และมีบริการตรวจเช็คฟรี 30 รายการ โดยไม่มีเงื่อนไข   และยังมีสินค้าอีกหลายอย่างที่นอกเหนือจากยางรถยนต์ เช่น ล้อแม็กซ์, น้ำมันเครื่อง, แบตเตอรี่, ผ้าเบรก, ใบปัดน้ำฝน   และอะไหล่อื่น ๆ สามารถติดต่อสอบถามเพิ่มเติมได้ที่   Call Center 076-609-779   หรือติดต่อสอบถามได้ที่สาขา ทั้ง 6 สาขา</p>
    <ul>
         <li><p>สาขาโคกกลอย เปิดบริการ วันจันทร์ - เสาร์ เวลา 08.00 - 17.00 น.</p></li>
         <li><p>สาขาเมืองพังงา ( ในปั๊มราชพฤกษ์ ) เปิดบริการ วันจันทร์ - อาทิตย์ เวลา 08.30 - 19.00 น. ( เปิดบริการทุกวัน )</p></li>
         <li><p>สาขาถลาง ( ทางเข้าสนามบิน ) เปิดบริการ วันจันทร์ - เสาร์ เวลา 08.30 - 17.30 น.</p></li>
         <li><p>สาขาไทวัสดุ ( ท่าเรือ ) เปิดบริการ วันจันทร์ - อาทิตย์ เวลา 08.30 - 19.00 น. ( เปิดบริการทุกวัน )</p></li>
         <li><p>สาขาบายพาส ( ตรงข้ามปั๊มบางจาก ) เปิดบริการ วันจันทร์ - เสาร์ เวลา 08.30 - 19.00 น.</p></li>
         <li><p>สาขาเจ้าฟ้า ตะวันออก เปิดบริการ วันจันทร์ - เสาร์ เวลา 08.30 - 19.00 น.</p></li>
    </ul>
    </div>
</div>

<div class="container" style="margin-top: 5rem;">
    <h1 class="kanit" style="text-align:center; color:#00902b;">สาระน่ารู้...จากเอกการยาง</h1>
    <center><div style="border-bottom: 5px solid #00902b; width:15rem;"></div></center>
    <div class="row" style="margin-top: 2rem;">
        @foreach ($articles as $article => $value)
        <div class="col-md-4 mt-5">
            <div class="card-article">
                <img src="{{url('image_upload/article')}}/{{$value->image}}" class="img-fluid"  style="width: 350px; height:220px;">
                <h4 class="kanit ellipsis-verti-title">{{$value->title}}</h4>
                <div class="ellipsis-verti">{!! $value->article !!}</div><br>
                <ul class="list-group list-group-flush kanit">
                    <li class="list-group-item text-muted">
                      <a href="{{url('/article/detail')}}/{{$value->id}}"><span class="float-right"><i class="fa fa-hand-o-right mr-1"></i> อ่านเพิ่มเติม</span></a>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
    <div style="border-top: 2px solid #00902b; text-align:right;" class="mb-5 mt-5">
        <a href="{{url('/article')}}"><div class="title-bg"><h1 class="kanit" style="text-align:center; color:#ffffff; font-size:16px; margin-top:10px;">บทความอื่น ๆ</h1></div></a>
    </div>
</div>

<div class="container kanit" style="margin-top: 5rem;">
    <h3 style="text-align: center;">ตารางการรับประกันและเงื่อนไขการรับประกัน</h3><br>
    <center><div style="border-bottom: 3px solid #00902b; width:15rem;"></div></center>

	<div class="row mt-5">
		<table class="table table-bordered success">
			<thead>
				<tr >
					<th class="info">สินค้า/บริการ</th>
					<th class="info">เงื่อนไขการรับประกัน</th>
				</tr>
				<tr>
					<th>เปลี่ยนยางรถยนต์ 4 เส้น</th>
					<td>รับประกัน 30 วันทุกกรณี บาด บวม แตก เคลมยางใหม่ฟรี และรับประกัน 2 ปี หรือ 40,000 กม. จากการใช้งานปกติ เคลมตามเปอร์เซ็นต์การใช้งาน <p style="color: red;">** ขอสงวนสิทธิ์จากการซ่อมแซมยางผิดวิธี เช่น การปะยางโดยใช้ความร้อนสูง หรือการปะยางแบบแทงใยไหม 
                        ยางจะต้องอยู่ในสภาพที่ใส่จากทางร้านเท่านั้น ไม่มีรอยฉีกขาดที่เกิดจากการถอดใส่ และไม่รับประกันจากการตกหลุมหรือยางได้รับการกระแทก</p></td>
				</tr>
				<tr>
					<th>เปลี่ยนยางรถยนต์ 1-3 เส้น</th>  
					<td>รับประกัน 2 ปี หรือ 40,000 กม. จากการใช้งานปกติ เคลมตามเปอร์เซ็นต์การใช้งาน <p style="color: red;">** ขอสงวนสิทธิ์จากการซ่อมแซมยางผิดวิธี เช่น การปะยางโดยใช้ความร้อนสูง หรือการปะยางแบบแทงใยไหม 
                        ยางจะต้องอยู่ในสภาพที่ใส่จากทางร้านเท่านั้น ไม่มีรอยฉีกขาดที่เกิดจากการถอดใส่ และไม่รับประกันจากการตกหลุมหรือยางได้รับการกระแทก</p></td>
				</tr>
                <tr>
					<th>ล้อแม็กซ์</th>  
					<td>รับประกันสี และโครงสร้างจากการผลิตเท่านั้น</td>
				</tr>
                <tr>
					<th>บริการถ่วงล้อ</th>  
					<td>รับประกัน 30 วัน ในกรณียางสั่นที่เกิดจากการถ่วงล้อเท่านั้น บริการถ่วงล้อใหม่ฟรี ( ไม่ครอบคลุมความเสียจากส่วนอื่น )<p style="color: red;">** บริการถ่วงล้อฟรี เมื่อเปลี่ยนยางรถยนต์ 4 เส้น ที่ ไทร์พลัสเอกการยาง ทุกสาขา</p></td>
				</tr>
                <tr>
					<th>บริการตั้งศูนย์</th>  
					<td>รับประกัน 30 วัน ในกรณีศูนย์มีปัญหา พวงมาลัยกินไปข้างใดข้างหนึ่งจากการตั้งศูนย์เท่านั้น บริการตั้งศูนย์ใหม่ฟรี<p style="color: red;">** ในกรณีที่ยางรถยนต์เกิดความเสียหาย จะไม่อยู่ในเงื่อนไขการรับประกัน</p></td>
				</tr>
                <tr>
					<th>เติมลมยางไนโตรเจน</th>  
					<td>ฟรี !! ตลอดอายุการใช้งาน เมื่อเปลี่ยนยางรถยนต์ 4 เส้น ที่ ไทร์พลัสเอกการยาง ทุกสาขา</td>
				</tr>
                <tr>
					<th>ปะยางดอกเห็ด</th>  
					<td>รับประกัน 7 วัน ในกรณีที่ยางรั่วซึมรอยแผลเดิม</td>
				</tr>
                <tr>
					<th>อะไหล่</th>  
					<td>รับประกันอะไหล่ 6 เดือน หรือ 10,000 กม.</td>
				</tr>
			</thead>
		</table>
	</div>
</div>

<script src='https://code.jquery.com/jquery-1.12.4.min.js'></script>
<script>
$(document).ready(function() {
  $("#owl-example").owlCarousel({
      itemsDesktop : [1499,4],
      itemsDesktopSmall : [1199,3],
      itemsTablet : [899,2],
      itemsMobile : [599,1],
      navigation : true,
      navigationText : ['<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-left fa-stack-1x fa-inverse"></i></span>','<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-right fa-stack-1x fa-inverse"></i></span>'],
  });
});

$(document).ready(function() {
  $("#owl-example1").owlCarousel({
      itemsDesktop : [1499,4],
      itemsDesktopSmall : [1199,3],
      itemsTablet : [899,2],
      itemsMobile : [599,1],
      navigation : true,
      navigationText : ['<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-left fa-stack-1x fa-inverse"></i></span>','<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-right fa-stack-1x fa-inverse"></i></span>'],
  });
});
</script>
<script>
    $('#category').on('change',function(e){
    console.log(e);
    var catmax_id = e.target.value;
        //ajax
        $.get('./ajax-maxsubcat?cat_id=' + catmax_id,function(data){
            $('#subcategory').empty();
            $.each(data, function(index, subcatObj){
                $('#subcategory').append('<option value="'+subcatObj.name+'">'+subcatObj.name+'</option>');
            });
        });
        });
</script>

<script>
    $('#width').on('change',function(e){
    console.log(e);
    var width_id = e.target.value;
        //ajax
        $.get('./ajax-width?cat_id=' + width_id,function(data){
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
        $.get('./ajax-ratio?cat_id=' + ratio_id,function(data){
            $('#diameter').empty();
    console.log(data);
            
            $.each(data, function(index, subcatObj){

                $('#diameter').append('<option value="'+subcatObj.diameter+'">'+subcatObj.diameter+'</option>');
            });
        });
        });
</script>
@endsection

