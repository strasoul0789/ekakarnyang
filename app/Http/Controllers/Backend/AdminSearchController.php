<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Tyre;
use App\Model\Brand;
use App\Model\Model_;
use App\Model\EngineOil;
use App\Model\CarBrand;
use App\Model\Brake;

class AdminSearchController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function searchtyre(Request $request) {
        $NUM_PAGE = 100;
        $width = $request->get('width');
        $ratio = $request->get('ratio');
        $diameter = $request->get('diameter');
        $tyres = Tyre::where('width',$width)
                     ->where('ratio',$ratio)
                     ->where('diameter',$diameter)
                     ->orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')
                     ->paginate($NUM_PAGE);
        $brands = Brand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/data-tyre')->with('NUM_PAGE',$NUM_PAGE)
                                                   ->with('page',$page)
                                                   ->with('tyres',$tyres)
                                                   ->with('brands',$brands);
    }

    public function searchtyreBrand(Request $request) {
        $NUM_PAGE = 20;
        $brand_id = $request->get('brand_id');
        $model_id = $request->get('model_id');

        if($model_id != '') {
            $tyres = Tyre::where('brand_id',$brand_id)
                         ->where('model_id',$model_id)
                         ->orderBy('diameter','asc')
                         ->orderBy('width','asc')
                         ->orderBy('ratio','asc')
                         ->paginate($NUM_PAGE)
                         ->setpath('');
            $tyres->appends(array(
                'brand_id' => $request->get('brand_id'),
                'model_id' => $request->get('model_id'),
            ));
            
            if(count($tyres) > 0) {
                $brands = Brand::get();
                $page = $request->input('page');
                $page = ($page != null)?$page:1;
                return view('backend/admin/tyre/data-tyre')->with('NUM_PAGE',$NUM_PAGE)
                                                           ->with('page',$page)
                                                           ->with('tyres',$tyres)
                                                           ->with('brands',$brands);
            }
            $brands = Brand::get();
            $page = $request->input('page');
            $page = ($page != null)?$page:1;
            return view('backend/admin/tyre/data-tyre')->with('NUM_PAGE',$NUM_PAGE)
                                                           ->with('page',$page)
                                                           ->with('tyres',$tyres)
                                                           ->with('brands',$brands);
        }

    }

    public function searchtyreSale(Request $request) {
        $NUM_PAGE = 50;
        $width = $request->get('width');
        $ratio = $request->get('ratio');
        $diameter = $request->get('diameter');
        $tyres = Tyre::where('width',$width)
                     ->where('ratio',$ratio)
                     ->where('diameter',$diameter)
                     ->orderBy('diameter','asc')
                     ->orderBy('width','asc')
                     ->orderBy('ratio','asc')->paginate($NUM_PAGE);
        $brands = Brand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/price/tyre-sale-price')->with('NUM_PAGE',$NUM_PAGE)
                                                               ->with('page',$page)
                                                               ->with('tyres',$tyres)
                                                               ->with('brands',$brands);
    }

    public function searchEngineOilBrand(Request $request) {
        $NUM_PAGE = 20;
        $brand_id = $request->get('brand_id');
        $model_id = $request->get('model_id');

        if($model_id != '') {
            $engine_oils = EngineOil::where('brand_id',$brand_id)
                                    ->where('model_id',$model_id)
                                    ->paginate($NUM_PAGE)
                                    ->setpath('');
            $engine_oils->appends(array(
                'brand_id' => $request->get('brand_id'),
                'model_id' => $request->get('model_id'),
            ));
            
            if(count($engine_oils) > 0) {
                $brands = CarBrand::get();
                $page = $request->input('page');
                $page = ($page != null)?$page:1;
                return view('backend/admin/engine-oil/data-engine-oil')->with('NUM_PAGE',$NUM_PAGE)
                                                                       ->with('page',$page)
                                                                       ->with('engine_oils',$engine_oils)
                                                                       ->with('brands',$brands);
            }
        
        $brands = CarBrand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/engine-oil/data-engine-oil')->with('NUM_PAGE',$NUM_PAGE)
                                                               ->with('page',$page)
                                                               ->with('engine_oils',$engine_oils)
                                                               ->with('brands',$brands);
        }
    }

    public function searchBrakeBrand(Request $request) {
        $NUM_PAGE = 20;
        $brand_id = $request->get('brand_id');
        $model_id = $request->get('model_id');

        if($model_id != '') {
            $brakes = Brake::where('brand_id',$brand_id)
                           ->where('model_id',$model_id)
                           ->paginate($NUM_PAGE)
                           ->setpath('');
            $brakes->appends(array(
                'brand_id' => $request->get('brand_id'),
                'model_id' => $request->get('model_id'),
            ));
            
            if(count($brakes) > 0) {
                $brands = CarBrand::get();
                $page = $request->input('page');
                $page = ($page != null)?$page:1;
                return view('backend/admin/brake/data-brake')->with('NUM_PAGE',$NUM_PAGE)
                                                             ->with('page',$page)
                                                             ->with('brakes',$brakes)
                                                             ->with('brands',$brands);
            }
        
        $brands = CarBrand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/brake/data-brake')->with('NUM_PAGE',$NUM_PAGE)
                                                     ->with('page',$page)
                                                     ->with('brakes',$brakes)
                                                     ->with('brands',$brands);
        }
    }

    public function searchModel(Request $request) {
        $NUM_PAGE = 20;
        $brands = Brand::get();
        $models = Model_::where('model','LIKE','%' .$request->get('model'). '%')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/create-model')->with('NUM_PAGE',$NUM_PAGE)
                                                      ->with('page',$page)
                                                      ->with('models',$models)
                                                      ->with('brands',$brands);
    }

    public function searchTyreCostPrice(Request $request) {
        $NUM_PAGE = 100;
        $brands = Brand::get();
        $width = $request->get('width');
        $ratio = $request->get('ratio');
        $diameter = $request->get('diameter');
        $tyres = Tyre::where('width',$width)
                     ->where('ratio',$ratio)
                     ->where('diameter',$diameter)
                     ->orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')
                     ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/price/tyre-cost-price')->with('NUM_PAGE',$NUM_PAGE)
                                                               ->with('page',$page)
                                                               ->with('tyres',$tyres)
                                                               ->with('brands',$brands);
    }

    public function searchCostTyreBrandPrice(Request $request) {
        $NUM_PAGE = 100;
        $brands = Brand::get();
        $brand_id = $request->get('brand_id');
        $model_id = $request->get('model_id');
        $tyres = Tyre::where('brand_id',$brand_id)
                     ->where('model_id',$model_id)
                     ->orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')
                     ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/price/tyre-cost-price')->with('NUM_PAGE',$NUM_PAGE)
                                                               ->with('page',$page)
                                                               ->with('tyres',$tyres)
                                                               ->with('brands',$brands);
    }

    public function searchSaleTyreBrandPrice(Request $request) {
        $NUM_PAGE = 100;
        $brands = Brand::get();
        $brand_id = $request->get('brand_id');
        $model_id = $request->get('model_id');
        $tyres = Tyre::where('brand_id',$brand_id)
                     ->where('model_id',$model_id)
                     ->orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')
                     ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/tyre/price/tyre-sale-price')->with('NUM_PAGE',$NUM_PAGE)
                                                               ->with('page',$page)
                                                               ->with('tyres',$tyres)
                                                               ->with('brands',$brands);
    }
}
