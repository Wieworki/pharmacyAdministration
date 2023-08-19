<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AfiliadoController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PrincipioActivoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm');
    Route::post('/login/submit', 'submitLogin');
});

Route::controller(AfiliadoController::class)->group(function () {
    Route::get('/afiliado', 'index');
    Route::get('/afiliado/list', 'list');
    Route::post('/afiliado/get', 'get');
});

Route::controller(MedicamentoController::class)->group(function () {
    Route::get('/medicamento/list', 'list');
    Route::post('/medicamento/get', 'get');
    Route::post('/medicamento/store', 'store');
    Route::post('/medicamento/update', 'update');
});

Route::controller(LaboratorioController::class)->group(function () {
    Route::get('/laboratorio/list', 'list');
    Route::post('/laboratorio/get', 'get');
    Route::post('/laboratorio/store', 'store');
    Route::post('/laboratorio/update', 'update');
});

Route::controller(PrincipioActivoController::class)->group(function () {
    Route::get('/principioactivo/list', 'list');
    Route::post('/principioactivo/get', 'get');
    Route::post('/principioactivo/store', 'store');
    Route::post('/principioactivo/update', 'update');
});