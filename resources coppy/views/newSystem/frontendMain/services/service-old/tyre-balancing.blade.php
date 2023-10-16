@extends("newSystem/frontendMain/layouts/template/template")
<title>บริการถ่วงล้อ</title>
@section("content")
<div class="container bootstrap snippet">
    <hr>
	<div class="row">
	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	        <div class="well blog">
	            <div class="row">
	                <div class="col-xs-12 col-sm-5 col-md-12 col-lg-5">
	                    <div class="image">
	                    	<picture>
                                <source type="image/webp" srcset="{{ asset('/images/service/tyre-balancing.webp')}}" class="img-responsive">
                                <source type="image/jpeg" srcset="{{ asset('/images/service/tyre-balancing.jpg')}}" class="img-responsive">
                                <img src="{{ asset('/images/service/tyre-balancing.jpg')}}" class="img-responsive">
                            </picture>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-7 col-md-12 col-lg-7" style="margin-top: 10px;">
	                    <div class="blog-details">
	                        <h2>บริการถ่วงล้อ</h2>
	                        <p>
	                            เมื่อมีการติดตั้งยางใหม่เข้ากับรถ จะต้องมีการถ่วงล้อเพื่อปรับสมดุลอีกครั้ง เพื่อให้แน่ใจว่าล้อจะทำการหมุนได้ดี ยางที่ไม่ได้รับการถ่วงล้ออย่างเหมาะสม จะทำให้เกิดการสั่นสะเทือน ไม่นุ่มสบายเวลาขับขี่ รวมทั้งทำให้ยาง ส่วนประกอบของช่วงล่าง และพวงมาลัยสึกหรอก่อนกำหนดได้
	                        </p><br>
	                        <p style="color: red">** สิทธิพิเศษสำหรับลูกค้าเอกการยาง ถ่วงล้อฟรี ตลอดอายุการใช้งาน เมื่อเปลี่ยนยาง 4 เส้น </p>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	        <div class="well blog">
	            <div class="row">
	                <div class="col-xs-12 col-sm-7 col-md-12 col-lg-7">
	                	<div class="blog-details">
	                        <p>
	                        	การตั้งศูนย์ถ่วงล้อ มีความจำเป็นที่จะต้องทำ ถ้าไม่ทำตัวล้อก็จะมีความสั่นสะเทือน ยางสึกเร็ว พวงมาลัยสั่น บังคับรถได้ไม่เต็มที่ ซึ่งปกติการใช้รถยนต์ทั่วไป จะมีการสลับยางทุก 10,000 กม. และอายุของตัวยางก็จะอยู่ประมาณ 3 ปี หรือประมาณ 50,000 กม.<br><br>เอกการยาง ใส่ใจกว่าที่เห็น เพราะรถทุกคันสำคัญสำหรับเรา<br><br>
								** สอบถามข้อมูลเพิ่มเติมหรือแวะไปให้ผู้เชี่ยวชาญตั้งศูนย์ถ่วงล้อได้ที่เอกการยางทุกสาขา
	                        </p>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-5 col-md-12 col-lg-5">
	                    <table class="table table-bordered">
						    <thead>
						      <tr>
						        <th>ขนาดยาง</th>
						        <th>ราคา (บาท)</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td>ขอบ 15 (ล้อละ)</td>
						        <td>150</td>
						      </tr>
						      <tr>
						        <td>ขอบ 16 (ล้อละ)</td>
						        <td>200</td>
						      </tr>
						      <tr>
						        <td>ขอบ 17 (ล้อละ)</td>
						        <td>250</td>
						      </tr>
						    </tbody>
  						</table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>                    
@endsection