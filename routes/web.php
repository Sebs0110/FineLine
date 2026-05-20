<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnibusController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\ParadaController;

Route::get('/', function () {
    return view('estrutura');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('onibus', OnibusController::class)->parameters([
        'onibus' => 'onibus'
    ]);
    Route::resource('avisos', AvisoController::class);
    Route::resource('usuarios', UserController::class);
    Route::resource('motoristas', MotoristaController::class);
    Route::resource('paradas', ParadaController::class);
});

Auth::routes();
