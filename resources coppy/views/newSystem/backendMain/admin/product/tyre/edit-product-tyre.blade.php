@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">แก้ไขสินค้า เทส</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/edit-product-tyre')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ยี่ห้อสินค้า</label>
                                        <select name="subcategory_id" class="form-control form-control-alternative mitr">
                                            @php
                                                $brand = DB::table('product_brands')->where('id',$tyre->subcategory_id)->value('brand');
                                            @endphp
                                            <option value="{{$tyre->subcategory_id}}">{{$brand}}</option>
                                            @foreach ($brand_tyres as $brand_tyre => $value)
                                                <option value="{{$value->id}}">{{$value->brand}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>รุ่นสินค้า</label>
                                        <select name="model_id" class="form-control form-control-alternative mitr">
                                            @php
                                                $model = DB::table('product_models')->where('id',$tyre->model_id)->value('model');
                                            @endphp
                                            <option value="{{$tyre->model_id}}">{{$model}}</option>
                                            @foreach ($model_tyres as $model_tyre => $value)
                                                <option value="{{$value->id}}">{{$value->model}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ความกว้าง</label>
                                        @if ($errors->has('width'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('width') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="width" value="{{$tyre->width}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>อัตราส่วน</label>
                                        @if ($errors->has('ratio'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('ratio') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="ratio" value="{{$tyre->ratio}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>เส้นผ่านศูนย์กลาง</label>
                                        @if ($errors->has('diameter'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('diameter') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="diameter" value="{{$tyre->diameter}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ราคาขาย</label>
                                        @if ($errors->has('price'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('price') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="price" value="{{$tyre->price}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ราคาทุน</label>
                                        @if ($errors->has('cost_prices'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('cost_prices') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="cost_prices" value="{{$tyre->cost_prices}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>รูปภาพสินค้า</label>
                                        @if ($errors->has('image'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('image') }}</span>
                                        @endif
                                        <input type="file" class="form-control form-control-alternative mitr" placeholder="รูปภาพสินค้า" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>สถานะ</label>
                                        <input type="text" class="form-control form-control-alternative mitr" name="status" value="เปิด">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mt-2">
                                        <input type="hidden" name="tyre_id" value="{{$tyre->tyre_id}}">
                                        <button type="submit" class="btn btn-primary my-4 mitr">แก้ไขสินค้า</button>
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