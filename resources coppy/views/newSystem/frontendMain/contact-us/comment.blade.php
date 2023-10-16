@extends("newSystem/frontendMain/layouts/template/template")

@section("content")

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-md-12 col-lg-6">
            <div class="panel panel-default" >
                <div class="panel-heading" style="background-color:#00902b;">
                    <p class="kanit" style="color:#fff;">ความคิดเห็น / ข้อร้องเรียน</p>
                </div>
                <div class="panel-body">                    
                    <form action="{{url('/comment')}}" method="post" role="form" enctype="multipart/form-data">{{ csrf_field() }}
                        <select class="form-control kanit" name="branch_comment" style="height: calc(4rem + 2px)">
                            <option>สาขาที่ใช้บริการ</option>
                            <option>สาขาบายพาสภูเก็ต</option>
                            <option>สาขาถลาง (ทางเข้าสนามบิน)</option>
                            <option>สาขาเจ้าฟ้าตะวันออก</option>
                            <option>สาขาไทวัสดุ (ท่าเรือ)</option>
                            <option>สาขาโคกกลอย</option>
                        </select><br>
                        <p>วันที่เข้าใช้บริการ</p>
                        <input type="date" name="date" class="form-control" style="height: calc(3rem + 2px)"><br>
                        <textarea class="form-control kanit" rows="5" name="comment" placeholder="ความคิดเห็น / ข้อร้องเรียน"></textarea> 
                        <button type="submit" style="margin-top: 20px; background-color:#00902b !important;" class="col-md-5 btn btn-info kanit">แสดงความคิดเห็น</button> 
                    </form>
                </div>
            </div>
        </div>  
        <div class="col-lg-3"></div>
    </div>
</div>

@endsection