<?php

use Illuminate\Support\Facades\Route;
use S4D\Laravel\Thawani\Http\ThawaniController;

Route::prefix('thawani')->name('thawani.')->group(function (){
    Route::get('callback', fn() => view('ThawaniLaravel::result'));
    Route::get('queryPayment/{session_id}', [ThawaniController::class, 'paymentCheck'])->name('check-payment');
    Route::get('cancelPayment/{session_id}', [ThawaniController::class, 'cancelPayment'])->name('cancel-payment');
});
