@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">แก้ไขข้อมูลการจอง</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/edit-booking-covid-19')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ยี่ห้อยางรถยนต์</label>
                                        @if ($errors->has('brand'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('brand') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="brand" value="{{$booking->brand}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>รุ่นยางรถยนต์</label>
                                        @if ($errors->has('model'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('model') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="model" value="{{$booking->model}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ขนาดยางรถยนต์</label>
                                        @if ($errors->has('model'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('size') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="size" value="{{$booking->size}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ราคารวม 4 เส้น (หักส่วนลด)</label>
                                        @if ($errors->has('price'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('price') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="price" value="{{$booking->price}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>สาขาที่เข้าใช้บริการ</label>
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="{{$booking->service}}">{{$booking->service}}</option>
                                            <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาโคกกลอย' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาโคกกลอย</option>  
                                            <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาเมืองพังงา' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาเมืองพังงา</option>
                                            <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาถลาง' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาถลาง</option>
                                            <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาไทวัสดุ' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาไทวัสดุ</option>
                                            <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาบายพาส' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาบายพาส</option>
                                            <option {{ old('service') == 'ศูนย์บริการยางรถยนต์เอกการยาง สาขาเจ้าฟ้า' ? 'selected' : '' }}>ศูนย์บริการยางรถยนต์เอกการยาง สาขาเจ้าฟ้า</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{$booking->id}}">
                                        <button type="submit" class="btn btn-primary my-4 mitr">อัพเดตข้อมูลการจอง</button>
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
@endsection