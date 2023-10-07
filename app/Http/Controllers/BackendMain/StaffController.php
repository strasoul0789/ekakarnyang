<?php

namespace App\Http\Controllers\BackendMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\BookingCovid;
use App\Model\Ecoupon;

class StaffController extends Controller
{
    public function bookingCovid19(Request $request) {
        $NUM_PAGE = 20;
        $bookings = BookingCovid::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/staff/booking/booking-covid/booking-list')->with('NUM_PAGE',$NUM_PAGE)
                                                                                     ->with('page',$page)
                                                                                     ->with('bookings',$bookings);
    }

    public function editBookingCovid19($id) {
        $booking = BookingCovid::findOrFail($id);
        return view('newSystem/backendMain/staff/booking/booking-covid/edit-booking')->with('booking',$booking);
    }

    public function editBookingCovid19Post(Request $request) {
        $id = $request->get('id');
        $booking = BookingCovid::findOrFail($id);
        $booking->status = $request->get('status');
        $booking->update($request->all());
        return redirect()->action('BackendMain\StaffController@bookingCovid19');
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
        return view('newSystem/backendMain/staff/booking/booking-covid/booking-list')->with('NUM_PAGE',$NUM_PAGE)
                                                                                     ->with('page',$page)
                                                                                     ->with('bookings',$bookings);
    }

    public function BookingCovid19Detail($id) {
        $booking = BookingCovid::findOrFail($id);
        return view('newSystem/backendMain/staff/booking/booking-covid/booking-detail')->with('booking',$booking);
    }

    public function angpao(Request $request){
        $NUM_PAGE = 20;
        $angpaos = Ecoupon::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/staff/ecoupon/angpao')->with('NUM_PAGE',$NUM_PAGE)
                                                                 ->with('page',$page)
                                                                 ->with('angpaos',$angpaos);
    }

    public function editAngpao($id) {
        $angpao = Ecoupon::findOrFail($id);
        return view('newSystem/backendMain/staff/ecoupon/angpao')->with('angpao',$angpao);
    }

    public function editAngpaoPost(Request $request) {
        $id = $request->get('id');
        $angpao = Ecoupon::findOrFail($id);
        $angpao->status = $request->get('status');
        $angpao->update($request->all());
        return redirect()->action('BackendMain\StaffController@angpao');
    }

    public function searchAngpao(Request $request) {
        $NUM_PAGE = 20;

        if($request->get('card_id')) {
            $card_id = $request->get('card_id');
            $angpaos = Ecoupon::where('card_id',$card_id)->paginate($NUM_PAGE);
            $count = count($angpaos);
                if($count == 0) {
                    $angpaos = '0';
                }
        }

        elseif($request->get('tel')) {
            $tel = $request->get('tel');
            $angpaos = Ecoupon::where('tel',$tel)->paginate($NUM_PAGE);
            $count = count($angpaos);
                if($count == 0) {
                    $angpaos = '0';
                }
        } else {
            $angpaos = '0';
        }

        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('newSystem/backendMain/staff/ecoupon/angpao')->with('NUM_PAGE',$NUM_PAGE)
                                                                 ->with('page',$page)
                                                                 ->with('angpaos',$angpaos);
    }
}
