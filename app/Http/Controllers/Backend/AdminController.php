<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Input;
use Response;
use Validator;

use App\Model\Brand;
use App\Model\Model_;
use App\Model\Tyre;
use App\Model\TyreSalePrice;
use App\Model\TyreCostPrice;
use App\Model\CarBrand;
use App\Model\CarModel;
use App\Model\EngineOil;
use App\Model\EngineOilSalePrice;
use App\Model\Brake;
use App\Model\BrakeSalePrice;
use App\Model\StaffStatistic;
use App\Model\RandomCode;

class AdminController extends Controller
{   
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function randomPost(Request $request) {

        for($i = 0; $i < 100; $i++){
            $code = str_random(4);

            $random = new RandomCode;
            $random->code = $code;
            $random->save();
        }
      
    }
    
    public function ajax_brand(){
        $cat_id = Input::get('cat_id');
    
        $subcategories = Model_::where('brand_id', '=' ,$cat_id)->get();
        return Response::json($subcategories);
    }

    public function ajax_carbrand(){
        $cat_id = Input::get('cat_id');
    
        $subcategories = CarModel::where('brand_id', '=' ,$cat_id)->get();
        return Response::json($subcategories);
    }

    public function tyre(Request $request) {
        $NUM_PAGE = 20;
        $brands = Brand::get();
        $tyres = Tyre::orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')->orderBy('brand_id','asc')->orderBy('model_id','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/data-tyre')->with('NUM_PAGE',$NUM_PAGE)
                                                   ->with('page',$page)
                                                   ->with('tyres',$tyres)
                                                   ->with('brands',$brands);
    }

    public function createTyre() {
        $brands = Brand::get();
        return view('backend/admin/tyre/create-tyre')->with('brands',$brands);
        
    }

