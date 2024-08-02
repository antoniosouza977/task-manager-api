<?php


use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'task', 'as' => 'task.'], function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('/{id}', [TaskController::class, 'show'])->name('show');
    Route::post('/store', [TaskController::class, 'store'])->name('store');
    Route::patch('/update', [TaskController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [TaskController::class, 'destroy'])->name('destroy');
});