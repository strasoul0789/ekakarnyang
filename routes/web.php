<?php

// เคลียร์แคช
Route::get('/clear-cache', function() {
    $cache_clear = Artisan::call('cache:clear');
    $config_cache = Artisan::call('config:cache');
    $config_clear = Artisan::call('config:clear');
    $view_cache = Artisan::call('view:cache');
    return 'DONE';
});

// หน้าแรก
Route::get('/', 'FrontendMain\\FrontendsController@index');

// สินค้า
Route::get('/products/{category}','FrontendMain\\ProductsController@product');

// บทความบริการ
Route::get('/services/{category}','FrontendMain\\ServicesController@service');
Route::get('/service-article','FrontendMain\\ServicesController@serviceArticle');
Route::get('/service-article/detail/{id}','FrontendMain\\ServicesController@serviceArticleDetail');

// บทความทั่วไป
Route::get('/article','FrontendMain\\ArticleController@article');
Route::get('/article/detail/{id}','FrontendMain\\ArticleController@articleDetail');

// บทความสินค้า
Route::get('/product-article','FrontendMain\\ArticleController@productArticle');
Route::get('/product-article/detail/{id}','FrontendMain\\ArticleController@productArticleDetail');

// ข้อเสนอแนะ
Route::get('/comment', 'FrontendMain\\EakkarnyangController@comment');
Route::post('/comment','FrontendMain\\EakkarnyangController@commentPost');

// เกี่ยวกับเอกการยาง
Route::get('/question', 'FrontendMain\\EakkarnyangController@question');
Route::get('/aboutus', 'FrontendMain\\EakkarnyangController@aboutus');
Route::post('/branch-search','FrontendMain\\SearchController@branch_search');
Route::get('/promotion/promotion', 'FrontendMain\\EakkarnyangController@promotion');

// gallery
Route::get('/cargallery', 'FrontendMain\\GallerysController@cargallery');
Route::get('/gallery/{brand}', 'FrontendMain\\GallerysController@carBrandGallery');

// สินค้า ยางรถยนต์
Route::get('product-tyre/{brand}/{model}','FrontendMain\\ProductsController@tyre');
Route::post('/tyre-search','FrontendMain\\SearchController@tyre_search');
Route::get('/tyre-search/{width}-{ratio}-{diameter}','FrontendMain\\SearchController@showtyre');
// สินค้า น้ำมันเครื่อง
Route::get('carbrand-oil/{brand}','FrontendMain\\ProductsController@carbrandEngineOil');
Route::get('product-oil/{brand}/{model}','FrontendMain\\ProductsController@engineOil');
// สินค้า ผ้าเบรก
Route::get('carbrand-brake/{brand}','FrontendMain\\ProductsController@carbrandBrake');
Route::get('product-brake/{brand}/{model}','FrontendMain\\ProductsController@brake');
// สินค้า แม็กซ์
Route::get('product-max/{brand}','FrontendMain\\ProductsController@max');
Route::get('product-max/{brand}/{model}','FrontendMain\\ProductsController@maxModel');
// สินค้า โช้ค
Route::get('product-shock/{brand}','FrontendMain\\ProductsController@shock');
Route::get('product-shock/{brand}/{carbrand}','FrontendMain\\ProductsController@shockDetail');
Route::get('product-shock/{brand}/{carbrand}/{model}','FrontendMain\\ProductsController@shockModelDetail');

// ajax-search
Route::get('/ajax-width','FrontendMain\\EakkarnyangController@ajax_width');
Route::get('/ajax-ratio','FrontendMain\\EakkarnyangController@ajax_ratio');


// มาตรการช่วยเหลือจากโอตานิ COVID-19 
Route::get('/booking-otani-covid-19','FrontendMain\\BookingController@bookingOtaniCovid19');
Route::post('/booking-otani-covid-19','FrontendMain\\BookingController@bookingOtaniCovid19Post');
Route::get('/booking/{model}/{width}/{ratio}{diameter}/{price}','FrontendMain\\BookingController@bookingOtaniCovid19Detail');
Route::get('/otani-covid-19','FrontendMain\\BookingController@otaniCovid19');

