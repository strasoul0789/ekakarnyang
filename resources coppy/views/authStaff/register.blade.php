@extends("/backend/layouts/template/template-admin")

@section('content')
<div class="container mt-5 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-7">
      <h2 style="text-align: center;">ลงทะเบียนพนักงานขาย</h2><hr>
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          <form action="{{url('/admin/register-staff')}}" enctype="multipart/form-data" method="post">@csrf
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
                  <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
              @endif
            @endforeach
            <div class="form-group mb-3">
              @if ($errors->has('name'))
                <span class="text-danger" style="font-size: 16px;">({{ $errors->first('name') }})</span>
              @endif
              <div class="input-group input-group-alternative">
                <input class="form-control mitr" placeholder="ชื่อ" type="text" name="name">
              </div>
            </div>
            <div class="form-group mb-3">
              @if ($errors->has('branch'))
                <span class="text-danger" style="font-size: 16px;">({{ $errors->first('branch') }})</span>
              @endif
              <div class="input-group input-group-alternative">
                <input class="form-control mitr" placeholder="สาขา" type="text" name="branch">
              </div>
            </div>
            <div class="form-group">
              <label>{{ __('บทบาท') }}</label>
              <select name="role" class="form-control mitr">
                  <option value="พนักงานขาย">พนักงานขาย</option>
              </select>
            </div>  
            <div class="form-group">
              <label>{{ __('สถานะ') }}</label>
              <select name="status" class="form-control mitr">
                <option value="เปิด">เปิด</option>
                <option value="ปิด">ปิด</option>
              </select>
            </div>
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
            <div class="form-group">
              @if ($errors->has('password_confirmation'))
                <span class="text-danger" style="font-size: 16px;">({{ $errors->first('password_confirmation') }})</span>
              @endif
              <div class="input-group input-group-alternative">
                <input placeholder="ยืนยันรหัสผ่าน" type="password" class="form-control mitr" name="password_confirmation">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4 mitr">ลงทะเบียนพนักงานขาย</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-7 mt-5">
      <h2 style="text-align: center;">ข้อมูลพนักงานขาย</h2><hr>
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>สถานะ</th>
                        <th>ชื่อเข้าใช้งาน</th>
                        <th>สถานะ</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($staffs as $staff => $value)
                <tbody>
                    <tr>
                        <td>{{$NUM_PAGE*($page-1) + $staff+1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->role}}</td>
                        <td>{{$value->username}}</td>
                        <td>{{$value->status}}</td>
                        <td>
                            <a href="{{url('/admin/edit-staff')}}/{{$value->id}}">
                                <i class="ni ni-settings" style="color:blue;"></i>
                            </a>                  
                            <a href="{{url('/admin/delete-staff/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
                                <i class="fa fa-trash" style="color:red;"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
