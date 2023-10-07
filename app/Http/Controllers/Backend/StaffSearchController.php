<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Tyre;
use App\Model\Brand;

class StaffSearchController extends Controller
{
    public function __construct(){
        $this->middleware('auth:staff');
    }

    public function searchtyre(Request $request) {
        $NUM_PAGE = 100;
        $width = $request->get('width');
        $ratio = $request->get('ratio');
        $diameter = $request->get('diameter');
        $tyres = Tyre::where('width',$width)
                     ->where('ratio',$ratio)
                     ->where('diameter',$diameter)
                     ->orderBy('diameter','asc')
                     ->orderBy('width','asc')
                     ->orderBy('ratio','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/tyre/search-tyre')->with('NUM_PAGE',$NUM_PAGE)
                                                     ->with('page',$page)
                                                     ->with('tyres',$tyres)
                                                     ->with('width',$width)
                                                     ->with('ratio',$ratio)
                                                     ->with('diameter',$diameter);
    }

    public function searchtyreModel(Request $request,$brand) {
        $NUM_PAGE = 50;
        $width = $request->get('width');
        $ratio = $request->get('ratio');
        $diameter = $request->get('diameter');
        $brand_id = Brand::where('brand',$brand)->value('id');
        $tyres = Tyre::where('width',$width)
                     ->where('ratio',$ratio)
                     ->where('diameter',$diameter)
                     ->where('brand_id',$brand_id)
                     ->orderBy('diameter','asc')
                     ->orderBy('width','asc')
                     ->orderBy('ratio','asc')->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/staff/tyre/search-tyre')->with('NUM_PAGE',$NUM_PAGE)
                                                     ->with('page',$page)
                                                     ->with('tyres',$tyres)
                                                     ->with('width',$width)
                                                     ->with('ratio',$ratio)
                                                     ->with('diameter',$diameter);
    }

    
}
