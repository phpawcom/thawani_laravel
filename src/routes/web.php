<?php

use Illuminate\Support\Facades\Route;

Route::prefix('thawani')->group(function (){
    Route::get('callback', fn() => view('ThawaniLaravel::result'));
});
