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
  color: #fff;
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
  background: linear-gradient(45deg, #00902B 0%, #00902B 25%, #2B3282 51%, #00902B 100%);
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
			<h1 class="kanit" style="color:#00902B; text-align:center;">คำถามที่พบบ่อย</h1>
			<div class="accordion"> 
				<ul class="accordion__list">
				  <li class="accordion__item">
					<div class="accordion__itemTitleWrap">
					  <h3 class="accordion__itemTitle kanit">ทำไมต้องเปลี่ยนยางที่ศูนย์บริการยางรถยนต์เอกการยาง ?</h3>
					  <div class="accordion__itemIconWrap"><svg viewBox="0 0 24 24"><polyline fill="none" points="21,8.5 12,17.5 3,8.5 " stroke="#FFF" stroke-miterlimit="10" stroke-width="2"/></svg></div>
					</div>
					<div class="accordion__itemContent">
					  <p>- ศูนย์บริการมากมายเตรียมไว้เพื่อคุณ ทำให้สะดวกในการเลือกใช้บริการ</p>
					  <p>- มียางให้เลือกมากมาย จากหลายแบรนด์ดังที่ได้มาตรฐาน</p>
					  <p>- เชี่ยวชาญเรื่องรถยนต์ เปิดให้บริการมามากกว่า 30 ปี</p>
					  <p>- รับประกันยางทุกกรณี ไม่มีเงื่อนไข เปลี่ยนเส้นใหม่ภายใน 30 วัน</p>
					  <p>- มาตรฐานเดียวกันทุกสาขา ด้วยทีมช่างผู้เชี่ยวชาญ และเครื่องมือที่ทันสมัย</p>
					  <p>- บริการช่วยเหลือฉุกเฉิน ครอบคลุมทั่วพื้นที่ภูเก็ต พังงา ท่านจะได้รับการช่วยเหลือได้อย่างรวดเร็ว</p>
					  <p>- ใส่ใจทุกรายละเอียดเรื่องรถยนต์</p>
					  <p>- บริการหลังการขาย ดูแลไม่ทิ้งกัน</p>
					</div>
				  </li>
				  <li class="accordion__item">
					<div class="accordion__itemTitleWrap">
					  <h3 class="accordion__itemTitle kanit">เติมลมยางเท่าไหร่ ?</h3>
					  <div class="accordion__itemIconWrap"><svg viewBox="0 0 24 24"><polyline fill="none" points="21,8.5 12,17.5 3,8.5 " stroke="#FFF" stroke-miterlimit="10" stroke-width="2"/></svg></div>
					</div>
					<div class="accordion__itemContent">
					  <p>- รถยนต์ขนาดเล็ก 25-30 ปอนด์</p>
					  <p>- รถยนต์ขนาดกลาง 30-35 ปอนด์</p>
					  <p>- รถกระบะ (ไม่บรรทุก) ไม่เกิน 65 ปอนด์</p>
					</div>
				  </li>
				  <li class="accordion__item">
					<div class="accordion__itemTitleWrap">
					  <h3 class="accordion__itemTitle kanit">ทำไมต้องเติมลมยางเเบบไนโตรเจน ?</h3>
					  <div class="accordion__itemIconWrap"><svg viewBox="0 0 24 24"><polyline fill="none" points="21,8.5 12,17.5 3,8.5 " stroke="#FFF" stroke-miterlimit="10" stroke-width="2"/></svg></div>
					</div>
					<div class="accordion__itemContent">
					  <p>ไม่ต้องเติมลมยางบ่อย ๆ</p>
					  <p>ช่วยลดอัตราการระเบิดของยาง</p>
					  <p>รถวิ่งได้นุ่มขึ้น เกาะถนนได้ดี</p>
					  <p>ลดการสึกหรอของยาง</p>
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