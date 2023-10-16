@extends("/backend/layouts/template/template-admin")

@section("content")

<div class="container-fluid mt-5">
    <a href="{{url('/admin/create-brand-tyre')}}" class="btn btn-success">จัดการยี่ห้อสินค้า </a>
    <a href="{{url('/admin/create-model-tyre')}}" class="btn btn-success">จัดการรุ่นสินค้า</a>
    <a href="{{url('/admin/create-product-tyre')}}" class="btn btn-success">จัดการข้อมูลสินค้า</a>
</div>

<div class="container-fluid mt-5">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
    <h1>ค้นหายางตามขนาดยาง</h1>
    <form action="{{url('/admin/search-tyre-front-page')}}" enctype="multipart/form-data" method="post">@csrf
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <h3>ความกว้าง</h3>
                    <div class="wrapper">
                        <select name="width" class="form-control form-control-alternative mitr" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option value="145">145</option>
                            <option value="165">165</option>
                            <option value="175">175</option>
                            <option value="185">185</option>
                            <option value="195">195</option>
                            <option value="205">205</option>
                            <option value="215">215</option>
                            <option value="225">225</option>
                            <option value="235">235</option>
                            <option value="245">245</option>
                            <option value="255">255</option>
                            <option value="265">265</option>
                            <option value="275">275</option>
                            <option value="285">285</option>
                            <option value="295">295</option>
                            <option value="305">305</option>
                            <option value="315">315</option>
                            <option value="325">325</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="35">35</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <h3>อัตราส่วน</h3>
                    <div class="wrapper">
                        <select name="ratio" class="form-control form-control-alternative mitr" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option value="12.50">12.50</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="55">55</option>
                            <option value="60">60</option>
                            <option value="65">65</option>
                            <option value="70">70</option>
                            <option value="75">75</option>
                            <option value="80">80</option>
                            <option value="85">85</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <h3>เส้นผ่านศูนย์กลาง</h3>
                    <div class="wrapper">
                        <select name="diameter" class="form-control form-control-alternative mitr" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option value="R13">R13</option>
                            <option value="R14">R14</option>
                            <option value="R15">R15</option>
                            <option value="R16">R16</option>
                            <option value="R17">R17</option>
                            <option value="R18">R18</option>
                            <option value="R19">R19</option>
                            <option value="R20">R20</option>
                            <option value="R21">R21</option>
                            <option value="R22">R22</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            
            </div>
        </div>
    </form>

    <h1>ค้นหายางตามยี่ห้อยาง</h1>
    <form action="{{url('/admin/search-tyre-brand-front-page')}}" enctype="multipart/form-data" method="post">@csrf
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <h3>ยี่ห้อยางรถยนต์</h3>
                    <select name="brand_id" id="brand" class="form-control form-control-alternative mitr">
                        @foreach ($brands as $brand => $value)
                            <option value="{{$value->id}}">{{$value->brand}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <h3>รุ่นยางรถยนต์</h3>
                    <select name="model_id" id="model" class="form-control form-control-alternative mitr">
                        @foreach ($models as $model => $value)
                            <option value="{{$value->id}}">{{$value->model}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary my-4 mitr">ค้นหายางรถยนต์</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container-fluid">
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
                                    <th></th>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('#brand').on('change',function(e){
    console.log(e);
    var brand_id = e.target.value;
        //ajax
        $.get('./ajax-brand-front?cat_id=' + brand_id,function(data){
            $('#model').empty();
            $.each(data, function(index, subcatObj){
                $('#model').append('<option value="'+subcatObj.id+'">'+subcatObj.model+'</option>');
            });
        });
        });
</script>
@endsection