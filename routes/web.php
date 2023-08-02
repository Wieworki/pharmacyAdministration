<?php

use App\Http\Controllers\Auth\LoginController;
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