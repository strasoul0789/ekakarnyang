@extends("newSystem/frontendMain/layouts/template/template")
<title>บริการเติมลมไนโตรเจน</title>
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
                                <source type="image/webp" srcset="{{ asset('/images/service/nitrogen-inflation.webp')}}" class="img-responsive">
                                <source type="image/jpeg" srcset="{{ asset('/images/service/nitrogen-inflation.jpg')}}" class="img-responsive">
                                <img src="{{ asset('/images/service/nitrogen-inflation.jpg')}}" class="img-responsive">
                            </picture>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-7 col-md-12 col-lg-7" style="margin-top: 10px;">
	                    <div class="blog-details">
	                        <h2>บริการเติมลมไนโตรเจน</h2>
	                        <p>
	                            เนื่องจากโมเลกุลไนโตรเจนมีขนาดใหญ่กว่าโมเลกุลออกซิเจน ดังนั้นยางรถยนต์ที่เติมไนโตรเจนจึงอยู่คงตัวได้นานกว่า จึงทำให้ลดความถี่ในการเติมลมยางได้
	                        </p><br>
	                        <p style="color: red">** สิทธิพิเศษสำหรับลูกค้าเอกการยาง เติมลมฟรี ตลอดอายุการใช้งาน เมื่อเปลี่ยนยาง 4 เส้น</p>
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
	                        	เติมลมไนโตรเจน การลดลงของความดันลมยางจะน้อยกว่า การเติมลมยางธรรมดา
								การลดลงของความดันลมยางที่น้อยกว่าจะช่วยลดการสึกหรอของดอกยาง และช่วยประหยัดน้ำมัน ลมยางไนโตรเจนขยายตัวน้อย ทำให้การขับขี่นุ่มนวล
								ป้องกันการเสียหายหรือการระเบิดของยางรถยนต์<br><br>
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
						        <th>ราคาต่อล้อ (บาท)</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td>N2 (Nitrogen Inflation)</td>
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