// มาตรการช่วยเหลือจากมิชลิน COVID-19 
Route::get('/booking-michelin-support-phuket','FrontendMain\\BookingController@bookingMichelinCovid19');
Route::post('/booking-michelin-support-phuket','FrontendMain\\BookingController@bookingMichelinCovid19Post');
Route::get('/booking-michelin/{model}/{width}/{ratio}{diameter}/{price}','FrontendMain\\BookingController@bookingMichelinCovid19Detail');
Route::get('/michelin-support-phuket','FrontendMain\\BookingController@michelinCovid19');

// มาตรการช่วยเหลือจากบีเอฟ COVID-19 
Route::get('/booking-bf-covid-19','FrontendMain\\BookingController@bookingBFCovid19');
Route::post('/booking-bf-covid-19','FrontendMain\\BookingController@bookingBFCovid19Post');
Route::get('/booking-bf/{model}/{width}/{ratio}{diameter}/{price}','FrontendMain\\BookingController@bookingBFCovid19Detail');
Route::get('/bf-covid-19','FrontendMain\\BookingController@BFCovid19');

// ให้ลูกค้าแสดงความคิดเห็น
Route::get('/customer-review/{branch_name}','FrontendMain\\EakkarnyangController@customerReview');
Route::post('/customer-review','FrontendMain\\EakkarnyangController@customerReviewPost');
Route::get('/customer-review-success','FrontendMain\\EakkarnyangController@customerReviewSuccess');

Route::get('/customer-feedback','FrontendMain\\EakkarnyangController@customerFeedback');
Route::get('/customer-feedback-detail/{branch_name}','FrontendMain\\EakkarnyangController@customerFeedbackDetail');

// อั่งเปา
// Route::get('/angpao','FrontendMain\\EcouponsController@angpao');
Route::get('/angpao','FrontendMain\\EcouponsController@close');
Route::post('/angpao','FrontendMain\\EcouponsController@receive_angpao');

// หมุนวงล้อ
Route::get('/spin-wheel','FrontendMain\\EcouponsController@spinWheel');

// รับสมัครงาน
Route::get('/apply-work/{branch_name}','FrontendMain\EakkarnyangController@applyWork');
Route::post('/apply-work','FrontendMain\EakkarnyangController@applyWorkPost');

