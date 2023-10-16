@extends("newSystem/frontendMain/layouts/template/template")
<style>
.accordion {
  max-width: 900px;
  margin: 0 auto;
}
.accordion__title {
  font-family: 'industry', sans-serif;
  font-weight: 300;
  color: #fff;
  text-transform: uppercase;
  font-size: 1.125em;
}
.accordion__list {
  list-style: none;
  margin: 0;
  padding: 0;
}
.accordion__item {
  border-bottom: 1px solid #000;
  visibility: hidden;
}
.accordion__item:last-child {
  border-bottom: 0;
}
.accordion__item.is-active .accordion__itemTitleWrap::after {
  -webkit-transform: translateX(-20%);
          transform: translateX(-20%);
}
.accordion__item.is-active .accordion__itemIconWrap {
  -webkit-transform: rotate(180deg);
          transform: rotate(180deg);
}
.accordion__itemTitleWrap {
  display: flex;
  height: 2.5em;
  align-items: center;
  padding: 0 1em;
  color: #001285;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.accordion__itemTitleWrap::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 200%;
  height: 100%;
  background: #00902B;
  background: linear-gradient(45deg, #e3e3e3 0%, #e3e3e3 25%, #e3e3e3 51%, #e3e3e3 100%);
  z-index: 1;
  transition: -webkit-transform .4s ease;
  transition: transform .4s ease;
  transition: transform .4s ease, -webkit-transform .4s ease;
}
.accordion__itemTitleWrap.is-active::after, .accordion__itemTitleWrap:hover::after {
  -webkit-transform: translateX(-20%);
          transform: translateX(-20%);
}
.accordion__itemIconWrap {
  width: 1.25em;
  height: 1.25em;
  margin-left: auto;
  position: relative;
  z-index: 10;
}
.accordion__itemTitle {
  margin: 0;
  font-family: 'industry', sans-serif;
  font-weight: 300;
  font-size: 1em;
  position: relative;
  z-index: 10;
}
.accordion__itemContent {
  font-size: 0.875em;
  height: 0;
  overflow: hidden;
  background-color: #fff;
  padding: 0 1.25em;
}
.accordion__itemContent p {
  margin: 1em 0;
}

</style>
@section('content')

<script src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12 col-xl-12"><br>
			<h1 class="kanit" style="color:#00902B; text-align:center;">สาระน่ารู้ .. จากไทรพลัส เอกการยาง</h1>
			<div class="accordion"> 
				<ul class="accordion__list">
				  <li class="accordion__item">
					<div class="accordion__itemTitleWrap">
					  <h3 class="accordion__itemTitle kanit">การเลือกยางรถยนต์ที่ถูกต้อง ต้องคำนึงถึงอะไรบ้าง ?</h3>
					  <div class="accordion__itemIconWrap"><i class="fa fa-plus" aria-hidden="true"></i></div>
					</div>
					<div class="accordion__itemContent">
						<p>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i><strong style="color:#00902B;"> ลักษณะการขับขี่รถ</strong> เมื่อเลือกยางรถยนต์ ท่านต้องไม่ลืมคิดถึงลีลาการขับขี่ของท่าน ถ้าหากท่านจะต้องขับรถระยะทางไกลบ่อยๆ จงพิจารณาเลือกใช้ยางที่ประหยัด แต่ถ้าท่านเป็นนักขับรถสไตล์สปอร์ตหวือหวาก็ต้องเลือกยางที่เกาะถนนได้ดี เมื่อเข้าหัวโค้ง การประเมินสมรรถลักษณ์ของยางจะช่วยให้ท่านสามาร เลือกยางที่เหมาะสมกับลีลาการขับขี่ของท่านได้ <br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i><strong style="color:#00902B;"> ประเภทยานพาหนะที่ท่านขับขี่</strong> ยางรถยนต์ที่เป็นอุปกรณ์ดั้งเดิม (OE) ได้แก่ยางรถยนต์ที่เหมาะกับรถยนต์ โดยผู้ผลิตยานพาหนะ เมื่อเลือกยางรถยนต์ที่เป็นอุปกรณ์รากฐาน ผู้ผลิตยานพาหนะมักจะเลือกยางที่สนองความต้องการของผู้ซื้อในพิสัยที่กว้างไกลที่สุด อาจมีคำแนะนำเพิ่มเติมสำหรับยางที่จะนำมาแทนในคู่มือสำหรับท่านในฐานะเจ้าของรถ โดยปกติธรรมดา ยางรถยนต์ที่เป็นอุปกรณ์รากฐานนั้นจะเหมาะกับยานพาหนะของท่าน แต่ทั้งนี้ทั้งนั้น ท่านควรพิจารณาถึงตัวเลือกด้วยเช่นกัน<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i><strong style="color:#00902B;"> งบประมาณของท่าน</strong> เนื่องจากเป็นไปไม่ได้ที่จะสามารถบอกได้อย่างถูกต้องแม่นยำว่ายางรถยนต์ของท่านจะใช้ได้ไปอีกนานสักเท่าไรหรือว่ายางจะสามารถช่วยท่านประหยัดเชื้อเพลิงได้เพียงใด ที่เอกการยางให้คำแนะนำท่านได้ว่ายางใดมีคุณค่าดีที่สุดเหมาะสำหรับการขับขี่และงบประมาณของท่าน
						</p>	
					</div>
				  </li>
				  <li class="accordion__item">
					<div class="accordion__itemTitleWrap">
					  <h3 class="accordion__itemTitle kanit">ต้องเปลี่ยนไส้กรองทุกครั้งที่เปลี่ยนน้ำมันเครื่องหรือไม่ ?</h3>
					  <div class="accordion__itemIconWrap"><i class="fa fa-plus" aria-hidden="true"></i></div>
					</div>
					<div class="accordion__itemContent">
						<p>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> หากใช้งานไปเรื่อยๆ จนน้ำมันเครื่องหมดประสิทธิภาพ ไส้กรองจะมีความปนเปื้อนของน้ำมัน ดังนั้นทุกครั้งที่นำรถไปเปลี่ยนถ่ายน้ำมันเครื่อง ก็ควรที่จะเปลี่ยนไส้กรองด้วย เพื่อการทำงานอย่างเต็มประสิทธิภาพ</i>
						</p>
					</div>
				  </li>
				  <li class="accordion__item">
					<div class="accordion__itemTitleWrap">
					  <h3 class="accordion__itemTitle kanit">4 ขั้นตอนการตรวจสอบ อาการหม้อน้ำรั่ว เบื้องต้น</h3>
					  <div class="accordion__itemIconWrap"><i class="fa fa-plus" aria-hidden="true"></i></div>
					</div>
					<div class="accordion__itemContent">
						<p>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> ดับเครื่องยนต์ เเละเปิดฝากระโปรเพื่อระบายความร้อน<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> รอจนเครื่องเย็นจึง เปิดฝาหม้อน้ำ (ควรใช้ผ้าในการจับ ระวังเเรงดันน้ำในหม้อน้ำ)<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> เติมน้ำที่ละน้อย ๆ โดยทิ้งช่วงห่างกัน 5 นาที<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> สังเกตระดับน้ำที่เติม ถ้าเติมไม่เต็มสักที พาเข้าศูนย์บริการได้เลย<br><br> 
							ที่มา : กรมการขนส่งทางบก
						</p>
					</div>
				  </li>
				  <li class="accordion__item">
					<div class="accordion__itemTitleWrap">
					  <h3 class="accordion__itemTitle kanit">เอาตัวรอดเมื่อน้ำมันรถใกล้หมด กรณีหาปั๊มน้ำมันยาก</h3>
					  <div class="accordion__itemIconWrap"><i class="fa fa-plus" aria-hidden="true"></i></div>
					</div>
					<div class="accordion__itemContent">
						<p>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i>  อย่าเหยียบเบรกและลดความเร็วบ่อย ๆ เมื่อเบรก หรือชะลอความเร็วบ่อย ๆ ทำให้ต้องกลับมาเหยียบคันเร่งใหม ซึ่งการเหยียบคันเร่งบ่อยๆ ทำให้สิ้นเปลืองน้ำมันมากขึ้น<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i>  ปิดอุปกรณ์ไฟฟ้าในรถ ไม่ว่าจะเป็นแอร์ วิทยุ หยุดชาร์ตอุปกรณ์ต่าง ๆ ในรถ<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i>  ลดกระจกลงเล็กน้อยให้ลมเข้ามาในห้องโดยสาร เพื่อลดเเรงต้านทานลม รถจะใช้เเรงขับเคลื่อนน้อยลง<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i>  เลี่ยงถนนขรุขระ การจราจรติดขัด เพราะจะทำให้เหยียบเบรกและคันเร่งบ่อยขึ้น<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i>  ใช้ความเร็วให้เหมาะสมกับขนาดของเครื่องยนต์<br>
								&nbsp&nbspรถเครื่องยนต์ขนาด 1.3-1.8 ลิตร 
								ควรใช้ความเร็วระหว่าง 45-46 กม./ชม.<br>
								&nbsp&nbspรถเครื่องยนต์ขนาด 2.0-3.0 ลิตร 
								ควรใช้ความเร็วระหว่าง 55-75 กม./ชม.
						</p>
					</div>
				  </li>
				  <li class="accordion__item">
					<div class="accordion__itemTitleWrap">
					  <h3 class="accordion__itemTitle kanit">อาการแบบไหนต้องต้องเปลี่ยนโช้คอัพ ?</h3>
					  <div class="accordion__itemIconWrap"><i class="fa fa-plus" aria-hidden="true"></i></div>
					</div>
					<div class="accordion__itemContent">
						<p>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> ซีลน้ำมันโช้ครั่ว<br> 
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> โช้ค มีรูป ทรงที่ผิดแปลกจากเดิม<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> รถมีอาการเด้งกระด้างมากกว่าปกติ<br> 
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> โช้คมีอาการโยนตัวมาก หลังตกจากหลุม<br> 
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> ใช้งานเกิน 100,000 กิโลเมตร หรือ 5 ปี
						</p>
					</div>
				  </li>
				  <li class="accordion__item">
					<div class="accordion__itemTitleWrap">
					  <h3 class="accordion__itemTitle kanit">การเลือกยางที่ถูกต้อง ต้องคำนึงถึงอะไรบ้าง ?</h3>
					  <div class="accordion__itemIconWrap"><i class="fa fa-plus" aria-hidden="true"></i></div>
					</div>
					<div class="accordion__itemContent">
						<p>
							การขับรถในเวลากลางคืนย่อมต้องใช้ความระมัดระวังเป็นพิเศษ ไม่ว่าจะเป็นเรื่องความปลอดภัยของตัวเองและผู้ร่วมใช้ทาง และนี่คือ 5 เทคนิคการขับรถให้ปลอดภัยมั่นใจ<br><br>

							<i class="fa fa-check-square-o" style="color:#00902B;"></i> มีสติจดจ่อกับการขับขี่ และคอยสังเกตสภาพเส้นทางรอบข้างอย่างสม่ำเสมอ<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> ไม่ควรขับโดยใช้ความเร็วสูงเมื่อเข้าเขตชุมชน<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> ใช้ไฟสูงสำหรับกะพริบแจ้งเตือนรถช้าที่แล่นอยู่เลนขวาเพื่อขอทางสำหรับแซง<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> ทิ้งช่วงให้ห่างจากรถคันข้างหน้า และจะช่วยทำให้คุณมีระยะมากพอสำหรับเบรก<br>
							<i class="fa fa-check-square-o" style="color:#00902B;"></i> ตรวจเช็คไฟในรถทุกจุดให้มั่นใจว่าใช้งานได้เป็นอย่างดี
						</p>
					</div>
				  </li>
				</ul>
			  </div>
		</div>
	</div>
</div>


<script>
	var Accordion = function() {
  
  var
    toggleItems,
    items;
  
  var _init = function() {
    toggleItems     = document.querySelectorAll('.accordion__itemTitleWrap');
    toggleItems     = Array.prototype.slice.call(toggleItems);
    items           = document.querySelectorAll('.accordion__item');
    items           = Array.prototype.slice.call(items);
    
    _addEventHandlers();
    TweenLite.set(items, {visibility:'visible'});
    TweenMax.staggerFrom(items, 0.9,{opacity:0, x:-100, ease:Power2.easeOut}, 0.3)
  }
  
  var _addEventHandlers = function() {
    toggleItems.forEach(function(element, index) {
      element.addEventListener('click', _toggleItem, false);
    });
  }
  
  var _toggleItem = function() {
    var parent = this.parentNode;
    var content = parent.children[1];
    if(!parent.classList.contains('is-active')) {
      parent.classList.add('is-active');
      TweenLite.set(content, {height:'auto'})
      TweenLite.from(content, 0.6, {height: 0, immediateRender:false, ease: Back.easeOut})
      
    } else {
      parent.classList.remove('is-active');
      TweenLite.to(content, 0.3, {height: 0, immediateRender:false, ease: Power1.easeOut})
    }
  }
  
  return {
    init: _init
  }
  
}();

Accordion.init();
</script>
@endsection