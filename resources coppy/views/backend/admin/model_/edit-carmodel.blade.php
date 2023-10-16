@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">แก้ไขรุ่นรถยนต์</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/edit-carmodel')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-lg-3">
                                    @php
                                        $carbrand = DB::table('carbrands')->where('id',$model->brand_id)->value('brand');
                                    @endphp
                                    <div class="form-group">
                                        <label>ยี่ห้อรถยนต์</label>
                                        <select name="brand_id" class="form-control form-control-alternative mitr">
                                                <option value="{{$model->brand_id}}">{{$carbrand}}</option>
                                            @foreach ($brands as $brand => $value)
                                                <option value="{{$value->id}}">{{$value->brand}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>รุ่นรถยนต์</label>
                                        @if ($errors->has('model'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('model') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="รุ่นรถยนต์" name="model" value="{{$model->model}}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>ประเภทรถ</label>
                                        <select name="type_car" class="form-control form-control-alternative mitr">
                                            <option value="{{$model->type_car}}">{{$model->type_car}}</option>
                                            <option value="รถเก๋ง รถสปอร์ต">รถเก๋ง รถสปอร์ต</option>
                                            <option value="รถ SUV รถอเนกประสงค์">รถ SUV รถอเนกประสงค์</option>
                                            <option value="รถกระบะ รถตู้">รถกระบะ รถตู้</option>
                                        </select>
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
                                    <div class="form-group mt--4">
                                        <button type="submit" class="btn btn-primary my-4 mitr">อัพเดตรุ่นรถยนต์</button>
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