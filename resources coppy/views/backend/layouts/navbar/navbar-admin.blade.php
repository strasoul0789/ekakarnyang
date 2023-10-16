@php
    $categories = DB::table('product_categories')->get();
@endphp
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand"></div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <h3 class="ml-1">Subscription system</h3>
            <ul class="navbar-nav">
                @if(Auth::guard('admin')->user()->role == "ผู้ดูแล")
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-tv-2 text-primary"></i> ลงทะเบียน
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-left">
                        <a href="{{url('/register-admin')}}" class="dropdown-item">
                            <span>ลงทะเบียนแอดมิน (ผู้แก้ไข)</span>
                        </a>
                        <a href="{{url('/admin/register-staff')}}" class="dropdown-item">
                            <span>ลงทะเบียนพนักงานขาย</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-single-copy-04 text-primary"></i> จัดการข้อมูลบทความ
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-left">
                        <a href="{{url('/admin/create-article')}}" class="dropdown-item">
                            <span>เพิ่มบทความทั่วไป</span>
                        </a>
                        <a href="{{url('/admin/create-article-service')}}" class="dropdown-item">
                            <span>เพิ่มบทความบริการ</span>
                        </a>
                        <a href="{{url('/admin/create-article-product')}}" class="dropdown-item">
                            <span>เพิ่มบทความสินค้า</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('/admin/staff-statistic')}}">
                        <i class="ni ni-bullet-list-67 text-primary"></i> ข้อมูลการใช้เว็บไซต์
                    </a>
                </li>
                @endif
                @if(Auth::guard('admin')->user()->role == "ผู้ดูแล")
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-delivery-fast text-primary"></i> ข้อมูลรถ
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-left">
                        <a href="{{url('/admin/create-carbrand')}}" class="dropdown-item">
                            <span>ข้อมูลยี่ห้อรถยนต์</span>
                        </a>
                        <a href="{{url('/admin/create-carmodel')}}" class="dropdown-item">
                            <span>ข้อมูลรุ่นรถยนต์</span>
                        </a>
                    </div>
                </li>
                
                @endif
                <div class="dropdown-divider"></div>
                <h3 class="ml-4">ข้อมูลการจอง</h3>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('/admin/booking-covid-19')}}">
                        <i class="ni ni-active-40 text-primary"></i> ข้อมูลการลงทะเบียนจองยาง
                    </a>
                </li>
                
               
                
                <div class="dropdown-divider"></div>
                <h3 class="ml-4">จัดการระบบแก้ไขหน้าบ้าน    </h3>
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-archive-2 text-primary"></i> จัดการหมวดหมู่สินค้า
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-left">
                        <a href="{{url('/admin/create-category')}}" class="dropdown-item">
                            <span>สร้างหมวดหมู่สินค้า</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-chart-pie-35 text-primary"></i> จัดการข้อมูลสินค้า
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-left">
                        @foreach ($categories as $category => $value)
                                <a href="{{url('/admin/manage')}}/{{$value->name_eng}}" class="dropdown-item">
                                    <span>{{$value->name}}</span>
                                </a>
                        @endforeach
                    </div>
                </li>
                
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-circle-08 text-red"></i> ออกจากระบบ
                    </a>
                    <form id="logout-form" action="{{ 'App\Admin' == Auth::getProvider()->getModel() ? route('admin.logout') : route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>