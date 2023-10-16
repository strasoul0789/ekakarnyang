@extends("/backend/layouts/template/template-admin")

@section("content")

<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">แก้ไขรุ่นยางรถยนต์ นะคะ</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/edit-model')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-lg-3">
                                    @php
                                        $brand_ = DB::table('brands')->where('id',$model->brand_id)->value('brand');
                                    @endphp
                                    <div class="form-group">
                                        <label>ยี่ห้อยางรถยนต์</label>
                                        <select name="brand_id" class="form-control form-control-alternative mitr">
                                                <option value="{{$model->brand_id}}">{{$brand_}}</option>
                                            @foreach ($brands as $brand => $value)
                                                <option value="{{$value->id}}">{{$value->brand}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>รุ่นยางรถยนต์</label>
                                        @if ($errors->has('model'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('model') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="รุ่นยางรถยนต์" name="model" value="{{$model->model}}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>ยางรันแฟลต </label>
                                        <select name="runflat" class="form-control form-control-alternative mitr">
                                            <option value="{{$model->runflat}}">{{$model->runflat}}</option>
                                            <option value="ไม่ใช่">ไม่ใช่</option>
                                            <option value="ใช่">ใช่</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>ประเภทยาง</label>
                                        <select name="type_tyre" class="form-control form-control-alternative mitr">
                                            <option value="{{$model->type_tyre}}">{{$model->type_tyre}}</option>
                                            <option value="ยางรถเก๋ง รถสปอร์ต">ยางรถเก๋ง รถสปอร์ต</option>
                                            <option value="ยาง SUV รถอเนกประสงค์">ยาง SUV รถอเนกประสงค์</option>
                                            <option value="ยางรถกระบะ รถตู้">ยางรถกระบะ รถตู้</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>รูปภาพยางรถยนต์</label>
                                        @if ($errors->has('image'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('image') }}</span>
                                        @endif
                                        <input type="file" class="form-control form-control-alternative mitr" placeholder="รูปภาพยางรถยนต์" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>สถานะ</label>
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="{{$model->status}}">{{$model->status}}</option>
                                            <option value="เปิด">เปิด</option>
                                            <option value="ปิด">ปิด</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-primary my-4 mitr">อัพเดตรุ่นยางรถยนต์</button>
                                        <input type="hidden" name="id" value="{{$model->id}}">
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