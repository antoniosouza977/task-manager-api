<?php

use App\Http\Controllers\Api\TaskCategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'task-category', 'as' => 'task_category.'], function () {
    Route::get('/', [TaskCategoryController::class, 'index'])->name('index');
    Route::get('/{id}', [TaskCategoryController::class, 'show'])->name('show');
    Route::post('/store', [TaskCategoryController::class, 'store'])->name('store');
    Route::patch('/update', [TaskCategoryController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [TaskCategoryController::class, 'destroy'])->name('destroy');
});