@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">สร้างยี่ห้อสินค้า</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/create-brand-shock')}}" enctype="multipart/form-data" method="post">@csrf
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
                                        @if ($errors->has('brand'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('brand') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="ยี่ห้อสินค้า" name="brand">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>รูปภาพยี่ห้อสินค้า</label>
                                        <input type="file" class="form-control form-control-alternative mitr" placeholder="รูปภาพยี่ห้อสินค้า" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>สถานะ</label>
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="เปิด">เปิด</option>
                                            <option value="ปิด">ปิด</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mt-2">
                                        @php
                                            $category_id = DB::table('product_categories')->where('name',"โช้ค")->value('id');
                                        @endphp
                                        <input type="hidden" name="category_id" value="{{$category_id}}">
                                        <button type="submit" class="btn btn-primary my-4 mitr">สร้างยี่ห้อสินค้า</button>
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
                            <h3 class="mb-0">ยี่ห้อสินค้า</h3>
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
                                    <th>ยี่ห้อสินค้า</th>
                                    <th>รูปภาพ</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($brands as $brand => $value)
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $brand+1}}</td>
                                    <td>{{$value->brand}}</td>
                                    <td>
                                        <img src="{{url('image_upload/image_brand_shock')}}/{{$value->image}}" class="img-responsive" width="100px;">
                                    </td>
                                    <td>{{$value->status}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#EditBrand{{$value->id}}">
                                            <i class="fas fa-edit" style="color:blue;"></i>
                                        </a>                  
                                        <a href="{{url('/admin/delete-brand-shock/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
                                            <i class="fa fa-trash" style="color:red;"></i>
                                        </a>
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                    </td>
                                </tr>
                            </tbody>
                            <!-- Modal -->
                            <div class="modal fade" id="EditBrand{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขยี่ห้อสินค้า</h5>
                                        </div>
                                        <form action="{{url('/admin/edit-brand-shock')}}" enctype="multipart/form-data" method="post">@csrf
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>ยี่ห้อสินค้า</label>
                                                        @if ($errors->has('brand'))
                                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('brand') }}</span>
                                                        @endif
                                                        <input type="text" class="form-control form-control-alternative mitr" name="brand" value="{{$value->brand}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>รูปภาพยี่ห้อสินค้า</label>
                                                        <input type="file" class="form-control form-control-alternative mitr" placeholder="รูปภาพยี่ห้อสินค้า" name="image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>สถานะ</label>
                                                        <select name="status" class="form-control form-control-alternative mitr">
                                                            <option value="{{$value->status}}">{{$value->status}}</option>
                                                            <option value="เปิด">เปิด</option>
                                                            <option value="ปิด">ปิด</option>
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