    public function createTyrePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_tyre(), $this->messages_tyre());
        if($validator->passes()) {
            $tyre = $request->all();
            $tyre = Tyre::create($tyre);
            
            $request->session()->flash('alert-success', 'เพิ่มรายการยางรถยนต์สำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'เพิ่มรายการยางรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteTyre($id) {
        $tyre = Tyre::findOrFail($id);
        $sale_price = TyreSalePrice::where('tyre_id',$id)->delete();
        $cost_price = TyreCostPrice::where('tyre_id',$id)->delete();
        $tyre->delete();
        return redirect()->action('Backend\AdminController@tyre');
    }

    public function editTyre($id) {
        $brands = Brand::get();
        $tyre = Tyre::findOrFail($id);
        return view('backend/admin/tyre/edit-tyre')->with('brands',$brands)
                                                   ->with('tyre',$tyre);
    }

    public function editTyrePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_tyre(), $this->messages_tyre());
        if($validator->passes()) {
            $id = $request->get('id');
            $tyre = Tyre::findOrFail($id);
            $tyre->update($request->all());
            $request->session()->flash('alert-success', 'แก้ไขรายการยางรถยนต์สำเร็จ');
            return redirect()->action('Backend\AdminController@tyre');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขรายการยางรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createBrand(Request $request) {
        $NUM_PAGE = 10;
        $brands = Brand::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/create-brand')->with('NUM_PAGE',$NUM_PAGE)
                                                      ->with('page',$page)
                                                      ->with('brands',$brands);
                                                    
    }

    public function createBrandPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_brand(), $this->messages_brand());
        if($validator->passes()) {
            $brand = $request->all();
            $brand = Brand::create($brand);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_brand_tyre/', $filename);
                $path = 'image_upload/image_brand_tyre/'.$filename;
                $brand->image = $filename;
                $brand->save();
            }
            $request->session()->flash('alert-success', 'เพิ่มยี่ห้อยางรถยนต์สำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'เพิ่มยี่ห้อยางรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteBrand($id) {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return back();
    }

    public function editBrand($id) {
        $brand = Brand::findOrFail($id);
        return view('backend/admin/tyre/edit-brand')->with('brand',$brand);
    }

    public function editBrandPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_brand(), $this->messages_brand());
        if($validator->passes()) {
            $id = $request->get('id');
            $brand = Brand::findOrFail($id);
            $brand->update($request->all());
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_brand_tyre/', $filename);
                $path = 'image_upload/image_brand_tyre/'.$filename;
                $brand->image = $filename;
                $brand->save();
            }   
            $request->session()->flash('alert-success', 'แก้ไขยี่ห้อยางรถยนต์สำเร็จ');
            return redirect()->action('Backend\AdminController@createBrand');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขยี่ห้อยางรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createModel(Request $request) {
        $NUM_PAGE = 20;
        $brands = Brand::get();
        $models = Model_::orderBy('brand_id','asc')->orderBy('id','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/create-model')->with('NUM_PAGE',$NUM_PAGE)
                                                      ->with('page',$page)
                                                      ->with('brands',$brands)
                                                      ->with('models',$models);
    }

    public function createModelPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_model(), $this->messages_model());
        if($validator->passes()) {
            $model = $request->all();
            $model = Model_::create($model);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_model_tyre/', $filename);
                $path = 'image_upload/image_model_tyre/'.$filename;
                $model->image = $filename;
                $model->save();
            }
            $request->session()->flash('alert-success', 'เพิ่มรุ่นยางรถยนต์สำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'เพิ่มรุ่นยางรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteModel($id) {
        $model = Model_::findOrFail($id);
        $model->delete();
        return back();
    }

    public function editModel($id) {
        $brands = Brand::get();
        $model = Model_::findOrFail($id);
        return view('backend/admin/tyre/edit-model')->with('brands',$brands)
                                                    ->with('model',$model);
    }

    public function editModelPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_model(), $this->messages_model());
        if($validator->passes()) {
            $id = $request->get('id');
            $model = Model_::findOrFail($id);
            $model->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_model_tyre/', $filename);
                $path = 'image_upload/image_model_tyre/'.$filename;
                $model = Model_::findOrFail($id);
                $model->image = $filename;
                $model->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขรุ่นยางรถยนต์สำเร็จ');
            return redirect()->action('Backend\AdminController@createModel');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขรุ่นยางรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function tyrePrice(Request $request){
        $NUM_PAGE = 20;
        $brands = Brand::get();
        $tyres = Tyre::orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')->orderBy('id','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/price/tyre-sale-price')->with('NUM_PAGE',$NUM_PAGE)
                                                               ->with('page',$page)
                                                               ->with('tyres',$tyres)
                                                               ->with('brands',$brands);
    }

    public function editTyrePrice(Request $request){
        $validator = Validator::make($request->all(), $this->rules_tyrePrice(), $this->messages_tyrePrice());
        if($validator->passes()) {
            $tyre_price = $request->all();
            $tyre_price = TyreSalePrice::create($tyre_price); 
            $request->session()->flash('alert-success', 'อัพเดตราคายางรถยนต์สำเร็จ');
            return redirect()->action('Backend\AdminController@tyrePrice');
        }
        else {
            $request->session()->flash('alert-danger', 'อัพเดตราคายางรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function tyrePriceDetail(Request $request,$id){
        $NUM_PAGE = 20;
        $prices = TyreSalePrice::where('tyre_id',$id)->orderBy('id','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/price/tyre-sale-price-detail')->with('NUM_PAGE',$NUM_PAGE)
                                                                      ->with('page',$page)
                                                                      ->with('prices',$prices);
    }

    public function deleteTyrePrice($id){
        $tyre_price = TyreSalePrice::findOrFail($id);
        $tyre_price->delete();
        return back();
    }

    public function tyreCostPrice(Request $request){
        $NUM_PAGE = 20;
        $brands = Brand::get();
        $tyres = Tyre::orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')->orderBy('id','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/price/tyre-cost-price')->with('NUM_PAGE',$NUM_PAGE)
                                                               ->with('page',$page)
                                                               ->with('tyres',$tyres)
                                                               ->with('brands',$brands);
    }

    public function editTyreCostPrice(Request $request){
        $validator = Validator::make($request->all(), $this->rules_tyreCostPrice(), $this->messages_tyreCostPrice());
        if($validator->passes()) {
            $tyre_price = $request->all();
            $tyre_price = TyreCostPrice::create($tyre_price); 
            $request->session()->flash('alert-success', 'อัพเดตราคาต้นทุนยางรถยนต์สำเร็จ');
            return redirect()->action('Backend\AdminController@tyreCostPrice');
        }
        else {
            $request->session()->flash('alert-danger', 'อัพเดตราคาต้นทุนยางรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function tyreCostPriceDetail(Request $request,$id){
        $NUM_PAGE = 20;
        $prices = TyreCostPrice::where('tyre_id',$id)->orderBy('id','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/price/tyre-cost-price-detail')->with('NUM_PAGE',$NUM_PAGE)
                                                                      ->with('page',$page)
                                                                      ->with('prices',$prices);
    }

    public function deleteTyreCostPrice($id){
        $tyre_price = TyreCostPrice::findOrFail($id);
        $tyre_price->delete();
        return back();
    }

    public function createCarbrand(Request $request) {
        $NUM_PAGE = 20;
        $brands = CarBrand::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/brand/create-carbrand')->with('NUM_PAGE',$NUM_PAGE)
                                                          ->with('page',$page)
                                                          ->with('brands',$brands);
    }

    public function createCarbrandPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_Carbrand(), $this->messages_Carbrand());
        if($validator->passes()) {
            $brand = $request->all();
            $brand = CarBrand::create($brand);
            $request->session()->flash('alert-success', 'เพิ่มยี่ห้อรถยนต์สำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'เพิ่มยี่ห้อรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteCarbrand($id) {
        $brand = CarBrand::findOrFail($id);
        $brand->delete();
        return back();
    }

    public function editCarbrand($id) {
        $brand = CarBrand::findOrFail($id);
        return view('backend/admin/brand/edit-carbrand')->with('brand',$brand);
    }

    public function editCarbrandPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_Carbrand(), $this->messages_Carbrand());
        if($validator->passes()) {
            $id = $request->get('id');
            $brand = CarBrand::findOrFail($id);
            $brand->update($request->all());
            $request->session()->flash('alert-success', 'แก้ไขยี่ห้อรถยนต์สำเร็จ');
            return redirect()->action('Backend\AdminController@createCarbrand');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขยี่ห้อรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createCarmodel(Request $request) {
        $NUM_PAGE = 10;
        $brands = CarBrand::get();
        $models = CarModel::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/model_/create-carmodel')->with('NUM_PAGE',$NUM_PAGE)
                                                           ->with('page',$page)
                                                           ->with('models',$models)
                                                           ->with('brands',$brands);
    }

    public function createCarmodelPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_Carmodel(), $this->messages_Carmodel());
        if($validator->passes()) {
            $model = $request->all();
            $model = CarModel::create($model);
            $request->session()->flash('alert-success', 'เพิ่มรุ่นรถยนต์สำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'เพิ่มรุ่นรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteCarmodel($id) {
        $model = CarModel::findOrFail($id);
        $model->delete();
        return back();
    }

    public function editCarmodel($id) {
        $brands = CarBrand::get();
        $model = CarModel::findOrFail($id);
        return view('backend/admin/model_/edit-carmodel')->with('model',$model)
                                                         ->with('brands',$brands);
    }

    public function editCarmodelPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_Carmodel(), $this->messages_Carmodel());
        if($validator->passes()) {
            $id = $request->get('id');
            $model = CarModel::findOrFail($id);
            $model->update($request->all());
            $request->session()->flash('alert-success', 'แก้ไขรุ่นรถยนต์สำเร็จ');
            return redirect()->action('Backend\AdminController@createCarmodel');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขรุ่นรถยนต์ไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function engineOil(Request $request) {
        $NUM_PAGE = 10;
        $brands = CarBrand::get();
        $engine_oils = EngineOil::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/engine-oil/data-engine-oil')->with('NUM_PAGE',$NUM_PAGE)
                                                               ->with('page',$page)
                                                               ->with('engine_oils',$engine_oils)
                                                               ->with('brands',$brands);
    }

    public function createEngineOil(Request $request) {
        $brands = CarBrand::get();
        return view('backend/admin/engine-oil/create-engine-oil')->with('brands',$brands);
    }

    public function createEngineOilPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_EngineOil(), $this->messages_EngineOil());
        if($validator->passes()) {
            $engine_oil = $request->all();
            $engine_oil = EngineOil::create($engine_oil);
            $request->session()->flash('alert-success', 'เพิ่มรายการน้ำมันเครื่องสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'เพิ่มรายการน้ำมันเครื่องไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteEngineOil($id) {
        $engine_oil = EngineOil::findOrFail($id);
        $engine_oil->delete();
        return back();
    }

    public function editEngineOil($id) {
        $brands = CarBrand::get();
        $engine_oil = EngineOil::findOrFail($id);
        return view('backend/admin/engine-oil/edit-engine-oil')->with('brands',$brands)
                                                               ->with('engine_oil',$engine_oil);
    }

    public function editEngineOilPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_EngineOil(), $this->messages_EngineOil());
        if($validator->passes()) {
            $id = $request->get('id');
            $engine_oil = EngineOil::findOrFail($id);
            $engine_oil->update($request->all());
            $request->session()->flash('alert-success', 'แก้ไขรายการน้ำมันเครื่องสำเร็จ');
            return redirect()->action('Backend\AdminController@engineOil');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขรายการน้ำมันเครื่องไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function engineOilPrice(Request $request){
        $NUM_PAGE = 20;
        $engine_oils = EngineOil::orderBy('id','asc')->paginate($NUM_PAGE);
        $brands = CarBrand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/engine-oil/price/sale-price')->with('NUM_PAGE',$NUM_PAGE)
                                                                ->with('page',$page)
                                                                ->with('engine_oils',$engine_oils)
                                                                ->with('brands',$brands);
    }

    public function editEngineOilPrice(Request $request){
        $validator = Validator::make($request->all(), $this->rules_EngineOilPrice(), $this->messages_EngineOilPrice());
        if($validator->passes()) {
            $sale_price = $request->all();
            $sale_price = EngineOilSalePrice::create($sale_price); 
            $request->session()->flash('alert-success', 'อัพเดตราคาน้ำมันเครื่องสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'อัพเดตราคาน้ำมันเครื่องไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function engineOilPriceDetail(Request $request,$id){
        $NUM_PAGE = 20;
        $prices = EngineOilSalePrice::where('engine_oil_id',$id)->orderBy('id','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/engine-oil/price/sale-price-detail')->with('NUM_PAGE',$NUM_PAGE)
                                                                       ->with('page',$page)
                                                                       ->with('prices',$prices);
    }

    public function deleteEngineOilPrice($id){
        $sale_price = EngineOilSalePrice::findOrFail($id);
        $sale_price->delete();
        return back();
    }

    public function brake(Request $request) {
        $NUM_PAGE = 10;
        $brakes = Brake::paginate($NUM_PAGE);
        $brands = CarBrand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/brake/data-brake')->with('NUM_PAGE',$NUM_PAGE)
                                                     ->with('page',$page)
                                                     ->with('brakes',$brakes)
                                                     ->with('brands',$brands);
    }

    public function createBrake(Request $request) {
        $brands = CarBrand::get();
        return view('backend/admin/brake/create-brake')->with('brands',$brands);
    }

    public function createBrakePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_Brake(), $this->messages_Brake());
        if($validator->passes()) {
            $brake = $request->all();
            $brake = Brake::create($brake);
            $request->session()->flash('alert-success', 'เพิ่มรายการผ้าเบรกสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'เพิ่มรายการผ้าเบรกไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteBrake($id) {
        $brake = Brake::findOrFail($id);
        $brake->delete();
        return back();
    }

    public function editBrake($id) {
        $brands = CarBrand::get();
        $brake = Brake::findOrFail($id);
        return view('backend/admin/brake/edit-brake')->with('brands',$brands)
                                                               ->with('brake',$brake);
    }

    public function editBrakePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_Brake(), $this->messages_Brake());
        if($validator->passes()) {
            $id = $request->get('id');
            $brake = Brake::findOrFail($id);
            $brake->update($request->all());
            $request->session()->flash('alert-success', 'แก้ไขรายการผ้าเบรกสำเร็จ');
            return redirect()->action('Backend\AdminController@brake');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขรายการผ้าเบรกไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function brakePrice(Request $request){
        $NUM_PAGE = 20;
        $brakes = Brake::orderBy('id','asc')->paginate($NUM_PAGE);
        $brands = CarBrand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/brake/price/sale-price')->with('NUM_PAGE',$NUM_PAGE)
                                                           ->with('page',$page)
                                                           ->with('brakes',$brakes)
                                                           ->with('brands',$brands);
    }

    public function editBrakePrice(Request $request){
        $validator = Validator::make($request->all(), $this->rules_BrakePrice(), $this->messages_BrakePrice());
        if($validator->passes()) {
            $sale_price = $request->all();
            $sale_price = BrakeSalePrice::create($sale_price); 
            $request->session()->flash('alert-success', 'อัพเดตราคาผ้าเบรกสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'อัพเดตราคาผ้าเบรกไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function BrakePriceDetail(Request $request,$id){
        $NUM_PAGE = 20;
        $prices = BrakeSalePrice::where('brake_id',$id)->orderBy('id','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/brake/price/sale-price-detail')->with('NUM_PAGE',$NUM_PAGE)
                                                                  ->with('page',$page)
                                                                  ->with('prices',$prices);
    }

    public function deleteBrakePrice($id){
        $sale_price = BrakeSalePrice::findOrFail($id);
        $sale_price->delete();
        return back();
    }

    public function staffStatistic(Request $request){
        $NUM_PAGE = 20;
        $statistics = StaffStatistic::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('authStaff/staff-statistic')->with('NUM_PAGE',$NUM_PAGE)
                                                ->with('page',$page)
                                                ->with('statistics',$statistics);
    }

    public function rules_tyre() {
        return [
            'width' => 'required',
            'ratio' => 'required',
            'diameter' => 'required',
        ];
    }

    public function messages_tyre() {
        return [
            'width.required' => '(กรุณากรอกความกว้างของยาง)',
            'ratio.required' => '(กรุณากรอกอัตราส่วนของยาง)',
            'diameter.required' => '(กรุณากรอกเส้นผ่านศูนย์กลาง)',
        ];
    }

    public function rules_brand() {
        return [
            'brand' => 'required',
        ];
    }

    public function messages_brand() {
        return [
            'brand.required' => '(กรุณากรอกยี่ห้อยางรถยนต์)',
        ];
    }

    public function rules_model() {
        return [
            'model' => 'required',
        ];
    }

    public function messages_model() {
        return [
            'model.required' => '(กรุณากรอกรุ่นยางรถยนต์)',
        ];
    }

    public function rules_tyrePrice() {
        return [
            'price' => 'required',
        ];
    }

    public function messages_tyrePrice() {
        return [
            'price.required' => '(กรุณากรอกราคายางรถยนต์)',
        ];
    }

    public function rules_tyreCostPrice() {
        return [
            'cost_price' => 'required',
        ];
    }

    public function messages_tyreCostPrice() {
        return [
            'cost_price.required' => '(กรุณากรอกราคาต้นทุนยางรถยนต์)',
        ];
    }

    public function rules_Carbrand() {
        return [
            'brand' => 'required',
        ];
    }

    public function messages_Carbrand() {
        return [
            'brand.required' => '(กรุณากรอกยี่ห้อรถยนต์)',
        ];
    }

    public function rules_Carmodel() {
        return [
            'model' => 'required',
        ];
    }

    public function messages_Carmodel() {
        return [
            'model.required' => '(กรุณากรอกรุ่นรถยนต์)',
        ];
    }
    
    public function rules_EngineOil() {
        return [
            'name' => 'required',
        ];
    }

    public function messages_EngineOil() {
        return [
            'name.required' => '(กรุณากรอกชื่อสินค้า)',
        ];
    }

    public function rules_EngineOilPrice() {
        return [
            'price' => 'required',
        ];
    }

    public function messages_EngineOilPrice() {
        return [
            'price.required' => '(กรุณากรอกราคาขายน้ำมันเครื่อง)',
        ];
    }

    public function rules_Brake() {
        return [
            'name' => 'required',
        ];
    }

    public function messages_Brake() {
        return [
            'name.required' => '(กรุณากรอกชื่อสินค้า)',
        ];
    }

    public function rules_BrakePrice() {
        return [
            'price' => 'required',
        ];
    }

    public function messages_BrakePrice() {
        return [
            'price.required' => '(กรุณากรอกราคาขายผ้าเบรก)',
        ];
    }

}
