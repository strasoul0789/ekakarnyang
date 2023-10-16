@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">เพิ่มรายการผ้าเบรก</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $random = rand(11111,99999);  
                        $random_format = wordwrap($random , 4 , '-' , true );
                        $code_gen = 'BR-'.$random_format;

                        $code = DB::table('brakes')->where('code',$code_gen)->value('code');
                            if($code == null) {
                                $code = $code_gen; 
                            } else {
                                $random = rand(11111,99999);  
                                $random_format = wordwrap($random , 4 , '-' , true );
                                $code_gen = 'BR-'.$random_format;
                            }
                    @endphp
                    <form action="{{url('/admin/create-brake')}}" enctype="multipart/form-data" method="post">@csrf
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
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ยี่ห้อรถยนต์</label>
                                        <select name="brand_id" id="brand" class="form-control form-control-alternative mitr">
                                            @foreach ($brands as $brand => $value)
                                                <option value="{{$value->id}}">{{$value->brand}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">รุ่นรถยนต์</label>
                                        <select name="model_id" id="model" class="form-control form-control-alternative mitr">
                                            <option>รุ่นรถยนต์</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ปีรถ</label>
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="กรุณากรอกปีรถ (ถ้ามี)" name="year">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ยี่ห้อผ้าเบรก</label>
                                        <select name="brand" class="form-control form-control-alternative mitr">
                                            <option value="Bendix">Bendix</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">ขื่อสินค้า</label>
                                        @if ($errors->has('name'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('name') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" placeholder="กรุณากรอกขื่อสินค้า" name="name">
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
                                        <button type="submit" class="btn btn-primary my-4 mitr">เพิ่มรายการผ้าเบรก</button>
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
        $.get('./ajax-carbrand?cat_id=' + brand_id,function(data){
            $('#model').empty();
            $.each(data, function(index, subcatObj){
                $('#model').append('<option value="'+subcatObj.id+'">'+subcatObj.model+'</option>');
            });
        });
        });
</script>
@endsection