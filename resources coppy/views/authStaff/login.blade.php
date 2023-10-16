@extends("/backend/layouts/template/template-staff-login")

@section('content')
<body class="bg-default">
    <div class="main-content">
        <!-- Page content -->
        <div class="container mt-8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <h1 style="text-align: center; color: #ffffff; font-weight:bold;">ศูนย์บริการยางรถยนต์ ไทร์พลัส เอกการยาง</h1>
                    <h2 style="text-align: center; color: #ffffff;">เข้าสู่ระบบพนักงานขาย</h2>
                    <div class="card bg-secondary shadow border-0 mt-5">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form action="{{url('/staff/login')}}" enctype="multipart/form-data" method="post">@csrf
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                                <div class="form-group">
                                    @if ($errors->has('username'))
                                        <span class="text-danger" style="font-size: 16px;">({{ $errors->first('username') }})</span>
                                    @endif
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control mitr" placeholder="ชื่อเข้าใช้งาน" type="text" name="username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('password'))
                                        <span class="text-danger" style="font-size: 16px;">({{ $errors->first('password') }})</span>
                                    @endif
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control mitr" placeholder="รหัสผ่าน" type="password" name="password">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success my-4 mitr">เข้าสู่ระบบพนักงานขาย</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
