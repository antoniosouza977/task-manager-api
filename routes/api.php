<?php

use App\Http\Controllers\Api\Projects\ProjectsController;
use App\Http\Controllers\Api\Users\LoginController;
use App\Http\Controllers\Api\Users\RegisterController;
use Illuminate\Support\Facades\Route;


Route::post('register', [RegisterController::class, 'store'])->name('register');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::group([
        'prefix' => 'projects',
        'as' => 'projects.',
    ], function () {
        Route::post('/create', [ProjectsController::class, 'store'])->name('store');
        Route::patch('/update/{project}', [ProjectsController::class, 'update'])->name('update');
        Route::delete('/delete/{project}', [ProjectsController::class, 'destroy'])->name('destroy');
        Route::get('/show/{project}', [ProjectsController::class, 'show'])->name('show');
        Route::get('/index', [ProjectsController::class, 'index'])->name('index');

        Route::group([
            'prefix' => 'tasks',
            'as' => 'tasks.',
        ], function () {
        });
    });
});



