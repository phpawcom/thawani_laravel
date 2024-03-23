<?php

use Illuminate\Support\Facades\Route;
use S4D\Laravel\Thawani\Http\ThawaniController;

Route::prefix('thawani')->name('thawani.')->group(function (){
    Route::get('callback', fn() => view('ThawaniLaravel::result'));
    Route::get('queryPayment', [ThawaniController::class, 'paymentCheck'])->name('check-payment');
    Route::get('cancelPayment', [ThawaniController::class, 'cancelPayment'])->name('cancel-payment');
});
