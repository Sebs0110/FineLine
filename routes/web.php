<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnibusController;

Route::get('/', function () {
    return view('estrutura');
});

Route::resource('onibus', OnibusController::class);
