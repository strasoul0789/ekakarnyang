@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">แก้ไขข้อมูลยางรถยนต์</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/edit-tyre')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">รหัสสินค้า</label>
                                        <input type="text" class="form-control form-control-alternative mitr" name="code" value="{{$tyre->code}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ยี่ห้อยางรถยนต์</label>
                                        <select name="brand_id" id="brand" class="form-control form-control-alternative mitr">
                                            @php
                                                $brand = DB::table('brands')->where('id',$tyre->brand_id)->value('brand');
                                                $model = DB::table('models')->where('id',$tyre->model_id)->value('model');
                                            @endphp
                                            <option value="{{$tyre->brand_id}}">{{$brand}}</option>
                                            @foreach ($brands as $brand => $value)
                                                <option value="{{$value->id}}">{{$value->brand}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">รุ่นยางรถยนต์</label>
                                        <select name="model_id" id="model" class="form-control form-control-alternative mitr">
                                            <option value="{{$tyre->model_id}}">{{$model}}</option>
                                            <option>รุ่นยางรถยนต์</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ความกว้าง</label>
                                        @if ($errors->has('width'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('width') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="กรุณากรอกความกว้าง" name="width" value="{{$tyre->width}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">อัตราส่วน</label>
                                        @if ($errors->has('width'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('ratio') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="กรุณากรอกอัตราส่วน" name="ratio" value="{{$tyre->ratio}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">เส้นผ่านศูนย์กลาง</label>
                                        @if ($errors->has('width'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('diameter') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="กรุณากรอกเส้นผ่านศูนย์กลาง" name="diameter" value="{{$tyre->diameter}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">หมายเหตุ (ถ้ามี)</label>
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="หมายเหตุ (ถ้ามี)" name="comment" value="{{$tyre->comment}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">สถานะ</label>
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="{{$tyre->status}}">{{$tyre->status}}</option>
                                            <option value="เปิด">เปิด</option>
                                            <option value="ปิด">ปิด</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mt--4">
                                        <input type="hidden" name="admin_id" value="{{Auth::guard('admin')->id()}}">
                                        <input type="hidden" name="id" value="{{$tyre->id}}">
                                        <button type="submit" class="btn btn-primary my-4 mitr">อัพเดตข้อมูลยางรถยนต์</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('#brand').on('change',function(e){
    console.log(e);
    var brand_id = e.target.value;
        //ajax
        $.get('.././ajax-brand?cat_id=' + brand_id,function(data){
            $('#model').empty();
            $.each(data, function(index, subcatObj){
                $('#model').append('<option value="'+subcatObj.id+'">'+subcatObj.model+'</option>');
            });
        });
        });
</script>
@endsection