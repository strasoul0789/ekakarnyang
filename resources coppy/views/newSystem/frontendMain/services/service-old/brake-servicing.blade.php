@extends("newSystem/frontendMain/layouts/template/template")
<title>บริการดูแลเบรก</title>
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
                                <source type="image/webp" srcset="{{ asset('/images/service/brake-servicing.webp')}}" class="img-responsive">
                                <source type="image/jpeg" srcset="{{ asset('/images/service/brake-servicing.jpg')}}" class="img-responsive">
                                <img src="{{ asset('/images/service/brake-servicing.jpg')}}" class="img-responsive">
                            </picture>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-7 col-md-12 col-lg-7" style="margin-top: 10px;">
	                    <div class="blog-details">
	                        <h2>บริการดูแลเบรก โช้คอัพ</h2>
	                        <p>
	                            คุณไม่สามารถรู้ได้ว่า จะเจออะไรบนทางโค้งข้างหน้า และเมื่อไหร่ที่ต้องเบรกอย่างกระทันหัน เพื่อความปลอดภัยของคุณ คุณจึงควรให้ผู้เชียวชาญตรวจสอบระบบเบรก และโช้คอัพอยู่เสมอ
	                        </p>
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
	                        	การดูแลรักษาและยืดอายุการใช้งานผ้าเบรก หมั่นตรวจเช็ค และเติมลมยางให้อยู่ในระดับที่โรงงานผู้ผลิตรถยนต์กำหนด ควรนำรถเข้าตรวจเช็คผ้าเบรก และระบบเบรกทุกๆ 3 เดือน หรือ 10,000 กิโลเมตร ควรเปลี่ยนถ่ายน้ำมันเบรกทุกๆ 1 ปีหรือ 40,000 กิโลเมตร ควรเปลี่ยนผ้าเบรกชุดใหม่ตามกำหนด เพื่อความปลอดภัยในการเบรกหยุดรถ ช่วยยืดอายุการใช้งานของจานเบรก และลดค่าใช้จ่ายในการบำรุงรักษารถยนต์<br><br>
                        		เอกการยาง ใส่ใจกว่าที่เห็น เพราะรถทุกคันสำคัญสำหรับเรา<br><br>
								** สอบถามข้อมูลเพิ่มเติมหรือแวะไปได้ที่เอกการยางทุกสาขา
	                        </p>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-5 col-md-12 col-lg-5">
	                    <table class="table table-bordered">
						    <thead>
						      <tr>
						        <th>บริการ</th>
						        <th>ราคา (บาท)</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td>ค่าแรงเปลี่ยนผ้าเบรก (ชุดละ)</td>
						        <td>300</td>
						      </tr>
						      <tr>
						        <td>เจียรจาน (ข้างละ)</td>
						        <td>250</td>
						      </tr>
							  <tr>
						        <td>จานเซาะร่อง (ใบละ)</td>
						        <td>450</td>
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