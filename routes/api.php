<?php

use Illuminate\Support\Facades\Route;

require_once "api/auth.php";

Route::group(['middleware' => 'auth:sanctum'], function () {
    require_once "api/task_category.php";
});



