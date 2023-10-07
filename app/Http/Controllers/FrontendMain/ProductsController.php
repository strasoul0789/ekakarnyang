<?php

namespace App\Http\Controllers\FrontendMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Batteryproduct;
use App\Model\ProductCategory;
use App\Model\ProductBrand;
use App\Model\ProductModel;
use App\Model\Tyreproduct;

use App\Model\CarBrand;
use App\Model\CarModel;
use App\Model\EngineOil;
use App\Model\Brake;

use App\Model\MaxBrand;
use App\Model\MaxProduct;
use App\Model\MaxModel;

use App\Model\ShockBrand;
use App\Model\Shockproduct;

use Carbon\Carbon;

class ProductsController extends Controller
{

    public function product($category){
        // ยางรถยนต์
        $tyre_category_id = ProductCategory::where('name_eng',$category)->where('status','เปิด')->value('id');
        $product_brands = ProductBrand::where('category_id',$tyre_category_id)->orderByRaw('FIELD(id,"1","2","5","501","3","6","4","8","11","12","13","502")')->get();

        // น้ำมันเครื่อง และผ้าเบรก
        $brands = CarBrand::where('status','เปิด')->get();

        // แม็กซ์
        $max_brands = MaxBrand::where('status','เปิด')->get();

        // โช้ค
        $shock_brands = ShockBrand::where('status','เปิด')->get();

        // แบตเตอรี่
        $batterys = Batteryproduct::where('status','เปิด')->get();
        
        return view('/newSystem/frontendMain/product/category/'.$category)->with('product_brands',$product_brands)
                                                                          ->with('brands',$brands)
                                                                          ->with('max_brands',$max_brands)
                                                                          ->with('shock_brands',$shock_brands)
                                                                          ->with('batterys',$batterys);
    }

    public function tyre($brand,$model){ 
        $brand_id = ProductBrand::where('brand',$brand)->value('id');
        $model_id = ProductModel::where('model',$model)->value('id');

        $tyres = Tyreproduct::where('model_id','=',$model_id)
                            ->where('subcategory_id','=',$brand_id)
                            ->orderBy('diameter','asc')
                            ->orderBy('width','asc')
                            ->orderBy('price','asc')
                            ->orderBy('cost_prices','asc')
                            ->where('status','เปิด')->get();

        return view('/newSystem/frontendMain/product/tyre/tyre-model')->with('tyres',$tyres)
                                                                      ->with('brand',$brand)
                                                                      ->with('model',$model);
    }

    public function carbrandEngineOil($brand){
        $brand_id = CarBrand::where('brand',$brand)->value('id');
        $carmodels = CarModel::where('brand_id',$brand_id)
                             ->where('status','เปิด')->get();
        return view('/newSystem/frontendMain/product/oil/car-brand')->with('brand_id',$brand_id)
                                                                    ->with('carmodels',$carmodels);
    }

    public function engineOil($brand, $model){ 
        $brand_id = CarBrand::where('brand',$brand)->value('id');
        $model_id = CarModel::where('model',$model)->value('id');
        $engine_oils = EngineOil::where('brand_id',$brand_id)
                                ->where('model_id',$model_id)
                                ->where('status','เปิด')->get();
        return view('/newSystem/frontendMain/product/oil/product-oil')->with('engine_oils',$engine_oils)
                                                                      ->with('brand',$brand)
                                                                      ->with('model',$model);
    }

    public function carbrandBrake($brand){
        $brand_id = CarBrand::where('brand',$brand)->value('id');
        $carmodels = CarModel::where('brand_id',$brand_id)
                             ->where('status','เปิด')->get();
        return view('/newSystem/frontendMain/product/brake/car-brand')->with('brand_id',$brand_id)
                                                                      ->with('carmodels',$carmodels);
    }

    public function brake($brand, $model){ 
        $brand_id = CarBrand::where('brand',$brand)->value('id');
        $model_id = CarModel::where('model',$model)->value('id');
        $brakes =  Brake::where('brand_id',$brand_id)
                        ->where('model_id',$model_id)
                        ->where('status','เปิด')->get();
        return view('/newSystem/frontendMain/product/brake/product-brake')->with('brakes',$brakes)
                                                                          ->with('brand',$brand)
                                                                          ->with('model',$model);
    }

    public function max($brand){ 
        $brand_id = MaxBrand::where('brand',$brand)->value('id');
        $product_models =  MaxModel::where('brand_id',$brand_id)
                                   ->where('status','เปิด')->get();
        return view('/newSystem/frontendMain/product/max/'.$brand)->with('brand',$brand)
                                                                  ->with('product_models',$product_models)
                                                                  ->with('brand_id',$brand_id);
    }   

    public function maxModel($brand, $model){ 
        $brand_id = MaxBrand::where('brand',$brand)->value('id');
        $model_id = MaxModel::where('model',$model)->value('id');
        $maxs =  MaxProduct::where('brand_id',$brand_id)
                           ->where('model_id',$model_id)
                           ->where('status','เปิด')->groupBy('model')->get();
        return view('/newSystem/frontendMain/product/max/product-model-'.$brand)->with('brand',$brand)
                                                                                ->with('model',$model)
                                                                                ->with('maxs',$maxs);
    }

    public function shock($brand){ 
        $brand_id = ShockBrand::where('brand',$brand)->value('id');
        $carbrands = CarBrand::where('status',"เปิด")->get();
        return view('/newSystem/frontendMain/product/shock/'.$brand)->with('brand',$brand)
                                                                    ->with('carbrands',$carbrands)
                                                                    ->with('brand_id',$brand_id);
    }

    public function shockDetail($brand, $carbrand){
        $carbrand_id = CarBrand::where('brand',$carbrand)->value('id'); 
        $brand_id = ShockBrand::where('brand',$brand)->value('id'); 
        $shocks = Shockproduct::where('brand_id',$brand_id)->where('carbrand_id',$carbrand_id)->where('status',"เปิด")->get();
        return view('/newSystem/frontendMain/product/shock/'.$brand.'-detail')->with('brand',$brand)
                                                                              ->with('carbrand',$carbrand)    
                                                                              ->with('shocks',$shocks);
    }

    public function shockModelDetail($brand, $carbrand, $model){
        $carbrand_id = CarBrand::where('brand',$carbrand)->value('id'); 
        $brand_id = ShockBrand::where('brand',$brand)->value('id'); 
        $shocks = Shockproduct::where('brand_id',$brand_id)->where('carbrand_id',$carbrand_id)
                                                           ->where('model',$model)->where('status',"เปิด")->get();   
        return view('/newSystem/frontendMain/product/shock/'.$brand.'-model-detail')->with('brand',$brand)
                                                                                   ->with('carbrand',$carbrand)    
                                                                                   ->with('shocks',$shocks)
                                                                                   ->with('model',$model);
    }
}
