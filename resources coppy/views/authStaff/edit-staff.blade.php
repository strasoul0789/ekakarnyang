@extends("/backend/layouts/template/template-admin")

@section('content')
<div class="container mt-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-7">
        <h2 style="text-align: center;">แก้ไขข้อมูลพนักงานขาย</h2><hr>
        <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
            <form action="{{url('admin/edit-staff')}}" enctype="multipart/form-data" method="post">@csrf
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
                <div class="form-group mb-3">
                @if ($errors->has('name'))
                    <span class="text-danger" style="font-size: 16px;">({{ $errors->first('name') }})</span>
                @endif
                <label>ชื่อผู้ใช้</label>
                <div class="input-group input-group-alternative">
                    <input class="form-control mitr" placeholder="ชื่อ" type="text" name="name" value="{{$staff->name}}">
                </div>
                </div>
                <div class="form-group">
                <label>{{ __('บทบาท') }}</label>
                <select name="role" class="form-control mitr">
                    <option value="{{$staff->role}}">{{$staff->role}}</option>
                    <option value="ผู้ดูแล">ผู้ดูแล</option>
                    <option value="ผู้แก้ไข">ผู้แก้ไข</option>
                </select>
                </div>  
                <div class="form-group">
                <label>{{ __('สถานะ') }}</label>
                <select name="status" class="form-control mitr">
                    <option value="{{$staff->status}}">{{$staff->status}}</option>
                    <option value="เปิด">เปิด</option>
                    <option value="ปิด">ปิด</option>
                </select>
                </div>
                <div class="form-group">
                @if ($errors->has('username'))
                    <span class="text-danger" style="font-size: 16px;">({{ $errors->first('username') }})</span>    
                @endif
                <label>ชื่อเข้าใช้งาน</label>
                <div class="input-group input-group-alternative">
                    <input class="form-control mitr" placeholder="ชื่อเข้าใช้งาน" type="text" name="username" value="{{$staff->username}}">
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
                    <input type="hidden" name="id" value="{{$staff->id}}">
                    <button type="submit" class="btn btn-primary my-4 mitr">อัพเดตข้อมูลพนักงานขาย</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
