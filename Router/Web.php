<?php

use task_manager\Controllers\TaskController;
use task_manager\Controllers\UserController;
use task_manager\Router\Route;

//аутентификация и регистрация
Route::get('/auth', [UserController::class, 'auth']);
Route::post('/authentication', [UserController::class, 'authentication']);
Route::get('/reg', [UserController::class, 'reg']);
Route::post('/registration', [UserController::class, 'registration']);

//пользователи
Route::get('/users/list', [UserController::class, 'usersList']);
Route::get('/user/get', [UserController::class, 'userGet']);

//задачи
Route::get('/task/add', [TaskController::class, 'add']);
Route::post('/task/create', [TaskController::class, 'create']);
Route::get('/task/edit', [TaskController::class, 'edit']);
Route::post('/task/update', [TaskController::class, 'update']);
Route::post('/task/delete', [TaskController::class, 'delete']);