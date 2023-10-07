<?php

namespace App\Http\Controllers\FrontendMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Location;
use App\Model\Width;
use App\Model\Ratio;
use App\Model\Tyreproduct;

use Carbon\Carbon;

class SearchController extends Controller
{
    public function branch_search(Request $request){
        $branch = $request->get('branch');
        $locations = Location::where('branch','like',$branch)->get();
        return view('newSystem/frontendMain/about-us/branch-search')->with('locations',$locations);
    }

    public function tyre_search(Request $request){ 
        $date = Carbon::now()->format('d/m/Y');
        $width = $request->get('width');
        $ratio = $request->get('ratio');
        $diameter = $request->get('diameter');
        
        $widths = Width::get();
        $width_searchs = Width::where('id',$width)->get();
          foreach ($width_searchs as $width_search) {
            $width_search = $width_search->width;
          }
        $ratio_searchs = Ratio::where('id',$ratio)->get();
          foreach ($ratio_searchs as $ratio_search) {
            $ratio_search = $ratio_search->ratio;
          }

        $tyres = Tyreproduct::where('width','like',$width_search) 
                            ->where('ratio','like',$ratio_search)
                            ->where('diameter','like',$diameter)
                            ->join('product_models', 'tyreproducts.model_id', '=', 'product_models.id')
                            ->select('tyreproducts.*','product_models.status')
                            ->where('tyreproducts.status',"เปิด")
                            ->orderByRaw('FIELD(tyreproducts.subcategory_id,"1","2","12","3","5","501","13","4","6","8","11","7","9","502")')
                            ->orderBy('price','asc')
                            ->get();
        return view('newSystem/frontendMain/product/tyre/tyre-search')->with('diameter',$diameter)
                                                                      ->with('tyres',$tyres)
                                                                      ->with('widths',$widths)
                                                                      ->with('width_search',$width_search)
                                                                      ->with('ratio_search',$ratio_search)
                                                                      ->with('date',$date);
      }      
      
      /*Page show Tyre*/
      public function showtyre($width, $ratio, $diameter){
        $widths = Width::get();
        $width_searchs = Width::where('width',$width)->get();
          foreach ($width_searchs as $width_search) {
            $width_search = $width_search->width;
          }
        $ratio_searchs = Ratio::where('ratio',$ratio)->get();
          foreach ($ratio_searchs as $ratio_search) {
            $ratio_search = $ratio_search->ratio;
          }
        $tyres = Tyreproduct::where('width','like',$width_search) 
                            ->where('ratio','like',$ratio_search)
                            ->where('diameter','like',$diameter)
                            ->orderByRaw('FIELD(subcategory_id,"1","2","12","3","5","501","4","6","8","11","7","9","502")')
                            ->orderBy('price','asc')->get();
        return view('newSystem/frontendMain/product/tyre/tyre-search')->with('tyres',$tyres)
                                                                      ->with('widths',$widths)
                                                                      ->with('width_search',$width_search)
                                                                      ->with('ratio_search',$ratio_search)
                                                                      ->with('diameter',$diameter);
      }
}
