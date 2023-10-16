@extends("newSystem/frontendMain/layouts/template/template")
<title>บริการติดตั้งยาง</title>
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
                                <source type="image/webp" srcset="{{ asset('/images/service/tyre-fitment.webp')}}" class="img-responsive">
                                <source type="image/jpeg" srcset="{{ asset('/images/service/tyre-fitment.jpg')}}" class="img-responsive">
                                <img src="{{ asset('/images/service/tyre-fitment.jpg')}}" class="img-responsive">
                            </picture>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-7 col-md-12 col-lg-7" style="margin-top: 10px;">
	                    <div class="blog-details">
	                        <h2>บริการติดตั้งยาง ล้อแม็กซ์</h2>
	                        <p>
	                            ช่างผู้เชี่ยวชาญของเอกการยางสามารถช่วยแนะนำการติดตั้งยาง และแม็กซ์ที่เหมาะสมกับล้อมาตรฐาน หรือมีการปรับแต่งพิเศษได้หรือไม่ แน่นอน .. เอกการยาง มีคำตอบให้คุณ
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
	                            การติดตั้งยางรถยนต์ ไม่ได้เป็นเรื่องยาก และใช้เวลาเพียงไม่กี่นาที แต่หัวใจหลักของการติดตั้งยางรถยนต์ ล้อแม็กซ์ คือ การติดตั้งให้ปลอดภัย และให้สุนทรียภาพในการขับขี่สูงสุด การติดตั้งยางใหม่อย่างถูกต้องโดยผู้เชี่ยวชาญจึงเป็นสิ่งสำคัญมาก
	                            <br><br>เอกการยาง ใส่ใจกว่าที่เห็น เพราะรถทุกคันสำคัญสำหรับเรา<br><br>
								** ติดต่อเอกการยางทุกสาขาเพื่อมองหายางที่เหมาะสำหรับความต้องการ และงบประมาณของคุณ
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
						        <td>ถอด/ประกอบ ยางเก่า (เส้นละ)</td>
						        <td>100</td>
						      </tr>
						      <tr>
						        <td>ถอด/ประกอบ ยางใหม่ (เส้นละ)</td>
						        <td>250</td>
						      </tr>
						      <tr>
						        <td>สลับยาง (ล้อละ)</td>
						        <td>50</td>
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