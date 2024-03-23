<?php

namespace S4D\Laravel\Thawani\Http;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use S4D\Laravel\Thawani\Models\ThawaniLog;
use S4D\Laravel\Thawani\Thawani;

class ThawaniController extends Controller {
    public function paymentCheck($session_id){
        $PL = ThawaniLog::where('laravel_session_id', $session_id)->latest()->first();
        if(!$PL){
            abort(403);
        }
        $isSuccessful = Thawani::paymentStatus($PL->thawani_session_id);
        return view('ThawaniLaravel::result', compact('isSuccessful'));
    }
    public function cancelPayment($session_id){
        Thawani::cancelPayment($session_id);
        return view('ThawaniLaravel::canceled');

    }
    public function webhook(){}
}
