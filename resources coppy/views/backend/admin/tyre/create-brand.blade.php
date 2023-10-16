@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <a href="{{url('/admin/tyre')}}" class="btn btn-success">ค้นหายางตามขนาดยาง</a>
            <a href="{{url('/admin/create-tyre')}}" class="btn btn-success">เพิ่มรายการยางรถยนต์</a>
            <a href="{{url('/admin/tyre-cost-price')}}" class="btn btn-success">จัดการราคาต้นทุน </a>
            <a href="{{url('/admin/tyre-price')}}" class="btn btn-success">จัดการราคาขาย </a>
            <a href="{{url('/admin/create-model')}}" class="btn btn-success">ค้นหารุ่นยางรถยนต์</a>
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
                            <h3 class="mb-0">เพิ่มยี่ห้อยางรถยนต์ ใส่รูปด้วย</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/create-brand')}}" enctype="multipart/form-data" method="post">@csrf
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
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="ยี่ห้อยางรถยนต์" name="brand">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="เปิด">เปิด</option>
                                            <option value="ปิด">ปิด</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>รูปภาพแบรนยางยี่ห้อยาง</label>
                                        @if ($errors->has('image'))
                                            <span class="text-danger" style="font-size: 50px;">{{ $errors->first('image') }}</span>
                                        @endif
                                        <input type="file" class="form-control form-control-alternative mitr" placeholder="รูปภาพแบรนยางรถยนต์" name="image">
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
                            <h3 class="mb-0">ยี่ห้อยางรถยนต์</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{$brands->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>ยี่ห้อยางรถยนต์</th>
                                    <th>Logo image</th>
                                    <th>สถานะ</th>
                                    <th>add just</th>
                                </tr>
                            </thead>
                            @foreach($brands as $brand => $value)
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $brand+1}}</td>
                                    <td>{{$value->brand}}</td>
                                    <td><img src="{{ asset('/image_upload/image_brand_tyre')}}/{{$value->image}}" style="width:50px;"></td>
                                    <td>{{$value->status}}</td>
                                    
                                    <td>
                                        <a href="{{url('/admin/edit-brand')}}/{{$value->id}}">
                                            <i class="ni ni-settings" style="color:blue;"></i>
                                        </a>                  
                                        <a href="{{url('/admin/delete-brand/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
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