<?php

namespace App\Http\Controllers\FrontendMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Validator;

use App\Model\ProductModel;
use App\Model\Tyreproduct;
use App\Model\BookingCovid;

class BookingController extends Controller
{
    public function bookingOtaniCovid19() {
        $date = Carbon::now()->format('d/m/Y');
        return view('newSystem/frontendMain/booking/booking-covid/booking-otani/index')->with('date',$date);
    }

    public function otaniCovid19() {
        $ek1000_id = ProductModel::where('model',"EK1000")->value('id');
        $mk2000_id = ProductModel::where('model',"MK2000")->value('id');
        $kc2000_id = ProductModel::where('model',"KC2000")->value('id');
        $sa1000_id = ProductModel::where('model',"SA1000")->value('id');
        $mk1000_id = ProductModel::where('model',"MK1000")->value('id');
        $bm1000_id = ProductModel::where('model',"BM1000")->value('id');
        $sa2000_id = ProductModel::where('model',"SA2000")->value('id');

        $ek1000s = Tyreproduct::where('model_id',$ek1000_id)
                              ->orderBy('diameter','asc')
                              ->orderBy('width','asc')
                              ->orderBy('price','asc')->get();
        $mk2000s = Tyreproduct::where('model_id',$mk2000_id)
                              ->orderBy('diameter','asc')
                              ->orderBy('width','asc')
                              ->orderBy('price','asc')->get();
        $kc2000s = Tyreproduct::where('model_id',$kc2000_id)
                              ->orderBy('diameter','asc')
                              ->orderBy('width','asc')
                              ->orderBy('price','asc')->get();
        $sa1000s = Tyreproduct::where('model_id',$sa1000_id)
                              ->orderBy('diameter','asc')
                              ->orderBy('width','asc')
                              ->orderBy('price','asc')->get();
        $bm1000s = Tyreproduct::where('model_id',$bm1000_id)
                              ->orderBy('diameter','asc')
                              ->orderBy('width','asc')
                              ->orderBy('price','asc')->get();                  
        $sa2000s = Tyreproduct::where('model_id',$sa2000_id)
                              ->orderBy('diameter','asc')
                              ->orderBy('width','asc')
                              ->orderBy('price','asc')->get();
        return view('newSystem/frontendMain/booking/booking-covid/booking-otani/otani')->with('ek1000s',$ek1000s)
                                                                                       ->with('mk2000s',$mk2000s)
                                                                                       ->with('kc2000s',$kc2000s)
                                                                                       ->with('sa1000s',$sa1000s)
                                                                                       ->with('bm1000s',$bm1000s)
                                                                                       ->with('sa2000s',$sa2000s);
    }

    public function bookingOtaniCovid19Detail($model_id,$width,$ratio,$diameter,$price) {
        $date = Carbon::now()->format('d/m/Y');
        $expire = "30/09/2020";
        return view('newSystem/frontendMain/booking/booking-covid/booking-otani/booking-detail')->with('date',$date)
                                                                                                ->with('expire',$expire)
                                                                                                ->with('model_id',$model_id)
                                                                                                ->with('width',$width)
                                                                                                ->with('ratio',$ratio)
                                                                                                ->with('diameter',$diameter)
                                                                                                ->with('price',$price);
    }

    public function bookingOtaniCovid19Post(Request $request) {
    $validator = Validator::make($request->all(), $this->rules_bookingCovid19Post(), $this->messages_bookingCovid19Post());
    if($validator->passes()) {
        $booking = $request->all();
        $booking = BookingCovid::create($booking);
        $booking->save();

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code .= $characters[rand(0, $charactersLength - 1)];
        }

        $booking->code = $code;
        $booking->save();

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
            $image->move('image_upload/booking_covid_19/', $filename);
            $path = 'image_upload/'.$filename;
            $booking->image = $filename;
            $booking->save();
        }
        $booking->save();

        $model = $request->get('model');
        $size = $request->get('size');
        $price = $request->get('price');
        $name = $request->get('name');
        $surname = $request->get('surname');
        $service = $request->get('service');
        $carnumber = $request->get('carnumber');
        $carbrand = $request->get('carbrand');
        $carmodel = $request->get('carmodel');
        $carcolor = $request->get('carcolor');
        
