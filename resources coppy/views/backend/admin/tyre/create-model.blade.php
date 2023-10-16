@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <a href="{{url('/admin/tyre')}}" class="btn btn-success">ค้นหายางตามขนาดยาง</a>
            <a href="{{url('/admin/create-brand')}}" class="btn btn-success">ยี่ห้อยางรถยนต์</a>
            <a href="{{url('/admin/create-tyre')}}" class="btn btn-success">เพิ่มรายการยางรถยนต์</a>
            <a href="{{url('/admin/tyre-cost-price')}}" class="btn btn-success">จัดการราคาต้นทุน </a>
            <a href="{{url('/admin/tyre-price')}}" class="btn btn-success">จัดการราคาขาย </a>
        </div>
    </div>
</div>  
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">เพิ่มรุ่นยางรถยนต์</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/create-model')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>ยี่ห้อยางรถยนต์</label>
                                        <select name="brand_id" class="form-control form-control-alternative mitr">
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
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="รุ่นยางรถยนต์" name="model">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>ยางรันแฟลต</label>
                                        <select name="runflat" class="form-control form-control-alternative mitr">
                                            <option value="ไม่ใช่">ไม่ใช่</option>
                                            <option value="ใช่">ใช่</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>ประเภทยาง</label>
                                        <select name="type_tyre" class="form-control form-control-alternative mitr">
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
                                            <span class="text-danger" style="font-size: 50px;">{{ $errors->first('image') }}</span>
                                        @endif
                                        <input type="file" class="form-control form-control-alternative mitr" placeholder="รูปภาพยางรถยนต์" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>สถานะ</label>
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="เปิด">เปิด</option>
                                            <option value="ปิด">ปิด</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-primary my-4 mitr">เพิ่มรุ่นยางรถยนต์</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">ค้นหารุ่นยางรถยนต์</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/search-model')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="รุ่นยางรถยนต์" name="model">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mt--4">
                                        <button type="submit" class="btn btn-primary my-4 mitr">ค้นหารุ่นยางรถยนต์</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">รุ่นยางรถยนต์</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{$models->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Brand tyre</th>
                                    <th>ประเภท</th>
                                    <th>ยี่ห้อยางรถยนต์</th>
                                    <th>รุ่นยางรถยนต์</th>
                                    <th>ยางรันแฟลต</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($models as $model => $value)
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $model+1}}</td>
                                    @php
                                        $brand = DB::table('brands')->where('id',$value->brand_id)->value('brand');
                                    @endphp
                                    <td><img src="{{ asset('/image_upload/image_model_tyre')}}/{{$value->image}}" style="width:50px;"></td>
                                    <td>{{$value->type_tyre}}</td>
                                    <td>{{$brand}}</td>
                                    <td>{{$value->model}}</td>
                                    @if($value->runflat == "ใช่")
                                        <td style="color: green;">{{$value->runflat}}</td>
                                    @else 
                                        <td style="color: red;">{{$value->runflat}}</td>
                                    @endif
                                    <td>{{$value->status}}</td>
                                    <td>
                                        <a href="{{url('/admin/edit-model')}}/{{$value->id}}">
                                            <i class="ni ni-settings" style="color:blue;"></i>
                                        </a>                  
                                        <a href="{{url('/admin/delete-model/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
                                            <i class="fa fa-trash" style="color:red;"></i>
                                        </a>
                                        <input type="hidden" name="id" value="{{$value->id}}">
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