Route::group(['prefix' => 'admin'], function(){
    // สร้างหมวดหมู่สินค้า
    Route::get('/create-category','BackendMain\AdminController@createCategory');
    Route::post('/create-category','BackendMain\AdminController@createCategoryPost');
    Route::get('/delete-category/{id}','BackendMain\AdminController@deleteCategory');
    Route::get('/manage/{category}','BackendMain\AdminController@manageProduct');

    // สร้างยี่ห้อยางรถยนต์
    Route::get('/create-brand-tyre','BackendMain\AdminController@createBrandTyre');
    Route::post('/create-brand-tyre','BackendMain\AdminController@createBrandTyrePost');
    Route::get('/delete-brand-tyre/{id}','BackendMain\AdminController@deleteBrandTyre');
    Route::post('/edit-brand-tyre','BackendMain\AdminController@editBrandTyrePost');

    // สร้างรุ่นยางรถยนต์
    Route::get('/create-model-tyre','BackendMain\AdminController@createModelTyre');
    Route::post('/create-model-tyre','BackendMain\AdminController@createModelTyrePost');
    Route::get('/delete-model-tyre/{id}','BackendMain\AdminController@deleteModelTyre');
    Route::post('/edit-model-tyre','BackendMain\AdminController@editModelTyrePost');

    // สร้างยางรถยนต์
    Route::get('/create-product-tyre','BackendMain\AdminController@createProductTyre');
    Route::post('/create-product-tyre','BackendMain\AdminController@createProductTyrePost');
    Route::get('/delete-product-tyre/{id}','BackendMain\AdminController@deleteProductTyre');
    Route::get('/edit-product-tyre/{id}','BackendMain\AdminController@editProductTyre');
    Route::post('/edit-product-tyre','BackendMain\AdminController@editProductTyrePost');

    // สร้างยี่ห้อแม็กซ์
    Route::get('/create-brand-max','BackendMain\AdminController@createBrandMax');
    Route::post('/create-brand-max','BackendMain\AdminController@createBrandMaxPost');
    Route::get('/delete-brand-max/{id}','BackendMain\AdminController@deleteBrandMax');
    Route::post('/edit-brand-max','BackendMain\AdminController@editBrandMaxPost');

    // สร้างรุ่นแม็กซ์
    Route::get('/create-model-max','BackendMain\AdminController@createModelMax');
    Route::post('/create-model-max','BackendMain\AdminController@createModelMaxPost');
    Route::get('/delete-model-max/{id}','BackendMain\AdminController@deleteModelMax');
    Route::post('/edit-model-max','BackendMain\AdminController@editModelMaxPost');

    // สร้างแม็กซ์
    Route::get('/create-product-max','BackendMain\AdminController@createProductMax');
    Route::post('/create-product-max','BackendMain\AdminController@createProductMaxPost');
    Route::get('/delete-product-max/{id}','BackendMain\AdminController@deleteProductMax');
    Route::get('/edit-product-max/{id}','BackendMain\AdminController@editProductMax');
    Route::post('/edit-product-max','BackendMain\AdminController@editProductMaxPost');

    // สร้างยี่ห้อโช้ค
    Route::get('/create-brand-shock','BackendMain\AdminController@createBrandShock');
    Route::post('/create-brand-shock','BackendMain\AdminController@createBrandShockPost');
    Route::get('/delete-brand-shock/{id}','BackendMain\AdminController@deleteBrandShock');
    Route::post('/edit-brand-shock','BackendMain\AdminController@editBrandShockPost');

    // สร้างรุ่นโช้ค
    Route::get('/create-model-shock','BackendMain\AdminController@createModelShock');
    Route::post('/create-model-shock','BackendMain\AdminController@createModelShockPost');
    Route::get('/delete-model-shock/{id}','BackendMain\AdminController@deleteModelShock');
    Route::post('/edit-model-shock','BackendMain\AdminController@editModelShockPost');

    // สร้างโช้ค
    Route::get('/create-product-shock','BackendMain\AdminController@createProductShock');
    Route::post('/create-product-shock','BackendMain\AdminController@createProductShockPost');
    Route::get('/delete-product-shock/{id}','BackendMain\AdminController@deleteProductShock');
    Route::get('/edit-product-shock/{id}','BackendMain\AdminController@editProductShock');
    Route::post('/edit-product-shock','BackendMain\AdminController@editProductShockPost');

    // สร้างแบตเตอรี่
    Route::post('/create-product-battery','BackendMain\AdminController@createProductBatteryPost');
    Route::get('/delete-product-battery/{id}','BackendMain\AdminController@deleteProductBattery');
    Route::post('/edit-product-battery','BackendMain\AdminController@editProductBatteryPost');

    // ข้อมูลการจอง
    Route::get('/booking-covid-19','BackendMain\AdminController@bookingCovid19');
    Route::get('/edit-booking-covid-19/{id}','BackendMain\AdminController@editBookingCovid19');
    Route::post('/edit-booking-covid-19','BackendMain\AdminController@editBookingCovid19Post');
    Route::post('/search-booking-covid-19','BackendMain\AdminController@searchBookingCovid19Post');
    Route::get('/booking-covid-19-detail/{id}','BackendMain\AdminController@bookingCovid19Detail');

    // บทความ
    Route::get('/create-article','BackendMain\AdminController@createArticle');
    Route::post('/create-article','BackendMain\AdminController@createArticlePost');
    Route::get('/edit-article/{id}','BackendMain\AdminController@editArticle');
    Route::post('/edit-article','BackendMain\AdminController@editArticlePost');

    Route::get('/create-article-service','BackendMain\AdminController@createArticleService');
    Route::post('/create-article-service','BackendMain\AdminController@createArticleServicePost');
    Route::get('/edit-article-service/{id}','BackendMain\AdminController@editArticleService');
    Route::post('/edit-article-service','BackendMain\AdminController@editArticleServicePost');

    Route::get('/create-article-product','BackendMain\AdminController@createArticleProduct');
    Route::post('/create-article-product','BackendMain\AdminController@createArticleProductPost');
    Route::get('/edit-article-product/{id}','BackendMain\AdminController@editArticleProduct');
    Route::post('/edit-article-product','BackendMain\AdminController@editArticleProductPost');

    Route::post('/search-tyre-front-page', 'BackendMain\AdminController@searchTyreFrontPage');
    Route::post('/search-tyre-brand-front-page', 'BackendMain\AdminController@searchTyreBrandFrontPage');
    Route::get('/ajax-brand-front','BackendMain\AdminController@ajax_brand_front');
});


