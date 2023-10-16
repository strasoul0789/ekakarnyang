@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <a href="{{url('/admin/tyre')}}" class="btn btn-success">ค้นหายางตามขนาดยาง</a>
            <a href="{{url('/admin/create-brand')}}" class="btn btn-success">ยี่ห้อยางรถยนต์</a>
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
                            <h3 class="mb-0">เพิ่มรายการยางรถยนต์</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $random = rand(11111,99999);  
                        $random_format = wordwrap($random , 4 , '-' , true );
                        $code_gen = 'TY-'.$random_format;

                        $code = DB::table('tyres')->where('code',$code_gen)->value('code');
                            if($code == null) {
                                $code = $code_gen; 
                            } else {
                                $random = rand(11111,99999);  
                                $random_format = wordwrap($random , 4 , '-' , true );
                                $code_gen = 'TY-'.$random_format;
                            }
                    @endphp
                    <form action="{{url('/admin/create-tyre')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">รหัสสินค้า</label>
                                        <input type="text" class="form-control form-control-alternative mitr" name="code" value="{{$code}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ยี่ห้อยางรถยนต์</label>
                                        <select name="brand_id" id="brand" class="form-control form-control-alternative mitr">
                                            @foreach ($brands as $brand => $value)
                                                <option value="{{$value->id}}">{{$value->brand}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">รุ่นยางรถยนต์</label>
                                        <select name="model_id" id="model" class="form-control form-control-alternative mitr">
                                            <option>รุ่นยางรถยนต์</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ความกว้าง</label>
                                        @if ($errors->has('width'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('width') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="กรุณากรอกความกว้าง" name="width">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">อัตราส่วน</label>
                                        @if ($errors->has('ratio'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('ratio') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="กรุณากรอกอัตราส่วน" name="ratio">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">เส้นผ่านศูนย์กลาง</label>
                                        @if ($errors->has('diameter'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('diameter') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="กรุณากรอกเส้นผ่านศูนย์กลาง" name="diameter">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">หมายเหตุ (ถ้ามี)</label>
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="หมายเหตุ (ถ้ามี)" name="comment">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">สถานะ</label>
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="เปิด">เปิด</option>
                                            <option value="ปิด">ปิด</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mt--4">
                                        <input type="hidden" name="admin_id" value="{{Auth::guard('admin')->id()}}">
                                        <button type="submit" class="btn btn-primary my-4 mitr">เพิ่มรายการยางรถยนต์</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
        $.get('./ajax-brand?cat_id=' + brand_id,function(data){
            $('#model').empty();
            $.each(data, function(index, subcatObj){
                $('#model').append('<option value="'+subcatObj.id+'">'+subcatObj.model+'</option>');
            });
        });
        });
</script>
@endsection