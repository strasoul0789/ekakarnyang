<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Tyre;
use App\Model\Brand;
use App\Model\Model_;
use App\Model\CarBrand;
use App\Model\CarModel;
use App\Model\EngineOil;
use App\Model\Brake;

class StaffController extends Controller
{
    public function __construct(){
        $this->middleware('auth:staff');
    }

    public function dataTyre(Request $request) {
        $NUM_PAGE = 20;
        $brands = Brand::where('status',"เปิด")->get();
        $tyres = Tyre::where('status','เปิด')->orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')->orderBy('brand_id','asc')->orderBy('model_id','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/tyre/data-tyre')->with('NUM_PAGE',$NUM_PAGE)
                                                   ->with('page',$page)
                                                   ->with('brands',$brands)
                                                   ->with('tyres',$tyres);
    }

    public function dataTyreBrand(Request $request, $brand) {
        $NUM_PAGE = 20;
        $brand_id = Brand::where('brand',$brand)->where('status',"เปิด")->value('id');
        $models = Model_::where('brand_id',$brand_id)->where('runflat',"ไม่ใช่")->where('status',"เปิด")->get();
        $model_runflats = Model_::where('brand_id',$brand_id)->where('runflat',"ใช่")->where('status',"เปิด")->get();
        $model_sedans = Model_::where('brand_id',$brand_id)->where('runflat',"ไม่ใช่")->where('type_tyre','ยางรถเก๋ง รถสปอร์ต')->where('status',"เปิด")->get();
        $model_suvs = Model_::where('brand_id',$brand_id)->where('runflat',"ไม่ใช่")->where('type_tyre','ยาง SUV รถอเนกประสงค์')->where('status',"เปิด")->get();
        $model_pickups = Model_::where('brand_id',$brand_id)->where('runflat',"ไม่ใช่")->where('type_tyre','ยางรถกระบะ รถตู้')->where('status',"เปิด")->get();
        $tyres = Tyre::where('status','เปิด')->where('brand_id',$brand_id)->orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/tyre/data-tyre-brand')->with('NUM_PAGE',$NUM_PAGE)
                                                         ->with('page',$page)
                                                         ->with('models',$models)
                                                         ->with('model_runflats',$model_runflats)
                                                         ->with('model_sedans',$model_sedans)
                                                         ->with('model_suvs',$model_suvs)
                                                         ->with('model_pickups',$model_pickups)
                                                         ->with('brand',$brand)
                                                         ->with('tyres',$tyres);
    }

    public function dataTyreModel(Request $request, $brand, $model) {
        $NUM_PAGE = 20;
        $brand_id = Brand::where('brand',$brand)->where('status',"เปิด")->value('id');
        $model_id = Model_::where('model',$model)->where('status',"เปิด")->value('id');
        $image = Model_::where('model',$model)->where('status',"เปิด")->value('image');
        $models = Model_::where('brand_id',$brand_id)->where('status',"เปิด")->get();
        $tyres = Tyre::where('status','เปิด')
                     ->where('brand_id',$brand_id)
                     ->where('model_id',$model_id)
                     ->orderBy('diameter','asc')
                     ->orderBy('width','asc')
                     ->orderBy('ratio','asc')
                     ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/tyre/data-tyre-model')->with('NUM_PAGE',$NUM_PAGE)
                                                         ->with('page',$page)
                                                         ->with('models',$models)
                                                         ->with('brand',$brand)
                                                         ->with('model',$model)
                                                         ->with('tyres',$tyres)
                                                         ->with('image',$image);
    }

    public function dataTyreModelSize(Request $request, $brand, $model, $width, $ratio, $diameter) {
        $NUM_PAGE = 20;
        $brand_id = Brand::where('brand',$brand)->where('status',"เปิด")->value('id');
        $model_id = Model_::where('model',$model)->where('status',"เปิด")->value('id');
        $models = Model_::where('brand_id',$brand_id)->where('status',"เปิด")->get();
        $tyres = Tyre::where('status','เปิด')
                     ->where('brand_id',$brand_id)
                     ->where('model_id',$model_id)
                     ->where('width',$width)
                     ->where('ratio',$ratio)
                     ->where('diameter',$diameter)
                     ->orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')
                     ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/tyre/data-tyre-model-size')->with('NUM_PAGE',$NUM_PAGE)
                                                              ->with('page',$page)
                                                              ->with('models',$models)
                                                              ->with('brand',$brand)
                                                              ->with('model',$model)
                                                              ->with('tyres',$tyres)           
                                                              ->with('width',$width)         
                                                              ->with('ratio',$ratio)         
                                                              ->with('diameter',$diameter);           
    }

    public function dataEngineOil(Request $request) {
        $NUM_PAGE = 20;
        $brands = CarBrand::where('status','เปิด')->get();
        $engine_oils = EngineOil::where('status','เปิด')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/engine-oil/data-engine-oil')->with('NUM_PAGE',$NUM_PAGE)
                                                               ->with('page',$page)
                                                               ->with('brands',$brands)
                                                               ->with('engine_oils',$engine_oils);
    }

