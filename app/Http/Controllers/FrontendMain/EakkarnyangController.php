<?php

namespace App\Http\Controllers\FrontendMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Ratio;
use App\Model\Diameter;
use App\Model\Carmodel;
use App\Model\Caryear;
use App\Model\Location;
use App\Model\Comment;
use App\Model\CustomerReview;
use App\Model\ApplyWork;

use Carbon\Carbon;

use Input;
use Response;
use Hash;
use Auth;
use Validator;

class EakkarnyangController extends Controller
{
    public function comment(){
        return view('newSystem/frontendMain/contact-us/comment');
    }

    public function commentPost(Request $request){
        $comment = $request->all();
        $comment = Comment::create($comment);
        return back();
    }

    public function article(){
        return view('newSystem/frontendMain/about-us/article');
    }

    public function question(){
    	return view('newSystem/frontendMain/about-us/question');
    }

    public function aboutus(){
    	return view('newSystem/frontendMain/about-us/about_us');
    }

    public function ajax_width(){
        $cat_id = Input::get('cat_id');
    
        $subcategories = Ratio::where('width_id', '=' ,$cat_id)->get();
        return Response::json($subcategories);
    }

    public function ajax_ratio(){
        $cat_id = Input::get('cat_id');
    
        $subcategories = Diameter::where('ratio_id', '=' ,$cat_id)->get();
        return Response::json($subcategories);
    }

    public function promotion(){
    	return view('newSystem/frontendMain/about-us/promotion');
    }

    public function customerReview($branch_name){
    	return view('newSystem/frontendMain/about-us/customer-review')->with('branch_name',$branch_name);
    }

    public function customerReviewPost(Request $request){
        $review = $request->all();
        $review = CustomerReview::create($review);
        return redirect()->action('FrontendMain\\EakkarnyangController@customerReviewSuccess');
    }

    public function customerReviewSuccess(){
    	return view('newSystem/frontendMain/about-us/customer-review-success');
    }

    public function customerFeedback(){
        $branchs = CustomerReview::groupBy('branch_name')->get();
    	return view('newSystem/frontendMain/about-us/customer-feedback')->with('branchs',$branchs);
    }

    public function customerFeedbackDetail(Request $request, $branch_name){
        $NUM_PAGE1 = 20;
        $NUM_PAGE2 = 20;
        $feedbacks = CustomerReview::where('branch_name',$branch_name)
                                    ->whereIn('feedback',['1','2','3'])
                                    ->paginate(20, ['*'], 'feedbacks');

        $allfeedbacks = CustomerReview::where('branch_name',$branch_name)->paginate(20, ['*'], 'allfeedbacks');

        $page = $request->input('page');
        $page = ($page != null)?$page:1;
    	return view('newSystem/frontendMain/about-us/customer-feedback-detail')->with('NUM_PAGE1',$NUM_PAGE1)
                                                                               ->with('NUM_PAGE2',$NUM_PAGE2)
                                                                               ->with('page',$page)
                                                                               ->with('feedbacks',$feedbacks)
                                                                               ->with('allfeedbacks',$allfeedbacks)
                                                                               ->with('branch_name',$branch_name);
    }

    public function applyWork($branch_name) {
        return view('newSystem/frontendMain/apply/apply-work')->with('branch_name',$branch_name);
    }

    public function applyWorkPost(Request $request) {
        $apply_request = $request->all();
        $apply = ApplyWork::create($apply_request);
        if($request->hasFile('performance')){
            $performance = $request->file('performance');
            $filename = md5(($performance->getClientOriginalName(). time()) . time()) . "_o." . $performance->getClientOriginalExtension();
            $performance->move('file_upload/performance/', $filename);
            $path = 'file_upload/performance/'.$filename;
            $apply->performance = $filename;
            $apply->save();
        }
        if($request->hasFile('facebook')){
            $facebook = $request->file('facebook');
            $filename = md5(($facebook->getClientOriginalName(). time()) . time()) . "_o." . $facebook->getClientOriginalExtension();
            $facebook->move('file_upload/facebook/', $filename);
            $path = 'file_upload/facebook/'.$filename;
            $apply->facebook = $filename;
            $apply->save();
        }
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
            $image->move('file_upload/image/', $filename);
            $path = 'file_upload/image/'.$filename;
            $apply->image = $filename;
            $apply->save();
        }
        return view('newSystem/frontendMain/apply/apply-success');
    }
}
