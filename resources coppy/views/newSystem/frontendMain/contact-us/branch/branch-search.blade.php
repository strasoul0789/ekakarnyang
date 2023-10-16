@extends("template")
<script type="text/javascript" src="{{asset('js/halkaBox.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/halkaBox.min.css')}}">
<script type="text/javascript" src="{{asset('js/image-lightbox.js')}}"></script>
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="panel panel-body" style="background-color: #00902B; margin-top:15px;">
                <div class="col-md-1"></div>
                <form action="{{url('/branch-search')}}" method="post" role="form" enctype="multipart/form-data">{{csrf_field()}}
                    <div style="margin-top: 15px;">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-xl-4"></div>
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <h1 style="color:#fff !important; text-align:center;" class="kanit">ค้นหาสาขาที่ใช้บริการ</h1>   
                                </div><br>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xl-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-lg-2 col-xl-2"></div>
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <select name="branch" class="form-control kanit" style="height: calc(4rem + 2px)">
                                        <option>เลือกสาขาที่ใช้บริการ</option>
                                        <option value="bypassPKT">สาขาบายพาสภูเก็ต</option>
                                        <option value="thalangPKT">สาขาถลาง (ทางเข้าสนามบิน)</option>
                                        <option value="chaofahEAST">สาขาเจ้าฟ้าตะวันออก</option>
                                        <option value="thaiwatsaduPKT">สาขาไทวัสดุ (ท่าเรือ)</option>
                                        <option value="khokkloiPHANGNGA">สาขาโคกกลอย</option>
                                        <option value="phangnga">สาขาเมืองพังงา</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <button type="submit" style="height: calc(4rem + 2px); color:#005cbf !important; background-color:#fff; width:100%; font-size:20px;" class="col-md-12 btn btn-primary kanit">ค้นหา</button> 
                            </div>
                            <div class="col-md-2 col-lg-2 col-xl-2"></div>
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
        <div class="col-md-12">
            <h1 style="color: #2B3282; text-align:center;">เอกการยาง 
            @foreach ($locations as $location)
                {{$location->name}}
            @endforeach
            </h1>
            <p style="color: #A4A4A4; text-align:center;">
            @foreach ($locations as $location)
                {{ $location->location }}
            @endforeach
            </p>
            <p style="color: #000; text-align:center;">
                เปิดบริการ 
            @foreach ($locations as $location)
                {{ $location->date }}
            @endforeach เวลา 
            @foreach ($locations as $location)
                {{ $location->time }}
            @endforeach
            @foreach ($locations as $location)
                 {{ $location->other }} 
            @endforeach,
                เบอร์ติดต่อ 
            @foreach ($locations as $location)
                {{ $location->tel }}
            @endforeach
            </p>
            @foreach ($locations as $location)
                <img src="{{url('products')}}/{{$location->image}}" class="img-responsive" width="100%">
            @endforeach 
            <br>
            {{-- @foreach ($locations as $location)
                <a id="single-images" href="{{url('products')}}/{{$location->map}}" class="singleImage2"><img src="{{url('products')}}/{{$location->map}}" class="img-responsive"></a>
            @endforeach --}}
        </div>
	</div>
</div><br>

<!-- Script Search Size Tyre -->
<script src="{{ asset('/js/app.js') }}"></script>

<script>
    $('#category').on('change',function(e){
    console.log(e);
    var catmax_id = e.target.value;
        //ajax
        $.get('./ajax-maxsubcat?cat_id=' + catmax_id,function(data){
            $('#subcategory').empty();
            $.each(data, function(index, subcatObj){
                $('#subcategory').append('<option value="'+subcatObj.name+'">'+subcatObj.name+'</option>');
            });
        });
        });
</script>

<script>
    $('#width').on('change',function(e){
    console.log(e);
    var width_id = e.target.value;
        //ajax
        $.get('./ajax-width?cat_id=' + width_id,function(data){
            $('#ratio').empty();
            $.each(data, function(index, subcatObj){
                $('#ratio').append('<option value="'+subcatObj.id+'">'+subcatObj.ratio+'</option>');
            });
        });
        });
</script>

<script>
    $('#ratio').on('change',function(e){
    console.log(e);
    var ratio_id = e.target.value;
        //ajax
        $.get('./ajax-ratio?cat_id=' + ratio_id,function(data){
            $('#diameter').empty();
        console.log(data);
            $.each(data, function(index, subcatObj){
                $('#diameter').append('<option value="'+subcatObj.diameter+'">'+subcatObj.diameter+'</option>');
            });
        });
        });
</script>
@endsection