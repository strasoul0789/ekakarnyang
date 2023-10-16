{{-- <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
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

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="{{url('/staff/data-tyre')}}">
                        <i class="ni ni-world text-primary"></i> ยางรถยนต์
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('/staff/data-engine-oil')}}">
                        <i class="ni ni-compass-04 text-primary"></i> น้ำมันเครื่อง
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('/staff/data-brake')}}">
                        <i class="ni ni-bag-17 text-primary"></i> ผ้าเบรก
                    </a>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-circle-08 text-red"></i> ออกจากระบบ
                    </a>
                    <form id="logout-form" action="{{ 'App\Staff' == Auth::getProvider()->getModel() ? route('staff.logout') : route('staff.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}
<style>
    .navbar .navbar-nav .nav-link {
        color: #ffffff;
        font-size: 1.1em;
    }
    .navbar .navbar-nav .nav-link:hover{
        color: #00ff62;
    }
    .navbar-logo-centered .navbar-nav .nav-link{
        padding: .5em 1em;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #00902b;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbarToggler7"
        aria-controls="myNavbarToggler7" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbarToggler7">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/staff/data-tyre')}}">ยางรถยนต์</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/staff/data-engine-oil')}}">น้ำมันเครื่อง</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/staff/data-brake')}}">ผ้าเบรก</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{url('/staff/booking-covid-19')}}">ข้อมูลการลงทะเบียนจองยาง</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{url('/staff/angpao')}}">ข้อมูลการกดรับคูปองอั่งเปา</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                <form id="logout-form" action="{{ 'App\Staff' == Auth::getProvider()->getModel() ? route('staff.logout') : route('staff.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>