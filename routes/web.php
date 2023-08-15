<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AfiliadoController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\MedicamentoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'test/login');
Route::view('/home', 'test/home');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm');
    Route::post('/login/submit', 'submitLogin');
});

Route::controller(AfiliadoController::class)->group(function () {
    Route::get('/afiliado', 'index');
    Route::get('/afiliado/list', 'list');
    Route::post('/afiliado/show', 'show');
});

Route::controller(MedicamentoController::class)->group(function () {
    Route::get('/medicamento', 'index');
    Route::get('/medicamento/list', 'list');
    Route::get('/medicamento/new', 'new');
    Route::post('/medicamento/show', 'show');
    Route::post('/medicamento/store', 'store');
    Route::post('/medicamento/edit', 'edit');
    Route::post('/medicamento/update', 'update');
});

Route::controller(LaboratorioController::class)->group(function () {
    Route::get('/laboratorio', 'index');
    Route::get('/laboratorio/list', 'list');
    Route::get('/laboratorio/new', 'new');
    Route::post('/laboratorio/show', 'show');
    Route::post('/laboratorio/store', 'store');
    Route::post('/laboratorio/edit', 'edit');
    Route::post('/laboratorio/update', 'update');
});