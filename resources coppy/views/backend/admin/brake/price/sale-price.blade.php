@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-5">
    <h1>ค้นหาผ้าเบรก</h1>
    <form action="{{url('/admin/search-brake-brand')}}" enctype="multipart/form-data" method="post">@csrf
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <h3>ยี่ห้อรถยนต์</h3>
                    <select name="brand_id" id="brand" class="form-control form-control-alternative mitr">
                        @foreach ($brands as $brand => $value)
                            <option value="{{$value->id}}">{{$value->brand}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <h3>รุ่นรถยนต์</h3>
                    <select name="model_id" id="model" class="form-control form-control-alternative mitr">
                        <option>รุ่นรถยนต์</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary my-4 mitr">ค้นหาผ้าเบรก</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">ข้อมูลผ้าเบรก</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{$brakes->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr><th>#</th>
                                    <th>หมายเลขสินค้า</th>
                                    <th>ยี่ห้อสินค้า</th>
                                    <th>ยี่ห้อรถยนต์</th>
                                    <th>รุ่นรถยนต์</th>
                                    <th>ขื่อ</th>
                                    <th>ราคาขายล่าสุด (บาท)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($brakes as $brake => $value)
                            <tbody>
                                @php
                                    $brand = DB::table('carbrands')->where('id',$value->brand_id)->value('brand');
                                    $model = DB::table('carmodels')->where('id',$value->model_id)->value('model');
                                    $price = DB::table('brake_sale_prices')->where('brake_id',$value->id)->orderBy('id','desc')->value('price');
                                    $price_format = number_format($price);
                                @endphp
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $brake+1}}</td>
                                    <td>{{$value->code}}</td>
                                    <td>{{$value->brand}}</td>
                                    <td>{{$brand}}</td>
                                    <td>{{$model}}</td>
                                    <td>{{$value->name}}</td>
                                    @if($price == null)
                                        <td style="color: red;">0 บาท</td>
                                    @else 
                                        <td>{{$price_format}} บาท</td>
                                    @endif
                                    <td>       
                                        <a data-toggle="modal" data-target="#EditPrice{{$value->id}}">
                                            <i class="fas fa-edit" style="color:blue;"></i>
                                        </a>        
                                        <a href="{{url('/admin/brake-price-detail')}}/{{$value->id}}">
                                            <i class="fas fa-folder" style="color:blue;"></i>
                                        </a> 
                                    </td>
                                </tr>
                            </tbody>
                            <!-- Modal -->
                            <div class="modal fade" id="EditPrice{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขราคาผ้าเบรก</h5>
                                        </div>
                                        <form action="{{url('/admin/edit-brake-price')}}" enctype="multipart/form-data" method="post">@csrf
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                                @if(Session::has('alert-' . $msg))
                                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                                @endif
                                            @endforeach
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>ราคาผ้าเบรกล่าสุด</label>
                                                        @if ($errors->has('price'))
                                                            <span class="text-danger" style="font-size: 16px;">({{ $errors->first('price') }})</span>
                                                        @endif
                                                        <input type="text" class="form-control form-control-sm" name="price">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>สถานะ</label>
                                                        <select class="form-control mitr" name="status">
                                                            <option value="เปิด">เปิด</option>
                                                            <option value="ปิด">ปิด</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="brake_id" value="{{$value->id}}">
                                                <input type="hidden" name="admin_id" value="{{Auth::guard('admin')->id()}}">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('#brand').on('change',function(e){
    console.log(e);
    var brand_id = e.target.value;
        //ajax
        $.get('./ajax-carbrand?cat_id=' + brand_id,function(data){
            $('#model').empty();
            $.each(data, function(index, subcatObj){
                $('#model').append('<option value="'+subcatObj.id+'">'+subcatObj.model+'</option>');
            });
        });
        });
</script>
@endsection