// เว็บใหม่ราคาขาย

// ลงทะเบียนแอดมิน
Route::get('/register-admin','AuthAdmin\RegisterController@ShowRegisterForm');
Route::post('/register-admin','AuthAdmin\RegisterController@register');

// แอดมิน
Route::group(['prefix' => 'admin'], function(){
    // ฝากโปรแกรมรันเลข 4 หลัก
    Route::get('/randomPost','Backend\AdminController@randomPost');

    Route::get('/ajax-brand','Backend\AdminController@ajax_brand');
    Route::get('/ajax-carbrand','Backend\AdminController@ajax_carbrand');

    // เข้าสู่ระบบแอดมิน
    Route::get('/login','AuthAdmin\LoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login','AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');

    Route::get('/edit-admin/{id}','AuthAdmin\LoginController@editAdmin');
    Route::post('/edit-admin','AuthAdmin\LoginController@editAdminPost');

    // ลงทะเบียนพนักงานขาย
    Route::get('/register-staff','AuthStaff\RegisterController@ShowRegisterForm');
    Route::post('/register-staff','AuthStaff\RegisterController@register');

    Route::get('/edit-staff/{id}','AuthStaff\LoginController@editStaff');
    Route::post('/edit-staff','AuthStaff\LoginController@editStaffPost');

    // ยางรถยนต์
    Route::get('/tyre','Backend\AdminController@tyre')->name('admin.home');
    Route::get('/create-tyre','Backend\AdminController@createTyre');
    Route::post('/create-tyre','Backend\AdminController@createTyrePost');
    Route::get('/edit-tyre/{id}','Backend\AdminController@editTyre');
    Route::post('/edit-tyre','Backend\AdminController@editTyrePost');
    Route::get('/delete-tyre/{id}','Backend\AdminController@deleteTyre');

    // ยี่ห้อยางรถยนต์
    Route::get('/create-brand','Backend\AdminController@createBrand');
    Route::post('/create-brand','Backend\AdminController@createBrandPost');
    Route::get('/edit-brand/{id}','Backend\AdminController@editBrand');
    Route::post('/edit-brand','Backend\AdminController@editBrandPost');
    Route::get('/delete-brand/{id}','Backend\AdminController@deleteBrand');

    // รุ่นยางรถยนต์
    Route::get('/create-model','Backend\AdminController@createModel');
    Route::post('/create-model','Backend\AdminController@createModelPost');
    Route::get('/edit-model/{id}','Backend\AdminController@editModel');
    Route::post('/edit-model','Backend\AdminController@editModelPost');
    Route::get('/delete-model/{id}','Backend\AdminController@deleteModel');

    // ตัวจัดการราคาขาย
    Route::get('/tyre-price', 'Backend\AdminController@tyrePrice');
    Route::post('/edit-tyre-price', 'Backend\AdminController@editTyrePrice');
    Route::get('/tyre-price-detail/{id}', 'Backend\AdminController@tyrePriceDetail');
    Route::get('/delete-tyre-price/{id}', 'Backend\AdminController@deleteTyrePrice');

    // ตัวจัดการราคาต้นทุน
    Route::get('/tyre-cost-price', 'Backend\AdminController@tyreCostPrice');
    Route::post('/edit-tyre-cost-price', 'Backend\AdminController@editTyreCostPrice');
    Route::get('/tyre-cost-price-detail/{id}', 'Backend\AdminController@tyreCostPriceDetail');
    Route::get('/delete-tyre-cost-price/{id}', 'Backend\AdminController@deleteTyreCostPrice');

    // ยี่ห้อรถยนต์
    Route::get('/create-carbrand','Backend\AdminController@createCarbrand');
    Route::post('/create-carbrand','Backend\AdminController@createCarbrandPost');
    Route::get('/edit-carbrand/{id}','Backend\AdminController@editCarbrand');
    Route::post('/edit-carbrand','Backend\AdminController@editCarbrandPost');
    Route::get('/delete-carbrand/{id}','Backend\AdminController@deleteCarbrand');

    // รุ่นรถยนต์
    Route::get('/create-carmodel','Backend\AdminController@createCarmodel');
    Route::post('/create-carmodel','Backend\AdminController@createCarmodelPost');
    Route::get('/edit-carmodel/{id}','Backend\AdminController@editCarmodel');
    Route::post('/edit-carmodel','Backend\AdminController@editCarmodelPost');
    Route::get('/delete-carmodel/{id}','Backend\AdminController@deleteCarmodel');

    // น้ำมันเครื่อง
    Route::get('/engine-oil','Backend\AdminController@engineOil');
    Route::get('/create-engine-oil','Backend\AdminController@createEngineOil');
    Route::post('/create-engine-oil','Backend\AdminController@createEngineOilPost');
    Route::get('/edit-engine-oil/{id}','Backend\AdminController@editEngineOil');
    Route::post('/edit-engine-oil','Backend\AdminController@editEngineOilPost');
    Route::get('/delete-engine-oil/{id}','Backend\AdminController@deleteEngineOil');

    // ตัวจัดการราคาขายน้ำมันเครื่อง
    Route::get('/engine-oil-price', 'Backend\AdminController@engineOilPrice');
    Route::post('/edit-engine-oil-price', 'Backend\AdminController@editEngineOilPrice');
    Route::get('/engine-oil-price-detail/{id}', 'Backend\AdminController@engineOilPriceDetail');
    Route::get('/delete-engine-oil-price/{id}', 'Backend\AdminController@deleteEngineOilPrice');

    // ผ้าเบรก
    Route::get('/brake','Backend\AdminController@brake');
    Route::get('/create-brake','Backend\AdminController@createBrake');
    Route::post('/create-brake','Backend\AdminController@createBrakePost');
    Route::get('/edit-brake/{id}','Backend\AdminController@editBrake');
    Route::post('/edit-brake','Backend\AdminController@editBrakePost');
    Route::get('/delete-brake/{id}','Backend\AdminController@deleteBrake');

    // ตัวจัดการราคาขายผ้าเบรก
    Route::get('/brake-price', 'Backend\AdminController@brakePrice');
    Route::post('/edit-brake-price', 'Backend\AdminController@editBrakePrice');
    Route::get('/brake-price-detail/{id}', 'Backend\AdminController@BrakePriceDetail');
    Route::get('/delete-brake-price/{id}', 'Backend\AdminController@deleteBrakePrice');

    // ค้นหาข้อมูล
    Route::post('/search-tyre', 'Backend\AdminSearchController@searchtyre');
    Route::any('/search-tyre-brand', 'Backend\AdminSearchController@searchtyreBrand');
    Route::post('/search-engine-oil-brand', 'Backend\AdminSearchController@searchEngineOilBrand');
    Route::post('/search-model', 'Backend\AdminSearchController@searchModel');
    Route::post('/search-tyre-sale', 'Backend\AdminSearchController@searchtyreSale');
    Route::post('/search-brake-brand', 'Backend\AdminSearchController@searchBrakeBrand');
    Route::post('/search-tyre-cost-price', 'Backend\AdminSearchController@searchTyreCostPrice');
    Route::post('/search-cost-tyre-brand-price', 'Backend\AdminSearchController@searchCostTyreBrandPrice');
    Route::post('/search-sale-tyre-brand-price', 'Backend\AdminSearchController@searchSaleTyreBrandPrice');

    // ข้อมูลการใช้เว็บไซต์
    Route::get('/staff-statistic', 'Backend\AdminController@staffStatistic');
});

