<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnibusController;
use App\Http\Controllers\AvisoController;

Route::get('/', function () {
    return view('estrutura');
});

Route::resource('onibus', OnibusController::class);

Route::resource('avisos', AvisoController::class);
