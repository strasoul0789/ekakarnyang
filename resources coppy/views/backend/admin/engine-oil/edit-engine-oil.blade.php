@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">แก้ไขข้อมูลน้ำมันเครื่อง</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/edit-engine-oil')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">รหัสสินค้า</label>
                                        <input type="text" class="form-control form-control-alternative mitr" name="code" value="{{$engine_oil->code}}" readonly>
                                    </div>
                                </div>
                            </div>
                            @php
                                $carbrand = DB::table('carbrands')->where('id',$engine_oil->brand_id)->value('brand');
                                $carmodel = DB::table('carmodels')->where('id',$engine_oil->model_id)->value('model');
                            @endphp
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ยี่ห้อรถยนต์</label>
                                        <select name="brand_id" id="brand" class="form-control form-control-alternative mitr">
                                                <option value="{{$engine_oil->brand_id}}">{{$carbrand}}</option>
                                            @foreach ($brands as $brand => $value)
                                                <option value="{{$value->id}}">{{$value->brand}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">รุ่นรถยนต์</label>
                                        <select name="model_id" id="model" class="form-control form-control-alternative mitr">
                                            <option value="{{$engine_oil->model_id}}">{{$carmodel}}</option>
                                            <option>รุ่นรถยนต์</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ปีรถ</label>
                                        <input type="text" class="form-control form-control-alternative mitr" name="year" value="{{$engine_oil->year}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ยี่ห้อน้ำมันเครื่อง</label>
                                        <select name="brand" class="form-control form-control-alternative mitr">
                                            <option value="{{$engine_oil->brand}}">{{$engine_oil->brand}}</option>
                                            <option value="Castrol">Castrol</option>
                                            <option value="Bp">Bp</option>
                                            <option value="Tyreplus">Tyreplus</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ขื่อสินค้า</label>
                                        @if ($errors->has('name'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('name') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="name" value="{{$engine_oil->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">สถานะ</label>
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="{{$engine_oil->status}}">{{$engine_oil->status}}</option>
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
                                        <input type="hidden" name="id" value="{{$engine_oil->id}}">
                                        <button type="submit" class="btn btn-primary my-4 mitr">อัพเดตรายการน้ำมันเครื่อง</button>
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
        $.get('.././ajax-carbrand?cat_id=' + brand_id,function(data){
            $('#model').empty();
            $.each(data, function(index, subcatObj){
                $('#model').append('<option value="'+subcatObj.id+'">'+subcatObj.model+'</option>');
            });
        });
        });
</script>
@endsection