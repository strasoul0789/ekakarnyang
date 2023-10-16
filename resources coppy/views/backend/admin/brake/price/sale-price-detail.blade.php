@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center mt-5">
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
                    {{$prices->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>วันที่อัพเดตราคา</th>
                                    <th>ราคาขายล่าสุด (บาท)</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($prices as $price => $value)
                            <tbody>
                                @php
                                    $sale_price_format = number_format($value->price);
                                @endphp
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $price+1}}</td>
                                    <td>{{ date('Y-m-d', strtotime($value->created_at)) }}</td>
                                    @if($value->price == null)
                                        <td style="color: red;">0 บาท</td>
                                    @else 
                                        <td>{{$sale_price_format}} บาท</td>
                                    @endif
                                    <td>{{$value->status}}</td>
                                    @if(Auth::guard('admin')->user()->role == "ผู้ดูแล")
                                    <td>             
                                        <a href="{{url('/admin/delete-brake-price/')}}/{{$value->id}}" style="color: red;" onclick="return confirm('Are you sure to delete ?')">
                                            ลบราคาขาย
                                        </a> 
                                    </td>
                                    @endif
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