<?php

namespace App\Http\Controllers\BackendMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use Response;
use Validator;
use App\Model\ProductCategory;
use App\Model\ProductBrand;
use App\Model\ProductModel;
use App\Model\Tyreproduct;
use App\Model\MaxBrand;
use App\Model\MaxModel;
use App\Model\MaxProduct;
use App\Model\ShockBrand;
use App\Model\ShockModel;
use App\Model\Batteryproduct;
use App\Model\BookingCovid;
use App\Model\ArticleService;
use App\Model\Article;
use App\Model\ArticleProduct;
use App\Model\CarBrand;
use App\Model\Shockproduct;
use App\Model\Brand;
use App\Model\Model_;
use App\Model\Tyre;
use App\Model\TyreSalePrice;
use App\Model\TyreCostPrice;
use App\Model\CarModel;
use App\Model\EngineOil;
use App\Model\EngineOilSalePrice;
use App\Model\Brake;
use App\Model\BrakeSalePrice;
use App\Model\StaffStatistic;
use App\Model\RandomCode;


class AdminController extends Controller
{
    public function createCategory(Request $request) {
        $NUM_PAGE = 20;
        $categories = ProductCategory::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/category/create-category')->with('NUM_PAGE',$NUM_PAGE)
                                                                           ->with('page',$page)
                                                                           ->with('categories',$categories);
    }

