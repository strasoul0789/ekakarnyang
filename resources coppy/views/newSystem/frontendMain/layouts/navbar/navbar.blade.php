@php
    $product_categories = DB::table('product_categories')->where('status','เปิด')->get();
    $service_categories = DB::table('service_categories')->where('status','เปิด')->get();
@endphp
<header class="header-area">
    <div class="banner">
        <nav class="navbar navbar-expand-md navbar-dark"> 
            <div class="container">
                <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="menu-icon-bar"></span>
                    <span class="menu-icon-bar"></span>
                    <span class="menu-icon-bar"></span>
                </button>	
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto w-100 kanit">
                        <li><a href="{{url('/')}}" class="nav-item nav-link active" style="padding: 23px 25px;">หน้าแรก</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-item nav-link" data-toggle="dropdown" style="padding: 23px 25px;">สินค้า</a> 
                            <div class="dropdown-menu w-20">
                                @foreach ($product_categories as $product_category => $value)
                                    <a href="{{url('/products')}}/{{$value->name_eng}}" class="dropdown-item">{{$value->name}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-item nav-link" data-toggle="dropdown" style="padding: 23px 25px;">บริการ</a>
                            <div class="dropdown-menu w-2">
                                @foreach ($service_categories as $service_category => $value)
                                    @php
                                        $article_id = DB::table('article_services')->where('service',$value->name)->value('id');
                                    @endphp
                                    <a href="{{url('/service-article/detail')}}/{{$article_id}}" class="dropdown-item">{{$value->name}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li><a href="{{url('/promotion/promotion')}}" class="nav-item nav-link" style="padding: 23px 25px;">โปรโมชั่นและสิทธิพิเศษ</a></li>
                        <li><a href="{{url('/aboutus')}}" class="nav-item nav-link" style="padding: 23px 25px;">ไทร์พลัสเอกการยาง</a></li>
                        <li><a href="{{url('/article')}}" class="nav-item nav-link" style="padding: 23px 25px;">สาระน่ารู้</a></li>
                        <li><a href="{{url('https://www.mycare-smartchoice.com')}}" class="nav-item nav-link" target="_blank" style="padding: 23px 25px;">MY CARE</a></li>
                        {{-- <li><a href="{{url('/contact')}}" class="nav-item nav-link" style="padding: 23px 25px;">ข้อเสนอแนะ</a></li> --}}
                        <li><a href="https://line.me/R/ti/p/%40eakkarnyang" target="_blank" class="nav-item nav-link" style="padding: 23px 25px;">ติดต่อเรา</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>