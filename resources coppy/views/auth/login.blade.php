@extends("/backend/layouts/template/template-admin-login")

@section('content')
<body class="bg-default">
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8">
            <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <h3 style="text-align: center;">เข้าสู่ระบบแอดมิน</h3><hr>
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form action="{{url('/admin/login')}}" enctype="multipart/form-data" method="post">@csrf
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
                                        <input class="form-control mitr" placeholder="ชื่อเข้าใช้งาน" type="text" name="username" value="{{ old('username') }}">
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
                                    <button type="submit" class="btn btn-primary my-4 mitr">เข้าสู่ระบบแอดมิน</button>
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
