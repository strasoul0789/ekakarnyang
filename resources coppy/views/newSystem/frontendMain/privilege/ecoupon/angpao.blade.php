@extends("newSystem/frontendMain/layouts/template/template")

@section("content")

<div class="container">
    <div class="row mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button data-toggle="modal" data-target="#myModal-image" data-backdrop="false"  class="btn btn-lg kanit" style="width:100%; background-color:#ff0700; border-color:#ff0800; color:#fff;"><i class="fa fa-hand-o-down"></i> | คลิ๊กเพื่อลงทะเบียนรับอั่งเปา</button>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <a data-toggle="modal" data-target="#myModal-image" data-backdrop="false">
                <img src="{{url('/images/ecoupon/angpao1000.png')}}" class="img-responsive" width="100%;"><br>
            </a>
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>
                        - เงื่อนไขเป็นไปตามที่บริษัท ฯ กำหนด บริษัท ฯ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงรายการส่งเสริมการขาย โดยไม่ต้องแจ้งให้ทราบล่วงหน้า <br>
                        - สามารถเข้าใช้บริการ ได้ที่ ไทร์พลัส เอกการยาง ทุกสาขา<br>
                        - 1 สิทธิ์ / 1 ใบเสร็จ เท่านั้น<br>
                        - สามารถใช้อั่งเปาได้ถึงวันที่ 31 ม.ค. 66
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal-image" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><button class="btn btn-info btn-lg kanit" style="width:100%; background-color:#ff0700; border-color:#ff0800; color:#fff;"><i class="fa fa-pencil-square-o"></i> | ลงทะเบียนเพื่อรับสิทธิ์</button></h4>
            </div>
            <div class="modal-body">
                <form id="sendurl">
                    <div class="form-group kanit">
                        <label>บัตรประชาชน 13 หลัก</label>
                        <input type="text" onkeyup="autoTab(this)" class="form-control" id="txtID" placeholder="กรอกหมายเลขบัตรประชาชน 13 หลัก" name="card_id">
                    </div>
                    <div class="form-group kanit">
                        <label>ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" placeholder="กรอกชื่อ-นามสกุล" id="name" name="name">
                    </div>
                    <div class="form-group kanit">
                        <label>เบอร์โทรศัพท์</label>
                        <input id="tel" name="tel" placeholder="กรุณาระบุหมายเลขโทรศัพท์ 10 หลัก" type="text" class="phone_format form-control">
                    </div>
                    <div style="text-align:right;">
                        <button id="btn_sub" type="submit" class="btn btn-success kanit" data-toggle="modal" data-target="#myModal1" data-backdrop="static" data-keyboard="false">ลงทะเบียน</button>
                        <button type="button" class="btn btn-danger kanit" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade mobile" id="myModal1" role="dialog" style="opacity:1; padding-top:5vh;" >
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div style="text-align:right;">
                    <a data-target="#myModal" data-toggle="modal" id="close" data-dismiss="modal">X</a>
                </div>
                <div id="tag-id"></div>
            </div>
        </div>
    </div>
</div>

<!-- Script -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-3.2.1.min.js')}}"></script>

<script>
    // Get the modal
    var modal = document.getElementById('myModal-image');
    var button = document.getElementById('btn_sub');
    button.onclick = function(){
        modal.style.display = "none";
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

<script>
  $('#sendurl').submit(function(e){
    e.preventDefault();
    var card_id = $('#txtID').val();
    var name = $('#name').val();
    var tel = $('#tel').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "{!! url('/angpao') !!}",
        data: {
            _token: '{{csrf_token()}}',
            card_id : card_id,
            name : name,
            tel : tel
        },
            success: function(response) {
                console.log(response.status);

                if(response.status === "Fail") {
                    $('#tag-id').html('<p style="text-align: center;">ไม่สามารถรับสิทธิ์ได้<br> เนื่องจากคุณลูกค้ากดรับสิทธิ์แล้ว</p>')
                } 
                else if(response.status === "Null") {
                    $('#tag-id').html('<p style="text-align: center;">กรุณากรอกข้อมูลให้ครบถ้วน</p>')
                }
                else if(response.status === "Pass") {
                  $('#tag-id').html('<button class="btn btn-info btn-lg kanit" style="width:100%; margin-bottom:10px; background-color:#ff0700; border-color:#ff0800; color:#fff;"><i class="fa fa-picture-o"></i> | กรุณาบันทึกภาพหน้าจอ</button><img src="{{url('/images/ecoupon/angpao100.png')}}" class="img-responsive" width="100%;"><p style="text-align:center;">'+response.card.name+'</p><p style="text-align:center;">รหัสรับสิทธิ์ : #chny'+response.card.id+'</p><p style="color:#fff; background-color: #ff0700; padding:10px;">เงื่อนไขการใช้อั่งเปา<br>1. แสดงรหัสรับสิทธิ์ได้ที่ ไทร์พลัส เอกการยาง ทุกสาขา<br> 2. บริษัท ฯ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงรายการส่งเสริมการขาย โดยไม่ต้องแจ้งให้ทราบล่วงหน้า<br> 3. สามารถใช้อั่งเปาได้ถึงวันที่ 31 ม.ค. 66<p>')    
                }
                else if(response.status === "PassRandom") {
                  $('#tag-id').html('<button class="btn btn-info btn-lg kanit" style="width:100%; margin-bottom:10px; background-color:#ff0700; border-color:#ff0800; color:#fff;"><i class="fa fa-picture-o"></i> | กรุณาบันทึกภาพหน้าจอ</button><img src="{{url('/images/ecoupon/angpao200.png')}}" class="img-responsive" width="100%;"><p style="text-align:center;">'+response.card.name+'</p><p style="text-align:center;">รหัสรับสิทธิ์ : #chny'+response.card.id+'</p><p style="color:#fff; background-color: #ff0700; padding:10px;">เงื่อนไขการใช้อั่งเปา<br>1. แสดงรหัสรับสิทธิ์ได้ที่ ไทร์พลัส เอกการยาง ทุกสาขา<br> 2. บริษัท ฯ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงรายการส่งเสริมการขาย โดยไม่ต้องแจ้งให้ทราบล่วงหน้า<br> 3. สามารถใช้อั่งเปาได้ถึงวันที่ 31 ม.ค. 66<p>')    
                }
                console.log(response);
            }
    });
});

  $('#close').click(function(){
    $('#txtID').text('')
    $('#name').text('')
    $('#tel').text('')
    console.log("test");
  });
</script>

<script language="javascript">
//เมื่อมีการคลิกฟังก์ชัน
$(function (){
 $('#btn_sub').click(function (){
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
</body>
</html>

@endsection