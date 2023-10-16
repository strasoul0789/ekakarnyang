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
                    <form action="{{url('/admin/create-product-shock')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ยี่ห้อรถยนต์</label>
                                        <select name="carbrand_id" class="form-control form-control-alternative mitr">
                                            @foreach ($carbrands as $carbrand => $value)
                                                <option value="{{$value->id}}">{{$value->brand}}</option>
                                            @endforeach
                                                <option value="-">-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>รุ่นรถยนต์</label>
                                        @if ($errors->has('carmodel'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('carmodel') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="รุ่นรถยนต์" name="carmodel">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ยี่ห้อสินค้า</label>
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
                                        <label>ราคาขาย</label>
                                        @if ($errors->has('price'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('price') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="ราคาขาย" name="price">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>รูปภาพสินค้า (ถ้ามี)</label>
                                        <input type="file" class="form-control form-control-alternative mitr" placeholder="รูปภาพสินค้า (ถ้ามี)" name="image">
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
                    {{$shocks->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>ยี่ห้อรถยนต์</th>
                                    <th>รุ่นรถยนต์</th>
                                    <th>ยี่ห้อสินค้า</th>
                                    <th>รุ่นสินค้า</th>
                                    <th>ราคาขาย</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($shocks as $shock => $value)
                            @php
                                $carbrand = DB::table('carbrands')->where('id',$value->carbrand_id)->value('brand');
                                $brand = DB::table('shockbrands')->where('id',$value->brand_id)->value('brand');
                            @endphp
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $shock+1}}</td>
                                    <td>{{$carbrand}}</td>
                                    <td>{{$value->carmodel}}</td>
                                    <td>{{$brand}}</td>
                                    <td>{{$value->model}}</td>
                                    <td>{{$value->price}}</td>
                                    <td>{{$value->status}}</td>
                                    <td>
                                        <a href="{{url('/admin/edit-product-shock/')}}/{{$value->id}}">
                                            <i class="fas fa-edit" style="color:blue;"></i>
                                        </a>                  
                                        <a href="{{url('/admin/delete-product-shock/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
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