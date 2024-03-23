<?php

namespace S4D\Laravel\Thawani\Http;

use App\Http\Controllers\Controller;
use S4D\Laravel\Thawani\Models\ThawaniLog;
use S4D\Laravel\Thawani\Thawani;

class ThawaniController extends Controller {
    public function index(){}
    public function generatePaymentUrl(){}
    public function paymentCheck($session_id){
        $PL = ThawaniLog::where('laravel_session_id', $session_id)->latest()->first();
        if(!$PL){
            abort(403);
        }
        if(Thawani::paymentStatus($PL->thawani_session_id)){
            echo 'okay payment';
        }else{
            echo 'failed payment';
        }
    }
    public function webhook(){}
}
