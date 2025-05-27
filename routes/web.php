<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\VendaController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('clientes', ClienteController::class);
Route::resource('funcionarios', FuncionarioController::class);
Route::resource('veiculos', VeiculoController::class);
Route::resource('vendas', VendaController::class);
