<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('user')->group(function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::prefix('task')->group(function() {
            Route::get('/list', [TaskController::class, 'list']);
            Route::post('/create', [TaskController::class, 'create']);
            Route::post('/update', [TaskController::class, 'update']);
            Route::post('/delete', [TaskController::class, 'delete']);
        });

    });
});