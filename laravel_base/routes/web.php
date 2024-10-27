<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class,'index'])->name('users.index');
    Route::get('/show/{user}', [UserController::class,'show'])->name('users.show');;
});

Route::prefix('tasks')->group(function () {
    Route::get('/add/{user_id}', [TaskController::class,'add'])->name('tasks.add');
    Route::post('/create', [TaskController::class,'create'])->name('tasks.create');
    Route::get('/edit/{task}', [TaskController::class,'edit'])->name('tasks.edit');
    Route::post('/update/{task}', [TaskController::class,'update'])->name('tasks.update');
    Route::post('/delete/{task}', [TaskController::class,'delete'])->name('tasks.delete');
});

