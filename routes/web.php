<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnibusController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MotoristaController;

Route::get('/', function () {
    return view('estrutura');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('onibus', OnibusController::class)->parameters([
        'onibus' => 'onibus'
    ]);

    Route::resource('avisos', AvisoController::class);

    //cria as 7 rotas que o usercontroller precisa
    Route::resource('usuarios', UserController::class);

    Route::resource('motoristas', MotoristaController::class);
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
