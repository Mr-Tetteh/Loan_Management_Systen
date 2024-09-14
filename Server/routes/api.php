<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register', [User::class, 'register']);
Route::post('login', [User::class, 'login']);
Route::post('loan', [LoanController::class, 'loan']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [User::class, 'user']);
    Route::post('logout', [User::class, 'logout']);
});
//Route::get('user' [\App\Http\Controllers\User::class '']);
