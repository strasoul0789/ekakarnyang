<link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css')}}">
@php
    $product_categories = DB::table('product_categories')->where('status','เปิด')->get();
    $service_categories = DB::table('service_categories')->where('status','เปิด')->get();
@endphp
<div style="margin-top:40px;">
	{{-- <picture>
        <source type="image/webp" srcset="{{ asset('/images/new-template/top-footer.webp')}}" alt="เอกการยาง ร้านยางรถยนต์ ภูเก็ต" class="img-responsive" width="100%">
        <source type="image/jpeg" srcset="{{ asset('/images/new-template/top-footer.jpg')}}" alt="เอกการยาง ร้านยางรถยนต์ ภูเก็ต" class="img-responsive" width="100%">
        <img src="{{ asset('/new-template/top-footer.jpg')}}" alt="เอกการยาง ร้านยางรถยนต์ ภูเก็ต" class="img-responsive" width="100%">
	</picture> --}}
	<!-- Footer -->
	<section id="footer">
		<div class="container" style="max-width: 1300px;">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-3 col-md-3">
					<h5>ยางรถยนต์</h5>
					<ul class="list-unstyled quick-links kanit">
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('products/tyres#HAIYADUN')}}">ยาง HAIYADUN</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('products/tyres#samyang')}}">ยาง samyang</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('products/tyres#OTANI')}}">ยาง OTANI</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('products/tyres#YOKOHAMA')}}">ยาง YOKOHAMA</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('products/tyres#MAXXIS')}}">ยาง MAXXIS</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('products/tyres#RAIDEN')}}">ยาง RAIDEN</a>
								</h4>
							</a>
						</li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3">
					<h5>ยางรถยนต์</h5>
					<ul class="list-unstyled quick-links kanit">
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('products/tyres#TOYO')}}">ยาง TOYO</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('products/tyres#NITTO')}}">ยาง NITTO</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('products/tyres#GOODYEAR')}}">ยาง GoodYear</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('products/tyres#BRIDGESTONE')}}">ยาง Bridgestone</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('products/tyres#KENDA')}}">ยาง KENDA</a>
								</h4>
							</a>
						</li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3">
					<h5>ล้อแม็กซ์</h5>
					<ul class="list-unstyled quick-links kanit">
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('/product-max/LENSO')}}">LENSO</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('/product-max/FUEL')}}">FUEL</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('/product-max/KMC')}}">KMC</a>
								</h4>
							</a>
						</li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3">
					<h5>สินค้า</h5>
					<ul class="list-unstyled quick-links kanit">
						@foreach ($product_categories as $product_category => $value)
							<li>
								<a href="javascript:void();">
									<h4>
										<i class="fa fa-angle-double-right"></i>
										<a itemprop="url" href="{{url('/products')}}/{{$value->name_eng}}">{{$value->name}}</a>
									</h4>
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
			<hr style="border-top:2px solid #fff;">	
			<div class="row text-center text-xs-center text-sm-left text-md-left" style="margin-top: 40px;">
				<div class="col-xs-12 col-sm-3 col-md-3">
					<h5>บริการ</h5>
					<ul class="list-unstyled quick-links kanit">
						@foreach ($service_categories as $service_category => $value)
							@php
                                $article_id = DB::table('article_services')->where('service',$value->name)->value('id');
                            @endphp
							<li>
								<a href="javascript:void();">
									<h4>
										<i class="fa fa-angle-double-right"></i>
										<a href="{{url('/service-article/detail')}}/{{$article_id}}">{{$value->name}}</a>
									</h4>
								</a>
							</li>
						@endforeach
					</ul>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3">
					<h5>ติดต่อเรา</h5>
					<ul class="list-unstyled quick-links kanit">
						<li>
							<a itemprop="telephone" href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
										076 609 779
										ติดต่อ เอกการยาง
								</h4>
							</a>
						</li>
						<li>
							<a itemprop="telephone" href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
										092 108 4444
										สาขาบายพาสภูเก็ต
								</h4>
							</a>
						</li>
						<li>
							<a itemprop="telephone" href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
										076 328 001
										สาขาถลาง (ทางเข้าสนามบิน)
								</h4>
							</a>
						</li>
						<li>
							<a itemprop="telephone" href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
										061 542 6190
										สาขาเจ้าฟ้าตะวันออก
								</h4>
							</a>
						</li>
						<li>
							<a itemprop="telephone" href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
										064 941 6664
										สาขาไทวัสดุ (ท่าเรือ)
								</h4>
							</a>
						</li>
						<li>
							<a itemprop="telephone" href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
										076 581 325
										สาขาโคกกลอย
								</h4>
							</a>
						</li>
						<li>
							<a itemprop="telephone" href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
										098 010 4450
										สาขาเมืองพังงา
								</h4>
							</a>
						</li>
						<li>
							<a itemprop="telephone" href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
										Facebook : <a title="facebook: เอกการยาง" href="https://www.facebook.com/Eakkarnyang" target="_blank">เอกการยาง</a>
								</h4>
							</a>
						</li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3">
					<h5 itemprop="name">เอกการยาง</h5>
					<ul class="list-unstyled quick-links kanit">
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('/question')}}">คำถามที่พบบ่อย</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('/aboutus')}}">เกี่ยวกับเรา</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('/article')}}">สาระน่ารู้..จากเอกการยาง</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('/cargallery')}}">Gallery</a>
								</h4>
							</a>
						</li>
					</ul>
				</div>

				<div class="col-xs-12 col-sm-3 col-md-3">
					<h5>ระบบเอกการยาง</h5>
					<ul class="list-unstyled quick-links kanit">
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('https://www.wholesale.eakkarnyang.com/customer/login')}}" target="_blank"><i class="fa fa-shopping-cart"></i> Wholesale ค้าส่ง</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('https://www.eakkarnyang.com/staff/login')}}" target="_blank"><i class="fa fa-file-text"></i> เว็บราคาขายสินค้า</a>
								</h4>
							</a>
						</li>
						<li>
							<a href="javascript:void();">
								<h4>
									<i class="fa fa-angle-double-right"></i>
									<a href="{{url('https://www.staff.eakkarnyang.com/staff/login')}}" target="_blank"><i class="fa fa-user"></i> MY EAKKARNYANG</a>
								</h4>
							</a>
						</li>
					</ul>
					<script src="https://www.counters-free.net/count/1amu"></script>
				</div>
			</div>
		</div>
	</section>
</div>