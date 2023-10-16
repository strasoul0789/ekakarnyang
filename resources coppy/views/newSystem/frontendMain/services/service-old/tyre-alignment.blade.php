@extends("newSystem/frontendMain/layouts/template/template")
<title>บริการตั้งศูนย์</title>
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
                                <source type="image/webp" srcset="{{ asset('/images/service/tyre-alignment.webp')}}" class="img-responsive">
                                <source type="image/jpeg" srcset="{{ asset('/images/service/tyre-alignment.jpg')}}" class="img-responsive">
                                <img src="{{ asset('/images/service/tyre-alignment.jpg')}}" class="img-responsive">
                            </picture>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-7 col-md-12 col-lg-7" style="margin-top: 10px;">
	                    <div class="blog-details">
	                        <h2>บริการตั้งศูนย์</h2>
	                        <p>
	                            ถ้าคุณสังเกตว่าขณะขับรถทางตรง บนถนนมีความเรียบ และมีแรงลมเพียงเล็กน้อย แล้วรถเกิดอาการดึงไปทางซ้ายหรือขวามากเกินไป หรือสังเกตว่ายางมีการสึกไม่เรียบ รถของคุณอาจต้องการการตั้งศูนย์ล้อใหม่
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
	                        	การตั้งศูนย์ล้อ คือการทำให้ส่วนประกอบต่าง ๆ ที่เกี่ยวข้องกับระบบบังคับเลี้ยว ระบบช่วงล่างล้อ และยาง ทำงานสัมพันธ์กันอย่างถูกต้อง ถ้ารถของคุณได้รับการตั้งศูนย์ล้อไม่ดีอาจส่งผลให้ยางรถยนต์เกิดการสึกไม่เรียบได้
								การตั้งศูนย์ล้ออาจหมายถึงการปรับแต่งช่วงล่างด้วย<br><br>
                        		เอกการยาง ใส่ใจกว่าที่เห็น เพราะรถทุกคันสำคัญสำหรับเรา<br><br>
								** สอบถามข้อมูลเพิ่มเติมหรือแวะไปให้ผู้เชี่ยวชาญตั้งศูนย์ล้อได้ที่เอกการยางทุกสาขา
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
						        <td>ตั้งศูนย์ ทุกขนาด</td>
						        <td>400</td>
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