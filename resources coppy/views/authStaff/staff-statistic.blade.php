@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">ข้อมูลการเข้าใช้งานเว็บไซต์</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{$statistics->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>สาขา</th>
                                    <th>รายชื่อ</th>
                                    <th>วันที่</th>
                                    <th>จำนวนการเข้าใช้</th>
                                </tr>
                            </thead>
                            @foreach($statistics as $statistic => $value)
                            @php
                                $branch = DB::table('staffs')->where('id',$value->staff_id)->value('branch');
                                $name = DB::table('staffs')->where('id',$value->staff_id)->value('name');
                            @endphp
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $statistic+1}}</td>
                                    <td>{{$branch}}</td>
                                    <td>{{$name}}</td>
                                    <td>{{$value->date}}</td>
                                    <td>{{$value->count}}</td>
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