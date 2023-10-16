@extends("/backend/layouts/template/template-admin")

@section("content")

<div class="container-fluid mt-5">
    <a href="{{url('/admin/create-brand-shock')}}" class="btn btn-success">จัดการยี่ห้อสินค้า</a>
    <a href="{{url('/admin/create-model-shock')}}" class="btn btn-success">จัดการรุ่นสินค้า</a>
    <a href="{{url('/admin/create-product-shock')}}" class="btn btn-success">จัดการข้อมูลสินค้า</a>
</div>

<div class="container-fluid mt-5">
    <div class="row justify-content-center mt-5">
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