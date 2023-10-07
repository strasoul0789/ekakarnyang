<?php

namespace App\Http\Controllers\FrontendMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Ecoupon;
use Carbon\Carbon;

class EcouponsController extends Controller
{
    public function angpao() {
        return view('newSystem/frontendMain/privilege/ecoupon/angpao');
    }

    public function receive_angpao(Request $request) {
		$card_id = $request->get('card_id');
		$name = $request->get('name');
		$tel = $request->get('tel');
		$comment = "-";
		$type = 'ANGPAO';
		$date = Carbon::now()->format('d/m/Y');

			if($card_id == null || $name == null || $tel == null) {
				$obj = new \stdClass();
				$obj->status = "Null";
				return response()->json($obj);
			}

		$mdate = Carbon::now()->format('m');	
			
		$receive_ecoupon = Ecoupon::where('card_id',$card_id)
									     ->where('type',$type)
										 ->whereMonth('created_at',$mdate)->count();

			if($receive_ecoupon > 0) {
				$obj = new \stdClass();
				$obj->status = "Fail";
				return response()->json($obj);
			}

			$receive = new Ecoupon;
			$receive->card_id = $card_id;
			$receive->name = $name;
			$receive->tel = $tel;
			$receive->date = $date;
			$receive->comment = $comment;
			$receive->type = $type;
			$receive->save();

			$card = Ecoupon::where('card_id',$card_id)->first();

			$ecoupon_id = Ecoupon::orderBy('id','desc')->first();

			if($ecoupon_id->id == '9' || $ecoupon_id->id == '19' || $ecoupon_id->id == '29' || $ecoupon_id->id == '39' || $ecoupon_id->id == '49' || $ecoupon_id->id == '190' || $ecoupon_id->id == '229' || $ecoupon_id->id == '249' || $ecoupon_id->id == '289' || $ecoupon_id->id == '299') {
				$objData = new \stdClass();
				$objData->card = $card;
				$objData->status = "PassRandom";
				return response()->json($objData);
			}

		$objData = new \stdClass();
		$objData->card = $card;
		$objData->status = "Pass";
		return response()->json($objData);
	
	}

	public function close() {
		return view('newSystem/frontendMain/privilege/ecoupon/close');
	}

	public function spinWheel() {
        return view('newSystem/frontendMain/privilege/ecoupon/spin-wheel');
    }
}