// พนักงานขาย
Route::group(['prefix' => 'staff'], function(){
    // เข้าสู่ระบบพนักงานขาย
    Route::get('/login','AuthStaff\LoginController@ShowLoginForm')->name('staff.login');
    Route::post('/login','AuthStaff\LoginController@login')->name('staff.login.submit');
    Route::post('/logout', 'AuthStaff\LoginController@logout')->name('staff.logout');

    // ยางรถยนต์
    Route::get('/data-tyre','Backend\StaffController@dataTyre')->name('staff.home');
    Route::get('/data-tyre/{brand}','Backend\StaffController@dataTyreBrand');
    Route::get('/data-tyre/{brand}/{model}','Backend\StaffController@dataTyreModel');
    Route::get('/data-tyre/{brand}/{model}/{width}/{ratio}/{diameter}','Backend\StaffController@dataTyreModelSize');

    // น้ำมันเครื่อง
    Route::get('/data-engine-oil','Backend\StaffController@dataEngineOil');
    Route::get('/data-engine-oil/{brand}','Backend\StaffController@dataEngineOilBrand');
    Route::get('/data-engine-oil/{brand}/{model}','Backend\StaffController@dataEngineOilModel');

    // ผ้าเบรก
    Route::get('/data-brake','Backend\StaffController@dataBrake');
    Route::get('/data-brake/{brand}','Backend\StaffController@dataBrakeBrand');
    Route::get('/data-brake/{brand}/{model}','Backend\StaffController@dataBrakeModel');

    // ค้นหาข้อมูล
    Route::post('/search-tyre', 'Backend\StaffSearchController@searchtyre');
    Route::post('/search-tyre-model/{brand}', 'Backend\StaffSearchController@searchtyreModel');

    // ข้อมูลการจอง
    Route::get('/booking-covid-19','BackendMain\StaffController@bookingCovid19');
    Route::get('/edit-booking-covid-19/{id}','BackendMain\StaffController@editBookingCovid19');
    Route::post('/edit-booking-covid-19','BackendMain\StaffController@editBookingCovid19Post');
    Route::post('/search-booking-covid-19','BackendMain\StaffController@searchBookingCovid19Post');
    Route::get('/booking-covid-19-detail/{id}','BackendMain\StaffController@bookingCovid19Detail');

     // คูปองอั่งเปา
     Route::get('/angpao', 'BackendMain\StaffController@angpao');
     Route::get('/edit-angpao/{id}','BackendMain\StaffController@editAngpao');
     Route::post('/edit-angpao','BackendMain\StaffController@editAngpaoPost');
     Route::post('/search-angpao','BackendMain\StaffController@searchAngpao');
});
