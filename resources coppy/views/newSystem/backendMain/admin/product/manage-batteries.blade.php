@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">สร้างสินค้า</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/create-product-battery')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>รุ่นแบตเตอรี่</label>
                                        @if ($errors->has('subcategory'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('subcategory') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="รุ่นแบตเตอรี่" name="subcategory">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>รายละเอียด</label>
                                        @if ($errors->has('detail'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('detail') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="รายละเอียด" name="detail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ราคา</label>
                                        @if ($errors->has('price'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('price') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="ราคา" name="price">
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
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="เปิด">เปิด</option>
                                            <option value="ปิด">ปิด</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mt-2">
                                        @php
                                            $category_id = DB::table('product_categories')->where('name',"แบตเตอรี่")->value('id');
                                        @endphp
                                        <input type="hidden" name="category_id" value="{{$category_id}}">
                                        <button type="submit" class="btn btn-primary my-4 mitr">สร้างสินค้า</button>
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
                            <h3 class="mb-0">สินค้า</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{$batteries->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>รุ่นแบตเตอรี่</th>
                                    <th>รายละเอียด</th>
                                    <th>ราคาขาย</th>
                                    <th>รูปภาพ</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($batteries as $battery => $value)
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $battery+1}}</td>
                                    <td>{{$value->subcategory}}</td>
                                    <td>{{$value->detail}}</td>
                                    <td>{{$value->price}}</td>
                                    <td>
                                        <img src="{{url('image_upload/image_product_battery')}}/{{$value->image}}" class="img-responsive" width="50px;">
                                    </td>
                                    <td>{{$value->status}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#EditModel{{$value->id}}">
                                            <i class="fas fa-edit" style="color:blue;"></i>
                                        </a>                 
                                        <a href="{{url('/admin/delete-product-battery/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
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
                                            <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูลสินค้า</h5>
                                        </div>
                                        <form action="{{url('/admin/edit-product-battery')}}" enctype="multipart/form-data" method="post">@csrf
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>รุ่นแบตเตอรี่</label>
                                                        @if ($errors->has('subcategory'))
                                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('subcategory') }}</span>
                                                        @endif
                                                        <input type="text" class="form-control form-control-alternative mitr" name="subcategory" value="{{$value->subcategory}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>รายละเอียด</label>
                                                        @if ($errors->has('detail'))
                                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('detail') }}</span>
                                                        @endif
                                                        <input type="text" class="form-control form-control-alternative mitr" name="detail" value="{{$value->detail}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>ราคา</label>
                                                        @if ($errors->has('price'))
                                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('price') }}</span>
                                                        @endif
                                                        <input type="text" class="form-control form-control-alternative mitr" name="price" value="{{$value->price}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>รูปภาพสินค้า</label>
                                                        @if ($errors->has('image'))
                                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('image') }}</span>
                                                        @endif
                                                        <input type="file" class="form-control form-control-alternative mitr" name="image">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
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