<?php

namespace App\Http\Controllers\FrontendMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\GalleryCarBrand;

class GallerysController extends Controller
{
    public function cargallery(){
        $brands = GalleryCarBrand::get();
        return view('newSystem/frontendMain/gallery/cargallery')->with('brands',$brands);
    }

    public function carBrandGallery($brand){
        return view('newSystem/frontendMain/gallery/brand/'.$brand);
    }
}
