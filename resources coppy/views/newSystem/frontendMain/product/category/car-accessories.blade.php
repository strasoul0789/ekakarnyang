@extends("newSystem/frontendMain/layouts/template/template")
<title>ใบปัดน้ำฝน</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/lightslider.css')}}">
<script type="text/javascript" src="{{asset('js/halkaBox.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/halkaBox.min.css')}}">
<script type="text/javascript" src="{{asset('js/image-lightbox.js')}}"></script>
@section("content")
<div class="container bootstrap snippet">
<br>
    <div class="row">
        {{-- <div class="panel"> --}}
            {{-- <div class="panel-body"> --}}
                <!-- Wiper -->
                
                <div id="bendix" class="container">
                    <h1 class="kanit" style="text-align:center; color:#00902b;">ใบปัดน้ำฝน</h1>
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4">
                            <a href="{{url('/wiper/bosch')}}">
                                <picture>
                                    <source type="image/webp" srcset="{{ asset('/images/accessory/logo_bosch.webp')}}" class="img-responsive">
                                    <source type="image/png" srcset="{{ asset('/images/accessory/logo_bosch.png')}}" class="img-responsive">
                                    <img src="{{ asset('/images/accessory/logo_bosch.png')}}" class="img-responsive">
                                </picture>
                            </a>
                        </div>
                    </div>
                </div><br>  
                <!-- The end -->
            {{-- </div> --}}
        {{-- </div> --}}
    </div>
</div>
<script type="text/javascript" src="{{asset('js/lightslider.js')}}"></script>
@endsection