    public function dataEngineOilBrand(Request $request, $brand) {
        $NUM_PAGE = 20;
        $brand_id = CarBrand::where('brand',$brand)->where('status','เปิด')->value('id');
        $models = CarModel::where('brand_id',$brand_id)->where('status','เปิด')->get();
        $engine_oils = EngineOil::where('status','เปิด')->where('brand_id',$brand_id)->paginate($NUM_PAGE);
        $model_sedans = CarModel::where('brand_id',$brand_id)->where('type_car','รถเก๋ง รถสปอร์ต')->where('status',"เปิด")->get();
        $model_suvs = CarModel::where('brand_id',$brand_id)->where('type_car','รถ SUV รถอเนกประสงค์')->where('status',"เปิด")->get();
        $model_pickups = CarModel::where('brand_id',$brand_id)->where('type_car','รถกระบะ รถตู้')->where('status',"เปิด")->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/engine-oil/data-engine-oil-brand')->with('NUM_PAGE',$NUM_PAGE)
                                                                     ->with('page',$page)
                                                                     ->with('models',$models)
                                                                     ->with('brand',$brand)
                                                                     ->with('engine_oils',$engine_oils)
                                                                     ->with('model_sedans',$model_sedans)
                                                                     ->with('model_suvs',$model_suvs)
                                                                     ->with('model_pickups',$model_pickups);
    }

    public function dataEngineOilModel(Request $request, $brand, $model) {
        $NUM_PAGE = 20;
        $brand_id = CarBrand::where('brand',$brand)->where('status','เปิด')->value('id');
        $model_id = CarModel::where('model',$model)->where('status','เปิด')->value('id');
        $models = CarModel::where('brand_id',$brand_id)->where('status','เปิด')->get();
        $engine_oils = EngineOil::where('status','เปิด')
                                ->where('brand_id',$brand_id)
                                ->where('model_id',$model_id)
                                ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/engine-oil/data-engine-oil-model')->with('NUM_PAGE',$NUM_PAGE)
                                                                     ->with('page',$page)
                                                                     ->with('models',$models)
                                                                     ->with('brand',$brand)
                                                                     ->with('model',$model)
                                                                     ->with('engine_oils',$engine_oils);
    }

    public function dataBrake(Request $request) {
        $NUM_PAGE = 20;
        $brands = CarBrand::where('status','เปิด')->get();
        $brakes = Brake::where('status','เปิด')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/brake/data-brake')->with('NUM_PAGE',$NUM_PAGE)
                                                     ->with('page',$page)
                                                     ->with('brands',$brands)
                                                     ->with('brakes',$brakes);
    }

    public function dataBrakeBrand(Request $request, $brand) {
        $NUM_PAGE = 20;
        $brand_id = CarBrand::where('brand',$brand)->where('status','เปิด')->value('id');
        $models = CarModel::where('brand_id',$brand_id)->where('status','เปิด')->get();
        $brakes = Brake::where('status','เปิด')->where('brand_id',$brand_id)->paginate($NUM_PAGE);
        $model_sedans = CarModel::where('brand_id',$brand_id)->where('type_car','รถเก๋ง รถสปอร์ต')->where('status',"เปิด")->get();
        $model_suvs = CarModel::where('brand_id',$brand_id)->where('type_car','รถ SUV รถอเนกประสงค์')->where('status',"เปิด")->get();
        $model_pickups = CarModel::where('brand_id',$brand_id)->where('type_car','รถกระบะ รถตู้')->where('status',"เปิด")->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/brake/data-brake-brand')->with('NUM_PAGE',$NUM_PAGE)
                                                           ->with('page',$page)
                                                           ->with('models',$models)
                                                           ->with('brand',$brand)
                                                           ->with('brakes',$brakes)
                                                           ->with('model_sedans',$model_sedans)
                                                           ->with('model_suvs',$model_suvs)
                                                           ->with('model_pickups',$model_pickups);
    }

    public function dataBrakeModel(Request $request, $brand, $model) {
        $NUM_PAGE = 20;
        $brand_id = CarBrand::where('brand',$brand)->where('status','เปิด')->value('id');
        $model_id = CarModel::where('model',$model)->where('status','เปิด')->value('id');
        $models = CarModel::where('brand_id',$brand_id)->where('status','เปิด')->get();
        $brakes = Brake::where('status','เปิด')
                       ->where('brand_id',$brand_id)
                       ->where('model_id',$model_id)
                       ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/brake/data-brake-model')->with('NUM_PAGE',$NUM_PAGE)
                                                           ->with('page',$page)
                                                           ->with('models',$models)
                                                           ->with('brand',$brand)
                                                           ->with('model',$model)
                                                           ->with('brakes',$brakes);
    }

}
