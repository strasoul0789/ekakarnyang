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
                    <form action="{{url('/admin/create-product-tyre')}}" enctype="multipart/form-data" method="post">@csrf
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
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="ความกว้าง" name="width">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>อัตราส่วน</label>
                                        @if ($errors->has('ratio'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('ratio') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="อัตราส่วน" name="ratio">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>เส้นผ่านศูนย์กลาง</label>
                                        @if ($errors->has('diameter'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('diameter') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="เส้นผ่านศูนย์กลาง" name="diameter">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ราคาขาย ล่าสุด(บาท)</label>
                                        @if ($errors->has('price'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('price') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="โปรด ราคาขาย" name="price">
                                    </div>
                                </div>
                            
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ราคาทุน ล่าสุด(บาท)</label>
                                        @if ($errors->has('cost_prices'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('cost_prices') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="โปรด ราคาทุน" name="cost_prices">
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
                                        @php
                                            $category_id = DB::table('product_categories')->where('name',"ยางรถยนต์")->value('id');
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
                    {{$tyres->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>ยี่ห้อสินค้า</th>
                                    <th>รุ่นสินค้า</th>
                                    <th>ขนาด</th>
                                    <th>ราคาขาย</th>
                                    <th>ราคาทุน</th>
                                    <th>edit</th>
                                </tr>
                            </thead>
                            @foreach($tyres as $tyre => $value)
                            @php
                                $brand = DB::table('product_brands')->where('id',$value->subcategory_id)->value('brand');
                                $model = DB::table('product_models')->where('id',$value->model_id)->value('model');
                            @endphp
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $tyre+1}}</td>
                                    <td>{{$brand}}</td>
                                    <td>{{$model}}</td>
                                    <td>{{$value->width}}/{{$value->ratio}}{{$value->diameter}}</td>
                                    <td>{{$value->price}}</td>
                                    <td>{{$value->cost_prices}}</td>
                                    <td>
                                        <a href="{{url('/admin/edit-product-tyre/')}}/{{$value->tyre_id}}">
                                            <i class="fas fa-edit" style="color:blue;"></i>
                                        </a>                  
                                        <a href="{{url('/admin/delete-product-tyre/')}}/{{$value->tyre_id}}" onclick="return confirm('Are you sure to delete ?')">
                                            <i class="fa fa-trash" style="color:red;"></i>
                                        </a>
                                        <input type="hidden" name="tyre_id" value="{{$value->tyre_id}}">
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