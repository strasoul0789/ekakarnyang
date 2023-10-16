@extends("/backend/layouts/template/template-staff")
<style>
.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
</style>
@section("content")
<div class="container-fluid mt-7">
    <div class="row">                       
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 style="border-bottom: 3px solid #00902b; width:15.2rem;">ค้นหายางตามขนาดยาง หรอ</h1><br>
                    <form action="{{url('/staff/search-tyre')}}" enctype="multipart/form-data" method="post">@csrf
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
                                            <option value="700">700</option>
                                            <option value="750">750</option>
                                            <option value="11">11</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="35">35</option>
                                            <option value="37">37</option>
                                            <option value="40">40</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <h3>อัตราส่วน</h3>
                                    <div class="wrapper">
                                        <select name="ratio" class="form-control form-control-alternative mitr" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                            <option value="9.50">9.50</option>
                                            <option value="10.50">10.50</option>
                                            <option value="12.50">12.50</option>
                                            <option value="13.50">13.50</option>
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
                                            <option value="R12">R12</option>
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
                                            <option value="R22.5">R22.5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mt-2">
                                    <button type="submit" class="bttn btn my-4 mitr" style="background-color : #fff; color:#00902b;">ค้นหายางรถยนต์</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="row">
        @foreach($brands as $brand => $value)
        <div class="col-xl-2 col-6"> 
            <a href="{{url('/staff/data-tyre')}}/{{$value->brand}}" class="bttn">
                {{$value->brand}}
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection