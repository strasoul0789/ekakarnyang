@extends("/backend/layouts/template/template-staff")

@section("content")
<div class="container-fluid mt-7">
    <div class="row">
        <div class="col-md-4">
            <form action="{{url('/staff/search-booking-covid-19')}}" enctype="multipart/form-data" method="post">@csrf
                <input class="form-control mitr" type="text" placeholder="ค้นหาจากรหัสการจอง" name="code">
            </form>
        </div>
        <div class="col-md-4">
            <form action="{{url('/staff/search-booking-covid-19')}}" enctype="multipart/form-data" method="post">@csrf
                <input onkeyup="autoTab(this)" id="txtID" class="form-control mitr" type="text" placeholder="ค้นหาจากหมายเลขบัตรประชาชน" name="card_id">
            </form>
        </div>
        <div class="col-md-4">
            <form action="{{url('/staff/search-booking-covid-19')}}" enctype="multipart/form-data" method="post">@csrf
                <input class="phone_format form-control mitr" type="text" placeholder="ค้นหาจากเบอร์โทรศัพท์" name="tel">
            </form>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">ข้อมูลการลงทะเบียนรับสิทธิ์จองยาง (รถป้ายเขียว-ป้ายเหลือง)</h3>
                        </div>
                    </div>
                </div>
                @if($bookings == '0') 
                    <p style="text-align: center; margin-top:10px;">ไม่มีข้อมูลการลงทะเบียน</p><br>
                @else
                <div class="card-body">
                    {{$bookings->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>รหัสการจอง</th>
                                    <th>หมายเลขบัตรประชาชน</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>ป้ายทะเบียน</th>
                                    <th>ข้อมูลรถ</th>
                                    <th>ยี่ห้อยางรถยนต์</th>
                                    <th>รุ่นยางรถยนต์</th>
                                    <th>ขนาดยางรถยนต์</th>
                                    <th>ราคารวม</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($bookings as $booking => $value)
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $booking+1}}</td>
                                    <td style="color:red;">{{$value->code}}</td>
                                    <td>{{$value->card_id}}</td>
                                    <td>{{$value->name}} {{$value->surname}}</td>
                                    <td>{{$value->tel}}</td>
                                    <td>{{$value->carnumber}}</td>
                                    <td>
                                        {{$value->carbrand}} {{$value->carmodel}}
                                        <a href="" type="button" data-toggle="modal" data-target="#modal-image{{$value->id}}" data-id="{{$value->id}}">
                                            <i class="ni ni-image" style="color:green;"></i>
                                        </a>
                                    </td>
                                    <td style="color:red;">{{$value->brand}}</td>
                                    <td style="color:red;">{{$value->model}}</td>
                                    <td style="color:red;">{{$value->size}}</td>
                                    <td style="color:red;">{{$value->price}}</td>
                                    @if($value->status == "รอการติดต่อกลับ")
                                        <td style="color: red;">{{$value->status}}</td>
                                    @elseif($value->status == "แจ้งรหัสการจองแล้ว")
                                        <td style="color: #ff5e00;">{{$value->status}}</td>
                                    @elseif($value->status == "เข้าใช้บริการแล้ว")
                                        <td style="color: green;">{{$value->status}}</td>
                                    @endif
                                    <td>
                                        {{-- <a href="{{url('/staff/edit-booking-covid-19')}}/{{$value->id}}">
                                            <i class="ni ni-settings" style="color:blue;"></i>
                                        </a>   --}}
                                        <a href="" type="button" data-toggle="modal" data-target="#modal-status{{$value->id}}" data-id="{{$value->id}}">
                                            <i class="ni ni-check-bold" style="color:green;"></i>
                                        </a>  
                                        {{-- <a href="{{url('/staff/booking-covid-19-detail')}}/{{$value->id}}">
                                            <i class="ni ni-folder-17" style="color:#ff6600;"></i>
                                        </a>               --}}
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                    </td>
                                </tr>
                            </tbody>
                            <!-- Modal -->
                            <div class="modal fade" id="modal-status{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{url('/staff/edit-booking-covid-19')}}" enctype="multipart/form-data" method="post">@csrf
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <label>สถานะ</label>
                                                    <select name="status" class="form-control mitr">
                                                        <option value="{{$value->status}}">{{$value->status}}</option>
                                                        <option value="รอการติดต่อกลับ">รอการติดต่อกลับ</option>
                                                        <option value="แจ้งรหัสการจองแล้ว">แจ้งรหัสการจองแล้ว</option>
                                                        <option value="เข้าใช้บริการแล้ว">เข้าใช้บริการแล้ว</option> 
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                    <button type="submit" class="btn btn-primary mitr">บันทึกข้อมูล</button>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary mitr" data-dismiss="modal">ปิด</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modal-image{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <label>รูปภาพรถป้ายเขียว-ป้ายเหลือง</label>
                                                <img src="{{url('image_upload/booking_covid_19')}}/{{$value->image}}" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary mitr" data-dismiss="modal">ปิด</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script language="javascript">
    //เมื่อมีการคลิกฟังก์ชัน
    $(function (){
     $('.btn_sub').click(function (){
       if($('#txtID').val().trim()==''){
        $('#msg').text('กรุณากรอกเลขประจำตัว');
        $('#txtID').focus();
       }else{
        //checkID($('#txtID').val() จะไปเรียกฟังก์ชัน  checkID(id)
        if(!checkID($('#txtID').val().trim())){
         alert('รหัสประชาชนไม่ถูกต้อง');
         return false;
        }
       }
     });
    });
    
    //ตรวจสอบเลข ปปช ว่ามีจริงหรือไม่
    function checkID(id)
    {
    
    //ตัดข้อความ - ออก
    var zid = id;
    var zids = zid.split("-");
    for(var i=0;i<zids.length;i++){
     zids[i];
    }
    var id_val = zids[0]+zids[1]+zids[2]+zids[3]+zids[4];
    
    if(id_val.length != 13) return false;
    for(i=0, sum=0; i < 12; i++)
    sum += parseFloat(id_val.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id_val.charAt(12)))
    return false; return true;
    }
    
    //ฟังก์ชัน รูปแบบ
    function autoTab(obj){
     /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
     หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
     4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
     รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
     หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
     ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
     */
      var pattern=new String("_-____-_____-_-__"); // กำหนดรูปแบบในนี้
      var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
      var returnText=new String("");
      var obj_l=obj.value.length;
      var obj_l2=obj_l-1;
      for(i=0;i<pattern.length;i++){   
       if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
        returnText+=obj.value+pattern_ex;
        obj.value=returnText;
       }
      }
      if(obj_l>=pattern.length){
       obj.value=obj.value.substr(0,pattern.length);   
      }
    }  
</script>
<script>
    // number phone
    function phoneFormatter() {
        $('input.phone_format').on('input', function() {
            var number = $(this).val().replace(/[^\d]/g, '')
                if (number.length >= 5 && number.length < 10) { number = number.replace(/(\d{3})(\d{2})/, "$1-$2"); } else if (number.length >= 10) {
                    number = number.replace(/(\d{3})(\d{3})(\d{3})/, "$1-$2-$3"); 
                }
            $(this).val(number)
            $('input.phone_format').attr({ maxLength : 12 });    
        });
    };
    $(phoneFormatter);
</script>
@endsection