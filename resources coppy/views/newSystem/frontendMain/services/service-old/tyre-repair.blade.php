@extends("newSystem/frontendMain/layouts/template/template")
<title>บริการซ่อมยาง</title>
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
                                <source type="image/webp" srcset="{{ asset('/images/service/tyre-repair.webp')}}" class="img-responsive">
                                <source type="image/jpeg" srcset="{{ asset('/images/service/tyre-repair.jpg')}}" class="img-responsive">
                                <img src="{{ asset('/images/service/tyre-repair.jpg')}}" class="img-responsive">
                            </picture>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-7 col-md-12 col-lg-7" style="margin-top: 10px;">
	                    <div class="blog-details">
	                        <h2>บริการซ่อมยาง</h2>
	                        <p>
	                            ยางของคุณรั่วหรือไม่ ? <br>
	                            เข้ามาพบช่างผู้เชี่ยวชาญ เพื่อตรวจสอบปัญหาและซ่อมแซม เพื่อให้ยางของคุณพร้อมใช้งานได้อย่างปลอดภัย
	                        </p><br>
	                        <p style="color: red">** สิทธิพิเศษสำหรับลูกค้าเอกการยาง ปะยางฟรี ตลอดอายุการใช้งาน เมื่อเปลี่ยนยาง 4 เส้น</p>
	                        <p style="color: red">** ปะยางดอกเห็ดเท่านั้น **</p>
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
	                        	บริการซ่อมยาง แก้ไขปัญหาเรื่องยางอย่างครบวงจร รวดเร็ว ทันใจ สบายใจได้มากกว่าเมื่อใช้บริการของเรา เพราะเอกการยางใช้เครื่องมือ เทคโนโลยีที่ทันสมัย และอะไหล่แท้ อะไหล่คุณภาพดี ช่วยคุณดูแลสภาพยางรถยนต์ที่มีปัญหาให้กลับมาใช้งานได้ใหม่อย่างรวดเร็ว มีคุณภาพ ในราคายุติธรรม<br><br>
	                        	<strong>การปะยางดอกเห็ด **ข้อดีของการปะยางดอกเห็ด</strong><br><br>
	                        	✅ ปะยางแบบนี้จะไม่ใช้ความร้อนจึงไม่ทำให้หน้ายางเสียหายจากความร้อน<br> 
								✅ ไม่เสี่ยงต่อการระเบิดของยางรถยนต์ เนื่องจากไม่เกิดการรั่วซึมง่าย<br>
								✅ ช่วยเสริมเนื้อผิวของยางบริเวณที่เป็นรูได้อย่างดี<br>
								✅ เหมาะสำหรับ การปะเพื่อซ่อมรอยตะปู หรือแผลเล็กที่หน้ายาง<br> 
								✅ มีความคงทนตลอดการใช้งาน รับแรง อัดได้ดี 
								แต่อาจจะใช้เวลาในการปะยาง ที่นานกว่าแบบอื่นๆ
	                        	<br><br>เอกการยาง ใส่ใจกว่าที่เห็น เพราะรถทุกคันสำคัญสำหรับเรา<br><br>
								** สอบถามข้อมูลเพิ่มเติมหรือแวะไปให้ผู้เชี่ยวชาญตั้งศูนย์ถ่วงล้อได้ที่เอกการยางทุกสาขา
	                        </p>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-5 col-md-12 col-lg-5">
	                    <table class="table table-bordered">
						    <thead>
						      <tr>
						        <th>บริการ</th>
						        <th>ราคาต่อล้อ (บาท)</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td>ปะยางดอกเห็ด</td>
						        <td>แผลละ 250</td>
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