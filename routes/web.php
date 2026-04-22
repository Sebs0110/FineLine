<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvisoController;

Route::get('/', function () {
    return view('estrutura');
});

Route::resource('avisos', AvisoController::class);
