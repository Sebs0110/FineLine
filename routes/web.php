<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvisoController;

Route::get('/', function () {
    return view('estrutura');
});


Route::resource('avisos', AvisoController::class);

use App\Http\Controllers\UserController;

//cria as 7 rotas que o usercontroller precisa
Route::resource('usuarios', UserController::class);

//ce69051 (Implementação do CRUD de usuários)