        return view('newSystem/frontendMain/booking/booking-covid/booking-otani/booking-success')->with('code',$code)
                                                                                                 ->with('model',$model)
                                                                                                 ->with('size',$size)
                                                                                                 ->with('price',$price)
                                                                                                 ->with('name',$name)
                                                                                                 ->with('surname',$surname)
                                                                                                 ->with('service',$service)
                                                                                                 ->with('carnumber',$carnumber)
                                                                                                 ->with('carbrand',$carbrand)
                                                                                                 ->with('carmodel',$carmodel)
                                                                                                 ->with('carcolor',$carcolor);
    }
        else {
            $request->session()->flash('alert-danger', 'ลงทะเบียนไม่สำเร็จ กรุณากรอกข้อมูลให้ถูกต้องครบถ้วน');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function bookingMichelinCovid19() {
        $date = Carbon::now()->format('d/m/Y');
        return view('newSystem/frontendMain/booking/booking-covid/booking-michelin/index')->with('date',$date);
    }

    public function michelinCovid19() {
        $agilis_id = ProductModel::where('model',"AGILIS 3")->value('id');
        $xm2_id = ProductModel::where('model',"ENERGY XM2+")->value('id');
        $primacy4_id = ProductModel::where('model',"PRIMACY 4")->value('id');
        $pilotsport4_id = ProductModel::where('model',"PILOT SPORT 4")->value('id');

        $agiliss = Tyreproduct::where('model_id',$agilis_id)
                              ->orderBy('diameter','asc')
                              ->orderBy('width','asc')
                              ->orderBy('price','asc')->get();
        $xm2s = Tyreproduct::where('model_id',$xm2_id)
                           ->orderBy('diameter','asc')
                           ->orderBy('width','asc')
                           ->orderBy('price','asc')->get();
        $primacy4s = Tyreproduct::where('model_id',$primacy4_id)
                                ->orderBy('diameter','asc')
                                ->orderBy('width','asc')
                                ->orderBy('price','asc')->get();
        $pilotsport4s = Tyreproduct::where('model_id',$pilotsport4_id)
                                    ->orderBy('diameter','asc')
                                    ->orderBy('width','asc')
                                    ->orderBy('price','asc')->get();
        return view('newSystem/frontendMain/booking/booking-covid/booking-michelin/michelin')->with('agiliss',$agiliss)
                                                                                             ->with('xm2s',$xm2s)
                                                                                             ->with('primacy4s',$primacy4s)
                                                                                             ->with('pilotsport4s',$pilotsport4s);
    }

    public function bookingMichelinCovid19Detail($model_id,$width,$ratio,$diameter,$price) {
        $date = Carbon::now()->format('d/m/Y');
        $expire = "30/09/2020";
        return view('newSystem/frontendMain/booking/booking-covid/booking-michelin/booking-detail')->with('date',$date)
                                                                                                   ->with('expire',$expire)
                                                                                                   ->with('model_id',$model_id)
                                                                                                   ->with('width',$width)
                                                                                                   ->with('ratio',$ratio)
                                                                                                   ->with('diameter',$diameter)
                                                                                                   ->with('price',$price);
    }

    public function bookingMichelinCovid19Post(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_bookingCovid19Post(), $this->messages_bookingCovid19Post());
        if($validator->passes()) {
            $booking = $request->all();
            $booking = BookingCovid::create($booking);
            $booking->save();
    
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $code = '';
            for ($i = 0; $i < 6; $i++) {
                $code .= $characters[rand(0, $charactersLength - 1)];
            }
    
            $booking->code = $code;
            $booking->save();
    
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/booking_covid_19/', $filename);
                $path = 'image_upload/'.$filename;
                $booking->image = $filename;
                $booking->save();
            }
            $booking->save();
    
            $model = $request->get('model');
            $size = $request->get('size');
            $price = $request->get('price');
            $name = $request->get('name');
            $surname = $request->get('surname');
            $service = $request->get('service');
            $carnumber = $request->get('carnumber');
            $carbrand = $request->get('carbrand');
            $carmodel = $request->get('carmodel');
            $carcolor = $request->get('carcolor');
            $sumTotal = $request->get('sumTotal');
            
            return view('newSystem/frontendMain/booking/booking-covid/booking-michelin/booking-success')->with('code',$code)
                                                                                                        ->with('model',$model)
                                                                                                        ->with('size',$size)
                                                                                                        ->with('price',$price)
                                                                                                        ->with('name',$name)
                                                                                                        ->with('surname',$surname)
                                                                                                        ->with('service',$service)
                                                                                                        ->with('carnumber',$carnumber)
                                                                                                        ->with('carbrand',$carbrand)
                                                                                                        ->with('carmodel',$carmodel)
                                                                                                        ->with('carcolor',$carcolor)
                                                                                                        ->with('sumTotal',$sumTotal);
        }
        else {
                $request->session()->flash('alert-danger', 'ลงทะเบียนไม่สำเร็จ กรุณากรอกข้อมูลให้ถูกต้องครบถ้วน');
                return back()->withErrors($validator)->withInput();
        }
    }

    public function bookingBFCovid19() {
        $date = Carbon::now()->format('d/m/Y');
        return view('newSystem/frontendMain/booking/booking-covid/booking-bf/index')->with('date',$date);
    }

    public function BFCovid19() {
        $drive_id = ProductModel::where('model',"TA Drive")->value('id');
        $suv_id = ProductModel::where('model',"TA SUV")->value('id');

        $drives = Tyreproduct::where('model_id',$drive_id)
                             ->orderBy('diameter','asc')
                             ->orderBy('width','asc')
                             ->orderBy('price','asc')->get();
        $suvs = Tyreproduct::where('model_id',$suv_id)
                           ->orderBy('diameter','asc')
                           ->orderBy('width','asc')
                           ->orderBy('price','asc')->get();
        return view('newSystem/frontendMain/booking/booking-covid/booking-bf/bf')->with('drives',$drives)
                                                                                 ->with('suvs',$suvs);
    }

    public function bookingBFCovid19Detail($model_id,$width,$ratio,$diameter,$price) {
        $date = Carbon::now()->format('d/m/Y');
        $expire = "30/09/2020";
        return view('newSystem/frontendMain/booking/booking-covid/booking-bf/booking-detail')->with('date',$date)
                                                                                             ->with('expire',$expire)
                                                                                             ->with('model_id',$model_id)
                                                                                             ->with('width',$width)
                                                                                             ->with('ratio',$ratio)
                                                                                             ->with('diameter',$diameter)
                                                                                             ->with('price',$price);
    }

    public function bookingBFCovid19Post(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_bookingCovid19Post(), $this->messages_bookingCovid19Post());
        if($validator->passes()) {
            $booking = $request->all();
            $booking = BookingCovid::create($booking);
            $booking->save();
    
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $code = '';
            for ($i = 0; $i < 6; $i++) {
                $code .= $characters[rand(0, $charactersLength - 1)];
            }
    
            $booking->code = $code;
            $booking->save();
    
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/booking_covid_19/', $filename);
                $path = 'image_upload/'.$filename;
                $booking->image = $filename;
                $booking->save();
            }
            $booking->save();
    
            $model = $request->get('model');
            $size = $request->get('size');
            $price = $request->get('price');
            $name = $request->get('name');
            $surname = $request->get('surname');
            $service = $request->get('service');
            $carnumber = $request->get('carnumber');
            $carbrand = $request->get('carbrand');
            $carmodel = $request->get('carmodel');
            $carcolor = $request->get('carcolor');
            $sumTotal = $request->get('sumTotal');
            
            return view('newSystem/frontendMain/booking/booking-covid/booking-bf/booking-success')->with('code',$code)
                                                                                                  ->with('model',$model)
                                                                                                  ->with('size',$size)
                                                                                                  ->with('price',$price)
                                                                                                  ->with('name',$name)
                                                                                                  ->with('surname',$surname)
                                                                                                  ->with('service',$service)
                                                                                                  ->with('carnumber',$carnumber)
                                                                                                  ->with('carbrand',$carbrand)
                                                                                                  ->with('carmodel',$carmodel)
                                                                                                  ->with('carcolor',$carcolor)
                                                                                                  ->with('sumTotal',$sumTotal);
        }
        else {
                $request->session()->flash('alert-danger', 'ลงทะเบียนไม่สำเร็จ กรุณากรอกข้อมูลให้ถูกต้องครบถ้วน');
                return back()->withErrors($validator)->withInput();
        }
    }

    public function rules_bookingCovid19Post() {
        return [
            'service' => 'required',
            'card_id' => 'required|unique:booking_covids',
            'name' => 'required',
            'surname' => 'required',
            'tel' => 'required',
            'bday' => 'required',
            'address' => 'required',
            'district' => 'required',
            'amphoe' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'image' => 'required',
            'carnumber' => 'required|unique:booking_covids',
            'carbrand' => 'required',
            'carmodel' => 'required',
            'carcolor' => 'required',
        ];
    }

    public function messages_bookingCovid19Post() {
        return [
            'service.required' => 'กรุณาเลือกร้านตัวแทนเปลี่ยนยางรถยนต์',
            'card_id.required' => 'กรุณากรอกหมายเลขบัตรประชาชน',
            'card_id.unique' => 'หมายเลขบัตรประชาชนนี้ลงทะเบียนรับสิทธิ์แล้ว',
            'name.required' => 'กรุณากรอกชื่อ ตามบัตรประชาชน',
            'surname.required' => 'กรุณากรอกนามสกุล ตามบัตรประชาชน',
            'tel.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'bday.required' => 'กรุณากรอก วัน/เดือน/ปีเกิด',
            'address.required' => 'กรุณากรอกที่อยู่',
            'district.required' => 'กรุณากรอกตำบล',
            'amphoe.required' => 'กรุณากรอกอำเภอ',
            'province.required' => 'กรุณากรอกจังหวัด',
            'zipcode.required' => 'กรุณากรอกรหัสไปรษณีย์',
            'image.required' => 'กรุณาแนบไฟล์รูปภาพรถที่ลงทะเบียนจองสิทธิ์',
            'carnumber.required' => 'กรุณากรอกป้ายทะเบียน',
            'carnumber.unique' => 'ป้ายทะเบียนนี้ลงทะเบียนรับสิทธิ์แล้ว',
            'carbrand.required' => 'กรุณากรอกยี่ห้อรถ',
            'carmodel.required' => 'กรุณากรอกรุ่นรถ',
            'carcolor.required' => 'กรุณากรอกสีรถ',
        ];
    }
}
