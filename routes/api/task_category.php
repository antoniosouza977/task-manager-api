<?php

use App\Http\Controllers\Api\TaskCategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'task-category', 'as' => 'task_category.'], function () {
    Route::post('/store', [TaskCategoryController::class, 'store'])->name('store');
});