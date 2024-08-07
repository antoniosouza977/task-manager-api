<?php

use App\Http\Controllers\Api\Users\LoginController;
use App\Http\Controllers\Api\Users\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');