    public function createCategoryPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createCategoryPost(), $this->messages_createCategoryPost());
        if($validator->passes()) {
            $category = $request->all();
            $category = ProductCategory::create($category);
            $request->session()->flash('alert-success', 'สร้างหมวดหมู่สินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'สร้างหมวดหมู่สินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteCategory($id) {
        $category = ProductCategory::findOrFail($id);
        $category->delete();
        return back();
    }

    public function manageProduct($category, Request $request) {
        $NUM_PAGE = 20;
        $categories = ProductCategory::paginate($NUM_PAGE);
        $brand_tyres = Brand::get();
        $tyres = Tyre::paginate($NUM_PAGE);
        $batteries = Batteryproduct::paginate($NUM_PAGE);
        $maxs = MaxProduct::paginate($NUM_PAGE);
        $shocks = Shockproduct::paginate($NUM_PAGE);
        $brands = ProductBrand::get();
        $models = ProductModel::get();
        $engine_oils = EngineOil::paginate($NUM_PAGE);
        $brake =  Brake ::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        
        return view('newSystem/backendMain/admin/product/manage-'.$category)->with('NUM_PAGE',$NUM_PAGE)
                                                                           ->with('page',$page)
                                                                           ->with('categories',$categories)
                                                                           ->with('brand_tyres',$brand_tyres)
                                                                           ->with('tyres',$tyres)
                                                                           ->with('batteries',$batteries)
                                                                           ->with('maxs',$maxs)
                                                                           ->with('shocks',$shocks)
                                                                           ->with('brands',$brands)
                                                                           ->with('models',$models)
                                                                           ->with('engine_oils',$engine_oils)
                                                                           ->with('brake',$brake);

                                                                           
    }

    public function createBrandTyre(Request $request) {
        $NUM_PAGE = 20;
        $brands = ProductBrand::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/product/tyre/create-brand')->with('NUM_PAGE',$NUM_PAGE)
                                                                            ->with('page',$page)
                                                                            ->with('brands',$brands);
    }

    public function createBrandTyrePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createBrandTyrePost(), $this->messages_createBrandTyrePost());
        if($validator->passes()) {
            $brand = $request->all();
            $brand = ProductBrand::create($brand);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_brand_tyre/', $filename);
                $path = 'image_upload/image_brand_tyre/'.$filename;
                $brand->image = $filename;
                $brand->save();
            }

            if($request->hasFile('logo')){
                $logo = $request->file('logo');
                $filename = md5(($logo->getClientOriginalName(). time()) . time()) . "_o." . $logo->getClientOriginalExtension();
                $logo->move('image_upload/image_brand_tyre/', $filename);
                $path = 'image_upload/image_brand_tyre/'.$filename;
                $brand->logo = $filename;
                $brand->save();
            }

            $request->session()->flash('alert-success', 'สร้างยี่ห้อสินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'สร้างยี่ห้อสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteBrandTyre($id) {
        $brand = ProductBrand::findOrFail($id);
        $brand->delete();
        return back();
    }

    public function editBrandTyrePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_editBrandTyrePost(), $this->messages_editBrandTyrePost());
        if($validator->passes()) {
            $id = $request->get('id');
            $brand = ProductBrand::findOrFail($id);
            $brand->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_brand_tyre/', $filename);
                $path = 'image_upload/image_brand_tyre/'.$filename;
                $brand = ProductBrand::findOrFail($id);
                $brand->image = $filename;
                $brand->save();
            }
            if($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $filename = md5(($logo->getClientOriginalName(). time()) . time()) . "_o." . $logo->getClientOriginalExtension();
                $logo->move('image_upload/image_brand_tyre/', $filename);
                $path = 'image_upload/image_brand_tyre/'.$filename;
                $brand = ProductBrand::findOrFail($id);
                $brand->logo = $filename;
                $brand->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขยี่ห้อสินค้าสำเร็จ');
            return redirect()->action('BackendMain\AdminController@createBrandTyre');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขยี่ห้อสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createModelTyre(Request $request) {
        $NUM_PAGE = 20;
        $models = ProductModel::paginate($NUM_PAGE);
        $brand_tyres = ProductBrand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/product/tyre/create-model')->with('NUM_PAGE',$NUM_PAGE)
                                                                            ->with('page',$page)
                                                                            ->with('models',$models)
                                                                            ->with('brand_tyres',$brand_tyres);
    }

    public function createModelTyrePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createModelTyrePost(), $this->messages_createModelTyrePost());
        if($validator->passes()) {
            $model = $request->all();
            $model = ProductModel::create($model);
            $request->session()->flash('alert-success', 'สร้างรุ่นสินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'สร้างรุ่นสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteModelTyre($id) {
        $model = ProductModel::findOrFail($id);
        $model->delete();
        return back();
    }

    public function editModelTyrePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createModelTyrePost(), $this->messages_createModelTyrePost());
        if($validator->passes()) {
            $id = $request->get('id');
            $model = ProductModel::findOrFail($id);
            $model->update($request->all());
            $request->session()->flash('alert-success', 'แก้ไขรุ่นสินค้าสำเร็จ');
            return redirect()->action('BackendMain\AdminController@createModelTyre');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขรุ่นสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createProductTyre(Request $request) {
        $NUM_PAGE = 20;
        $tyres = Tyreproduct::paginate($NUM_PAGE);
        $brand_tyres = ProductBrand::get();
        $model_tyres = ProductModel::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/product/tyre/create-product-tyre')->with('NUM_PAGE',$NUM_PAGE)
                                                                                   ->with('page',$page)
                                                                                   ->with('tyres',$tyres)
                                                                                   ->with('brand_tyres',$brand_tyres)
                                                                                   ->with('model_tyres',$model_tyres);
    }

    public function createProductTyrePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createProductTyrePost(), $this->messages_createProductTyrePost());
        if($validator->passes()) {
            $tyre = $request->all();
            $tyre = TyreProduct::create($tyre);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('products/', $filename);
                $path = 'products/'.$filename;
                $tyre->image = $filename;
                $tyre->save();
            }
            $request->session()->flash('alert-success', 'สร้างสินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'สร้างสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteProductTyre($id) {
        $tyre = Tyreproduct::findOrFail($id);
        $tyre->delete();
        return back();
    }

    public function editProductTyre($id) {
        $tyre = Tyreproduct::findOrFail($id);
        $brand_tyres = ProductBrand::get();
        $model_tyres = ProductModel::get();
        return view('newSystem/backendMain/admin/product/tyre/edit-product-tyre')->with('tyre',$tyre)
                                                                                 ->with('brand_tyres',$brand_tyres)
                                                                                 ->with('model_tyres',$model_tyres);
    }

    public function editProductTyrePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_editProductTyrePost(), $this->messages_editProductTyrePost());
        if($validator->passes()) {
            $id = $request->get('tyre_id');
            $tyre = Tyreproduct::findOrFail($id);
            $tyre->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('products/', $filename);
                $path = 'products/'.$filename;
                $tyre = Tyreproduct::findOrFail($id);
                $tyre->image = $filename;
                $tyre->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขสินค้าสำเร็จ');
            return redirect()->action('BackendMain\AdminController@createProductTyre');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createBrandMax(Request $request) {
        $NUM_PAGE = 20;
        $brands = MaxBrand::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/product/max/create-brand')->with('NUM_PAGE',$NUM_PAGE)
                                                                           ->with('page',$page)
                                                                           ->with('brands',$brands);
    }

    public function createBrandMaxPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createBrandMaxPost(), $this->messages_createBrandMaxPost());
        if($validator->passes()) {
            $brand = $request->all();
            $brand = MaxBrand::create($brand);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_brand_max/', $filename);
                $path = 'image_upload/image_brand_max/'.$filename;
                $brand->image = $filename;
                $brand->save();
            }
            $request->session()->flash('alert-success', 'สร้างยี่ห้อสินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'สร้างยี่ห้อสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteBrandMax($id) {
        $brand = MaxBrand::findOrFail($id);
        $brand->delete();
        return back();
    }

    public function editBrandMaxPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_editBrandMaxPost(), $this->messages_editBrandMaxPost());
        if($validator->passes()) {
            $id = $request->get('id');
            $brand = MaxBrand::findOrFail($id);
            $brand->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_brand_max/', $filename);
                $path = 'image_upload/image_brand_max/'.$filename;
                $brand = MaxBrand::findOrFail($id);
                $brand->image = $filename;
                $brand->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขยี่ห้อสินค้าสำเร็จ');
            return redirect()->action('BackendMain\AdminController@createBrandMax');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขยี่ห้อสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createModelMax(Request $request) {
        $NUM_PAGE = 20;
        $models = MaxModel::paginate($NUM_PAGE);
        $brand_maxs = MaxBrand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/product/max/create-model')->with('NUM_PAGE',$NUM_PAGE)
                                                                           ->with('page',$page)
                                                                           ->with('models',$models)
                                                                           ->with('brand_maxs',$brand_maxs);
    }

    public function createModelMaxPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createModelMaxPost(), $this->messages_createModelMaxPost());
        if($validator->passes()) {
            $model = $request->all();
            $model = MaxModel::create($model);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_model_max/', $filename);
                $path = 'image_upload/image_model_max/'.$filename;
                $model->image = $filename;
                $model->save();
            }
            $request->session()->flash('alert-success', 'สร้างรุ่นสินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'สร้างรุ่นสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteModelMax($id) {
        $model = MaxModel::findOrFail($id);
        $model->delete();
        return back();
    }

    public function editModelMaxPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createModelMaxPost(), $this->messages_createModelMaxPost());
        if($validator->passes()) {
            $id = $request->get('id');
            $model = MaxModel::findOrFail($id);
            $model->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_model_max/', $filename);
                $path = 'image_upload/image_model_max/'.$filename;
                $model = MaxModel::findOrFail($id);
                $model->image = $filename;
                $model->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขรุ่นสินค้าสำเร็จ');
            return redirect()->action('BackendMain\AdminController@createModelMax');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขรุ่นสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createProductMax(Request $request) {
        $NUM_PAGE = 20;
        $maxs = MaxProduct::paginate($NUM_PAGE);
        $brand_maxs = MaxBrand::get();
        $model_maxs = MaxModel::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/product/max/create-product-max')->with('NUM_PAGE',$NUM_PAGE)
                                                                                 ->with('page',$page)
                                                                                 ->with('maxs',$maxs)
                                                                                 ->with('brand_maxs',$brand_maxs)
                                                                                 ->with('model_maxs',$model_maxs);
    }

    public function createProductMaxPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createProductMaxPost(), $this->messages_createProductMaxPost());
        if($validator->passes()) {
            $max = $request->all();
            $max = MaxProduct::create($max);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_product_max/', $filename);
                $path = 'image_upload/image_product_max/'.$filename;
                $max->image = $filename;
                $max->save();
            }
            $request->session()->flash('alert-success', 'สร้างสินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'สร้างสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteProductMax($id) {
        $max = MaxProduct::findOrFail($id);
        $max->delete();
        return back();
    }

    public function editProductMax($id) {
        $max = MaxProduct::findOrFail($id);
        $brand_maxs = MaxBrand::get();
        $model_maxs = MaxModel::get();
        return view('newSystem/backendMain/admin/product/max/edit-product-max')->with('max',$max)
                                                                               ->with('brand_maxs',$brand_maxs)
                                                                               ->with('model_maxs',$model_maxs);
    }

    public function editProductMaxPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_editProductMaxPost(), $this->messages_editProductMaxPost());
        if($validator->passes()) {
            $id = $request->get('id');
            $max = MaxProduct::findOrFail($id);
            $max->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_product_max/', $filename);
                $path = 'image_upload/image_product_max/'.$filename;
                $max = MaxProduct::findOrFail($id);
                $max->image = $filename;
                $max->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขสินค้าสำเร็จ');
            return redirect()->action('BackendMain\AdminController@createProductMax');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createBrandShock(Request $request) {
        $NUM_PAGE = 20;
        $brands = ShockBrand::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/product/shock/create-brand')->with('NUM_PAGE',$NUM_PAGE)
                                                                             ->with('page',$page)
                                                                             ->with('brands',$brands);
    }

    public function createBrandShockPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createBrandShockPost(), $this->messages_createBrandShockPost());
        if($validator->passes()) {
            $brand = $request->all();
            $brand = ShockBrand::create($brand);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_brand_shock/', $filename);
                $path = 'image_upload/image_brand_shock/'.$filename;
                $brand->image = $filename;
                $brand->save();
            }
            $request->session()->flash('alert-success', 'สร้างยี่ห้อสินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'สร้างยี่ห้อสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteBrandShock($id) {
        $brand = ShockBrand::findOrFail($id);
        $brand->delete();
        return back();
    }

    public function editBrandShockPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_editBrandShockPost(), $this->messages_editBrandShockPost());
        if($validator->passes()) {
            $id = $request->get('id');
            $brand = ShockBrand::findOrFail($id);
            $brand->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_brand_shock/', $filename);
                $path = 'image_upload/image_brand_shock/'.$filename;
                $brand = ShockBrand::findOrFail($id);
                $brand->image = $filename;
                $brand->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขยี่ห้อสินค้าสำเร็จ');
            return redirect()->action('BackendMain\AdminController@createBrandShock');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขยี่ห้อสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createModelShock(Request $request) {
        $NUM_PAGE = 20;
        $models = ShockModel::paginate($NUM_PAGE);
        $brand_shocks = ShockBrand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/product/shock/create-model')->with('NUM_PAGE',$NUM_PAGE)
                                                                             ->with('page',$page)
                                                                             ->with('models',$models)
                                                                             ->with('brand_shocks',$brand_shocks);
    }

    public function createModelShockPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createModelShockPost(), $this->messages_createModelShockPost());
        if($validator->passes()) {
            $model = $request->all();
            $model = ShockModel::create($model);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_model_shock/', $filename);
                $path = 'image_upload/image_model_shock/'.$filename;
                $model->image = $filename;
                $model->save();
            }
            $request->session()->flash('alert-success', 'สร้างรุ่นสินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'สร้างรุ่นสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteModelShock($id) {
        $model = ShockModel::findOrFail($id);
        $model->delete();
        return back();
    }

    public function editModelShockPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_editModelShockPost(), $this->messages_editModelShockPost());
        if($validator->passes()) {
            $id = $request->get('id');
            $model = ShockModel::findOrFail($id);
            $model->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_model_shock/', $filename);
                $path = 'image_upload/image_model_shock/'.$filename;
                $model = ShockModel::findOrFail($id);
                $model->image = $filename;
                $model->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขรุ่นสินค้าสำเร็จ');
            return redirect()->action('BackendMain\AdminController@createModelShock');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขรุ่นสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createProductShock(Request $request) {
        $NUM_PAGE = 20;
        $shocks = Shockproduct::paginate($NUM_PAGE);
        $carbrands = CarBrand::get();
        $brand_shocks = ShockBrand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;

        return view('newSystem/backendMain/admin/product/shock/create-product-shock')->with('NUM_PAGE',$NUM_PAGE)
                                                                                     ->with('page',$page)
                                                                                     ->with('shocks',$shocks)
                                                                                     ->with('brand_shocks',$brand_shocks)
                                                                                     ->with('carbrands',$carbrands);
    }

    public function createProductShockPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createProductShockPost(), $this->messages_createProductShockPost());
        if($validator->passes()) {
            $shock = $request->all();
            $shock = Shockproduct::create($shock);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_shock/', $filename);
                $path = 'image_upload/image_shock/'.$filename;
                $shock->image = $filename;
                $shock->save();
            }
            $request->session()->flash('alert-success', 'สร้างสินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'สร้างสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createProductBatteryPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_createProductBatteryPost(), $this->messages_createProductBatteryPost());
        if($validator->passes()) {
            $battery = $request->all();
            $battery = Batteryproduct::create($battery);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_product_battery/', $filename);
                $path = 'image_upload/image_product_battery/'.$filename;
                $battery->image = $filename;
                $battery->save();
            }
            $request->session()->flash('alert-success', 'สร้างสินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'สร้างสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function editProductBatteryPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_editProductBatteryPost(), $this->messages_editProductBatteryPost());
        if($validator->passes()) {
            $id = $request->get('id');
            $battery = Batteryproduct::findOrFail($id);
            $battery->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/image_product_battery/', $filename);
                $path = 'image_upload/image_product_battery/'.$filename;
                $battery = Batteryproduct::findOrFail($id);
                $battery->image = $filename;
                $battery->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขข้อมูลสินค้าสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขข้อมูลสินค้าไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function deleteProductBattery($id) {
        $battery = Batteryproduct::findOrFail($id);
        $battery->delete();
        return back();
    }

    public function bookingCovid19(Request $request) {
        $NUM_PAGE = 20;
        $bookings = BookingCovid::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/booking/booking-covid/booking-list')->with('NUM_PAGE',$NUM_PAGE)
                                                                                     ->with('page',$page)
                                                                                     ->with('bookings',$bookings);
    }

    public function editBookingCovid19($id) {
        $booking = BookingCovid::findOrFail($id);
        return view('newSystem/backendMain/admin/booking/booking-covid/edit-booking')->with('booking',$booking);
    }

    public function editBookingCovid19Post(Request $request) {
        $id = $request->get('id');
        $booking = BookingCovid::findOrFail($id);
        $booking->status = $request->get('status');
        $booking->update($request->all());
        return redirect()->action('BackendMain\AdminController@bookingCovid19');
    }

    public function searchBookingCovid19Post(Request $request) {
        $NUM_PAGE = 20;
        
        if($request->get('code')) {
            $code = $request->get('code');
            $bookings = BookingCovid::where('code',$code)->paginate($NUM_PAGE);
            $count = count($bookings);
                if($count == 0) {
                    $bookings = '0';
                }
        } 

        elseif($request->get('card_id')) {
            $card_id = $request->get('card_id');
            $bookings = BookingCovid::where('card_id',$card_id)->paginate($NUM_PAGE);
            $count = count($bookings);
                if($count == 0) {
                    $bookings = '0';
                }
        }

        elseif($request->get('tel')) {
            $tel = $request->get('tel');
            $bookings = BookingCovid::where('tel',$tel)->paginate($NUM_PAGE);
            $count = count($bookings);
                if($count == 0) {
                    $bookings = '0';
                }
        } else {
            $members = '0';
        }

        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/booking/booking-covid/booking-list')->with('NUM_PAGE',$NUM_PAGE)
                                                                                     ->with('page',$page)
                                                                                     ->with('bookings',$bookings);
    }

    public function BookingCovid19Detail($id) {
        $booking = BookingCovid::findOrFail($id);
        return view('newSystem/backendMain/admin/booking/booking-covid/booking-detail')->with('booking',$booking);
    }

    public function createArticleService(Request $request) {
        $NUM_PAGE = 20;
        $articles = ArticleService::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/article/create-article-service')->with('NUM_PAGE',$NUM_PAGE)
                                                                                 ->with('page',$page)
                                                                                 ->with('articles',$articles);
    }

    public function createArticleServicePost(Request $request) {
        $article = $request->all();
        $article = ArticleService::create($article);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
            $image->move('image_upload/article_service/', $filename);
            $path = 'image_upload/article_service/'.$filename;
            $article->image = $filename;
            $article->save();
        }
        return back();
    }

    public function editArticleService($id) {
        $article = ArticleService::findOrFail($id);
        return view('newSystem/backendMain/admin/article/edit-article-service')->with('article',$article);
    }

    public function editArticleServicePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_editArticlePost(), $this->messages_editArticlePost());
        if($validator->passes()) {
            $id = $request->get('id');
            $article = ArticleService::findOrFail($id);
            $article->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/article_service/', $filename);
                $path = 'image_upload/article_service/'.$filename;
                $article = ArticleService::findOrFail($id);
                $article->image = $filename;
                $article->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขข้อมูลบทความสำเร็จ');
            return redirect()->action('BackendMain\AdminController@createArticleService');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขข้อมูลบทความไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createArticle(Request $request) {
        $NUM_PAGE = 20;
        $articles = Article::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/article/create-article')->with('NUM_PAGE',$NUM_PAGE)
                                                                         ->with('page',$page)
                                                                         ->with('articles',$articles);
    }

    public function createArticlePost(Request $request) {
        $article = $request->all();
        $article = Article::create($article);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
            $image->move('image_upload/article/', $filename);
            $path = 'image_upload/article/'.$filename;
            $article->image = $filename;
            $article->save();
        }
        return back();
    }

    public function editArticle($id) {
        $article = Article::findOrFail($id);
        return view('newSystem/backendMain/admin/article/edit-article')->with('article',$article);
    }

    public function editArticlePost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_editArticlePost(), $this->messages_editArticlePost());
        if($validator->passes()) {
            $id = $request->get('id');
            $article = Article::findOrFail($id);
            $article->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/article/', $filename);
                $path = 'image_upload/article/'.$filename;
                $article = Article::findOrFail($id);
                $article->image = $filename;
                $article->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขข้อมูลบทความสำเร็จ');
            return redirect()->action('BackendMain\AdminController@createArticle');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขข้อมูลบทความไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function createArticleProduct(Request $request) {
        $NUM_PAGE = 20;
        $articles = ArticleProduct::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/article/create-article-product')->with('NUM_PAGE',$NUM_PAGE)
                                                                                 ->with('page',$page)
                                                                                 ->with('articles',$articles);
    }

    public function createArticleProductPost(Request $request) {
        $article = $request->all();
        $article = ArticleProduct::create($article);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
            $image->move('image_upload/article_product/', $filename);
            $path = 'image_upload/article_product/'.$filename;
            $article->image = $filename;
            $article->save();
        }
        return back();
    }

    public function editArticleProduct($id) {
        $article = ArticleProduct::findOrFail($id);
        return view('newSystem/backendMain/admin/article/edit-article-product')->with('article',$article);
    }

    public function editArticleProductPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_editArticlePost(), $this->messages_editArticlePost());
        if($validator->passes()) {
            $id = $request->get('id');
            $article = ArticleProduct::findOrFail($id);
            $article->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('image_upload/article_product/', $filename);
                $path = 'image_upload/article_product/'.$filename;
                $article = ArticleProduct::findOrFail($id);
                $article->image = $filename;
                $article->save();
            }
            $request->session()->flash('alert-success', 'แก้ไขข้อมูลบทความสำเร็จ');
            return redirect()->action('BackendMain\AdminController@createArticleProduct');
        }
        else {
            $request->session()->flash('alert-danger', 'แก้ไขข้อมูลบทความไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function searchTyreFrontPage(Request $request) {
        $NUM_PAGE = 100;
        $width = $request->get('width');
        $ratio = $request->get('ratio');
        $diameter = $request->get('diameter');
        $tyres = Tyreproduct::where('width',$width)
                            ->where('ratio',$ratio)
                            ->where('diameter',$diameter)
                            ->orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')->paginate($NUM_PAGE);
        $brands = ProductBrand::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/product/manage-'.'tyres')->with('NUM_PAGE',$NUM_PAGE)
                                                                          ->with('page',$page)
                                                                          ->with('tyres',$tyres)
                                                                          ->with('brands',$brands);
    }

    public function searchTyreBrandFrontPage(Request $request) {
        $NUM_PAGE = 100;
        $subcategory_id = $request->get('brand_id');
        $model_id = $request->get('model_id');
        $tyres = Tyreproduct::where('subcategory_id',$subcategory_id)
                            ->where('model_id',$model_id)
                            ->orderBy('diameter','asc')->orderBy('width','asc')->orderBy('ratio','asc')->paginate($NUM_PAGE);
        $brands = ProductBrand::get();
        $models = ProductModel::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/admin/product/manage-'.'tyres')->with('NUM_PAGE',$NUM_PAGE)
                                                                          ->with('page',$page)
                                                                          ->with('tyres',$tyres)
                                                                          ->with('brands',$brands)
                                                                          ->with('models',$models);
    }
    
    public function rules_createCategoryPost() {
        return [
            'name' => 'required',
            'name_eng' => 'required',
        ];
    }

    public function messages_createCategoryPost() {
        return [
            'name.required' => 'กรุณากรอกหมวดหมู่สินค้า',
            'name_eng.required' => 'กรุณากรอกหมวดหมู่สินค้า (ภาษาอังกฤษ)',
        ];
    }

    public function rules_createBrandTyrePost() {
        return [
            'brand' => 'required',
            'image' => 'required',
            'logo' => 'required',
        ];
    }

    public function messages_createBrandTyrePost() {
        return [
            'brand.required' => 'กรุณากรอกยี่ห้อสินค้า',
            'image.required' => 'กรุณาแนบไฟล์รูปภาพ',
            'logo.required' => 'กรุณาแนบไฟล์รูปภาพ',
        ];
    }

    public function rules_editBrandTyrePost() {
        return [
            'brand' => 'required',
        ];
    }

    public function messages_editBrandTyrePost() {
        return [
            'brand.required' => 'กรุณากรอกยี่ห้อสินค้า',
        ];
    }

    public function rules_createModelTyrePost() {
        return [
            'model' => 'required',
        ];
    }

    public function messages_createModelTyrePost() {
        return [
            'model.required' => 'กรุณากรอกรุ่นสินค้า',
        ];
    }

    public function rules_createModelMaxPost() {
        return [
            'model' => 'required',
        ];
    }

    public function messages_createModelMaxPost() {
        return [
            'model.required' => 'กรุณากรอกรุ่นสินค้า',
        ];
    }

    public function rules_createProductTyrePost() {
        return [
            'width' => 'required',
            'ratio' => 'required',
            'diameter' => 'required',
            'price' => 'required',
            'cost_prices' => 'required',
            'image' => 'required',
        ];
    }

    public function messages_createProductTyrePost() {
        return [
            'width.required' => 'กรุณากรอกความกว้าง',
            'ratio.required' => 'กรุณากรอกอัตราส่วน',
            'diameter.required' => 'กรุณากรอกเส้นผ่านศูนย์กลาง',
            'price.required' => 'กรุณากรอกราคาขาย',
            'cost_prices.required' => 'กรุณากรอกราคาทุน',
            'image.required' => 'กรุณาแนบไฟล์รูปภาพ',
        ];
    }

    public function rules_editProductTyrePost() {
        return [
            'width' => 'required',
            'ratio' => 'required',
            'diameter' => 'required',
            'price' => 'required',
            'cost_prices' => 'required',
        ];
    }

    public function messages_editProductTyrePost() {
        return [
            'width.required' => 'กรุณากรอกความกว้าง',
            'ratio.required' => 'กรุณากรอกอัตราส่วน',
            'diameter.required' => 'กรุณากรอกเส้นผ่านศูนย์กลาง',
            'price.required' => 'กรุณากรอกราคาขาย',
            'cost_prices.required' => 'กรุณากรอกราคาทุน',
        ];
    }

    public function rules_createBrandMaxPost() {
        return [
            'brand' => 'required',
            'image' => 'required',
        ];
    }

    public function messages_createBrandMaxPost() {
        return [
            'brand.required' => 'กรุณากรอกยี่ห้อสินค้า',
            'image.required' => 'กรุณาแนบไฟล์รูปภาพ',
        ];
    }

    public function rules_editBrandMaxPost() {
        return [
            'brand' => 'required',
        ];
    }

    public function messages_editBrandMaxPost() {
        return [
            'brand.required' => 'กรุณากรอกยี่ห้อสินค้า',
        ];
    }

    public function rules_createProductMaxPost() {
        return [
            'size' => 'required',
            'price' => 'required',
            'image' => 'required',
        ];
    }

    public function messages_createProductMaxPost() {
        return [
            'size.required' => 'กรุณากรอกขนาด',
            'price.required' => 'กรุณากรอกราคาขาย',
            'image.required' => 'กรุณาแนบไฟล์รูปภาพ',
        ];
    }

    public function rules_editProductMaxPost() {
        return [
            'size' => 'required',
            'price' => 'required',
        ];
    }

    public function messages_editProductMaxPost() {
        return [
            'size.required' => 'กรุณากรอกขนาด',
            'price.required' => 'กรุณากรอกราคาขาย',
        ];
    }

    public function rules_createBrandShockPost() {
        return [
            'brand' => 'required',
            'image' => 'required',
        ];
    }

    public function messages_createBrandShockPost() {
        return [
            'brand.required' => 'กรุณากรอกยี่ห้อสินค้า',
            'image.required' => 'กรุณาแนบไฟล์รูปภาพ',
        ];
    }

    public function rules_editBrandShockPost() {
        return [
            'brand' => 'required',
        ];
    }

    public function messages_editBrandShockPost() {
        return [
            'brand.required' => 'กรุณากรอกยี่ห้อสินค้า',
        ];
    }

    public function rules_createModelShockPost() {
        return [
            'model' => 'required',
        ];
    }

    public function messages_createModelShockPost() {
        return [
            'model.required' => 'กรุณากรอกรุ่นสินค้า',
        ];
    }

    public function rules_editModelShockPost() {
        return [
            'model' => 'required',
        ];
    }

    public function messages_editModelShockPost() {
        return [
            'model.required' => 'กรุณากรอกรุ่นสินค้า',
        ];
    }

    public function rules_createProductBatteryPost() {
        return [
            'subcategory' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'image' => 'required',
        ];
    }

    public function messages_createProductBatteryPost() {
        return [
            'subcategory.required' => 'กรุณากรอกรุ่นแบตเตอรี่',
            'detail.required' => 'กรุณากรอกรายละเอียด',
            'price.required' => 'กรุณากรอกราคาขาย',
            'image.required' => 'กรุณาแนบไฟล์รูปภาพ',
        ];
    }

    public function rules_editProductBatteryPost() {
        return [
            'subcategory' => 'required',
            'detail' => 'required',
            'price' => 'required',
        ];
    }

    public function messages_editProductBatteryPost() {
        return [
            'subcategory.required' => 'กรุณากรอกรุ่นแบตเตอรี่',
            'detail.required' => 'กรุณากรอกรายละเอียด',
            'price.required' => 'กรุณากรอกราคาขาย',
        ];
    }

    public function rules_editArticlePost() {
        return [
            'title' => 'required',
            'article' => 'required',
        ];
    }

    public function messages_editArticlePost() {
        return [
            'title.required' => 'กรุณากรอกหัวข้อเรื่อง',
            'article.required' => 'กรุณากรอกเนื้อหาบทความ',
        ];
    }

    public function rules_createProductShockPost() {
        return [
            'carmodel' => 'required',
            'model' => 'required',
            'price' => 'required',
        ];
    }

    public function messages_createProductShockPost() {
        return [
            'carmodel.required' => 'กรุณากรอกรุ่นรถยนต์',
            'model.required' => 'กรุณากรอกรุ่นสินค้า',
            'price.required' => 'กรุณากรอกราคาขาย',
        ];
    }
}
