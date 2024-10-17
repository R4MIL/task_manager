<?php

use task_manager\Controllers\UserController;
use task_manager\Router\Route;


Route::get('/index', [UserController::class, 'index']);
Route::post('/auth', [UserController::class, 'auth']);
Route::get('/reg', [UserController::class, 'reg']);
Route::post('/registr', [UserController::class, 'registr']);