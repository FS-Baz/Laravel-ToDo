<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', [TodoController::class, 'index'])->name('index');

Route::get('create', [TodoController::class, 'create']);

Route::get('details/{todo}', [TodoController::class, 'details']);

Route::get('/details/edit/{todo}', [TodoController::class, 'edit']);

Route::post('/update/{todo}', [TodoController::class, 'update']);

Route::get('delete/{todo}', [TodoController::class, 'delete']);

Route::post('store-data', [TodoController::class, 'store'])-> name('store-data');

Route::get('login', [UserController::class,'login'])->name('login');

Route::post('auth-user', [UserController::class, 'auth'])-> name('auth-user');

Route::get('showTodos', [TodoController::class, 'showTodos']);

Route::get('getUsers', [UserController::class, 'getUsers']);
