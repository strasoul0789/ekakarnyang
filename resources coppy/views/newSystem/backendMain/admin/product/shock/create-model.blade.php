@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">สร้างรุ่นสินค้า</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/create-model-shock')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <h3>ยี่ห้อสินค้า</h3>
                                        <select name="brand_id" class="form-control form-control-alternative mitr">
                                            @foreach ($brand_shocks as $brand_shock => $value)
                                                <option value="{{$value->id}}">{{$value->brand}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>รุ่นสินค้า</label>
                                        @if ($errors->has('model'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('model') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="รุ่นสินค้า" name="model">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>รูปภาพรุ่นสินค้า</label>
                                        @if ($errors->has('image'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('image') }}</span>
                                        @endif
                                        <input type="file" class="form-control form-control-alternative mitr" placeholder="รูปภาพรุ่นสินค้า" name="image">
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
                                <div class="col-lg-4">
                                    <div class="form-group mt--4">
                                        @php
                                            $category_id = DB::table('product_categories')->where('name',"โช้ค")->value('id');
                                        @endphp
                                        <input type="hidden" name="category_id" value="{{$category_id}}">
                                        <button type="submit" class="btn btn-primary my-4 mitr">สร้างรุ่นสินค้า</button>
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
                            <h3 class="mb-0">รุ่นสินค้า</h3>
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
                                    <th>ยี่ห้อสินค้า</th>
                                    <th>รุ่นสินค้า</th>
                                    <th>รูปภาพ</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($models as $model => $value)
                            @php
                                $brand = DB::table('shockbrands')->where('id',$value->brand_id)->value('brand');
                            @endphp
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $model+1}}</td>
                                    <td>{{$brand}}</td>
                                    <td>{{$value->model}}</td>
                                    <td>
                                        <img src="{{url('image_upload/image_model_shock')}}/{{$value->image}}" class="img-responsive" width="100px;">
                                    </td>
                                    <td>{{$value->status}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#EditModel{{$value->id}}">
                                            <i class="fas fa-edit" style="color:blue;"></i>
                                        </a>                  
                                        <a href="{{url('/admin/delete-model-shock/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
                                            <i class="fa fa-trash" style="color:red;"></i>
                                        </a>
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                    </td>
                                </tr>
                            </tbody>
                            <!-- Modal -->
                            <div class="modal fade" id="EditModel{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขรุ่นสินค้า</h5>
                                        </div>
                                        <form action="{{url('/admin/edit-model-shock')}}" enctype="multipart/form-data" method="post">@csrf
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>รุ่นสินค้า</label>
                                                            @if ($errors->has('model'))
                                                                <span class="text-danger" style="font-size: 16px;">{{ $errors->first('model') }}</span>
                                                            @endif
                                                        <input type="text" class="form-control form-control-alternative mitr" name="model" value="{{$value->model}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ยี่ห้อสินค้า</label>
                                                        <select name="subcategory_id" class="form-control form-control-alternative mitr">
                                                            @php
                                                                $brand_shock_id = DB::table('shockbrands')->where('brand',$brand)->value('id');
                                                            @endphp
                                                                <option value="{{$brand_shock_id}}">{{$brand}}</option>
                                                            @foreach ($brand_shocks as $brand_shock => $value)
                                                                <option value="{{$value->id}}">{{$value->brand}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary mitr">อัพเดตข้อมูล</button>
                                                <button type="button" class="btn btn-secondary mitr" data-dismiss="modal">ปิด</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </table>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection