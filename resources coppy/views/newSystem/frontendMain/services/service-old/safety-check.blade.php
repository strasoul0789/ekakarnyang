@extends("newSystem/frontendMain/layouts/template/template")
<title>บริการตรวจเช็คสภาพรถ</title>
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
                                <source type="image/webp" srcset="{{ asset('/images/service/safety-check.webp')}}" class="img-responsive">
                                <source type="image/jpeg" srcset="{{ asset('/images/service/safety-check.jpg')}}" class="img-responsive">
                                <img src="{{ asset('/images/service/safety-check.jpg')}}" class="img-responsive">
                            </picture>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-7 col-md-12 col-lg-7" style="margin-top: 10px;">
	                    <div class="blog-details">
	                        <h2>บริการตรวจเช็คสภาพรถ</h2>
	                        <p>
	                            ข้อดีของการตรวจเช็คสภาพรถเป็นประจำ<br>
								ลดการสึกหรอ ยืดอายุการใช้งานของรถยนต์<br>
								ประหยัดค่าใช้จ่ายในการซ่อมแซม
								ประหยัดเวลาที่ต้องสูญเสียไปกับการซ่อมที่เกิดขึ้นภายหลังจากการขาดการบำรุงรักษาที่ดี ประหยัดน้ำมันเชื้อเพลิง<br>
								ขับขี่ได้อย่างปลอดภัยหมดกังวล 
	                        </p><br>
	                        <p style="color: red">** สิทธิพิเศษสำหรับลูกค้าที่มาใช้บริการ เอกการยาง ตรวจเช็คสภาพรถฟรี ไม่มีเงื่อนไข</p>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="text-imgs" style="margin-top: 20px;">
			<div class="row">
				<div id="promotion1" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<strong style="font-size: 22px; color: #00902b">ฟรีตรวจเช็คไม่มีเงื่อนไข 30 รายการ</strong>&nbsp<p style="font-size: 14px; color: #00902b">เอกการยาง ใส่ใจมากกว่าที่เห็น เพราะรถทุกคันสำคัญสำหรับเรา</p><br>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<p class="kanit">
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> การสึกหรอของยาง</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ลูกปืนล้อหน้า</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ลูกปืนล้อหลัง</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ระบบแสงสว่างรอบคัน</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ผ้าเบรกหน้า</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ผ้าเบรกหลัง</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> จานเบรกหน้า</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> จานเบรกหลัง+ดั๊มเบรก</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> โช้คอัพหน้า</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> โช้คอัพหลัง</h1>
							</p>
						</div>
						<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<p class="kanit">
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ยางหุ้มเพลาขับ</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ยางกันกระแทกคู่หน้า</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ยางกันกระแทกคู่หลัง</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> เพลากลาง จุด 1,2,3</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ระบบบังคับเลี้ยว,ลูกหมาก</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ปีกนกบน</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ปีกนกล่าง</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ใบปัดน้ำฝน</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> แบตเตอรี่และระดับน้ำกลั่น</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> กรองอากาศ</h1>
							</p>
						</div>
						<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<p class="kanit">
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> กรองแอร์</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> น้ำมันเครื่อง</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> น้ำมันเกียร์</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> น้ำมันเฟืองท้าย</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> น้ำมันคลัตซ์</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> น้ำมันเบรก</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> น้ำมันพวงมาลัยพาวเวอร์</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> หม้อน้ำ+น้ำยา</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ลมยางอะไหล่</h1>
							<h1 style="font-size: 16px;"><i class="fa fa-check-square" style="color:#00902B; font-size:18px;"></i> ตรวจเช็คสภาพภายนอกรอบคัน</h1>
							</p>
						</div>
					</div>
				</div>
			</div><br>
		</div>
	</div>
</div>                    
@endsection