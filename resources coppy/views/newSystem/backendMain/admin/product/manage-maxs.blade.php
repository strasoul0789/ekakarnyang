@extends("/backend/layouts/template/template-admin")

@section("content")

<div class="container-fluid mt-5">
    <a href="{{url('/admin/create-brand-max')}}" class="btn btn-success">จัดการยี่ห้อสินค้า</a>
    <a href="{{url('/admin/create-model-max')}}" class="btn btn-success">จัดการรุ่นสินค้า</a>
    <a href="{{url('/admin/create-product-max')}}" class="btn btn-success">จัดการข้อมูลสินค้า</a>
</div>

<div class="container-fluid mt-5">
    <div class="row mt-5">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">สินค้า</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{$maxs->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>ยี่ห้อสินค้า</th>
                                    <th>รุ่นสินค้า</th>
                                    <th>รุ่นสินค้าย่อย</th>
                                    <th>ขนาด</th>
                                    <th>ราคาขาย</th>
                                    <th>รูปภาพ</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($maxs as $max => $value)
                            @php
                                $brand = DB::table('maxbrands')->where('id',$value->brand_id)->value('brand');
                                $model = DB::table('maxmodels')->where('id',$value->model_id)->value('model');
                            @endphp
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $max+1}}</td>
                                    <td>{{$brand}}</td>
                                    <td>{{$model}}</td>
                                    <td>{{$value->model}}</td>
                                    <td>{{$value->size}}</td>
                                    <td>{{$value->price}}</td>
                                    <td>
                                        <img src="{{url('image_upload/image_product_max')}}/{{$value->image}}" class="img-responsive" width="50px;">
                                    </td>
                                    <td>{{$value->status}}</td>
                                    <td>
                                        <a href="{{url('/admin/edit-product-max/')}}/{{$value->id}}">
                                            <i class="fas fa-edit" style="color:blue;"></i>
                                        </a>                  
                                        <a href="{{url('/admin/delete-product-max/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
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