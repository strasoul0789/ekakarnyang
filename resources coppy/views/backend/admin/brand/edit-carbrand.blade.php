@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">แก้ไขยี่ห้อรถยนต์</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/edit-carbrand')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        @if ($errors->has('brand'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('brand') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="ยี่ห้อรถยนต์" name="brand" value="{{$brand->brand}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        @if ($errors->has('image'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('image') }}</span>
                                        @endif
                                        <input type="file" class="form-control form-control-alternative mitr" placeholder="รูปภาพยี่ห้อรถยนต์" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="{{$brand->status}}">{{$brand->status}}</option>
                                            <option value="เปิด">เปิด</option>
                                            <option value="ปิด">ปิด</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mt--4">
                                        <button type="submit" class="btn btn-primary my-4 mitr">อัพเดตยี่ห้อรถยนต์</button>
                                        <input type="hidden" name="id" value="{{$brand->id}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection