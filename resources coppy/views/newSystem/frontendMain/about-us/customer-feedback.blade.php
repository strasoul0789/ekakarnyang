@extends("newSystem/frontendMain/layouts/template/template")

@section("content")
<div class="container mt-5">
    <div class="row">
        @foreach ($branchs as $branch => $value)
            <div class="col-md-4 mt-3">
                <div class="card bg-success text-white kanit">
                    <div class="card-body" style="text-align: center;">

                        @if($value->branch_name == "bypassPKT")
                            <h2>เอกการยาง สาขาบายพาส</h2>
                        @elseif($value->branch_name == "thalangPKT")
                            <h2>เอกการยาง สาขาถลาง</h2>
                        @elseif($value->branch_name == "chaofahEAST")
                            <h2>เอกการยาง สาขาเจ้าฟ้า</h2>
                        @elseif($value->branch_name == "thaiwatsaduPKT")
                            <h2>เอกการยาง สาขาไทวัสดุ</h2>
                        @elseif($value->branch_name == "khokkloiPHANGNGA")
                            <h2>เอกการยาง สาขาโคกกลอย</h2>
                        @elseif($value->branch_name == "phangnga")
                            <h2>เอกการยาง สาขาเมืองพังงา</h2>
                        @endif

                        @php
                            $feedbacks = DB::table('customer_reviews')->where('branch_name',$value->branch_name)->get();
                            $count_feedback = count($feedbacks);
                            
                            $comments = DB::table('customer_reviews')->where('branch_name',$value->branch_name)
                                                                     ->where('comment','!=',NULL)->get();
                            $count_comment = count($comments);
                        @endphp
                        <hr style="border-top:2px solid #fff;">
                        <h3>Feedback  {{$count_feedback}} รายการ</h3>
                        <h3>ความคิดเห็น  {{$count_comment}} รายการ</h3><br>
                        <a href="{{url('/customer-feedback-detail')}}/{{$value->branch_name}}" style="text-decoration: none;"><h3 style="text-align: right; color: #fff;">รายละเอียด >></h3></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection