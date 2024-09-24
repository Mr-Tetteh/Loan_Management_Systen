<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Cors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    //Auth
    Route::get('user', [UserController::class, 'user']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('admin_register', [UserController::class, 'admin_register']);

    //All Users
    Route::get('all_users', [UserController::class, 'register']);


    // user loans
    Route::get('loan', [LoanController::class, 'index' ]);
    Route::post('loans', [LoanController::class, 'store'])->middleware(Cors::class);
    Route::get('loans/{loan}', [LoanController::class, 'show']);
    Route::delete('loans/{loan}', [LoanController::class, 'destroy']);
    Route::patch('loans/{loan}', [LoanController::class, 'update'])->middleware(Cors::class);



    //loans
    Route::get('loans', [LoanController::class, 'allloans']);

    // Loan request route


});
//Route::get('user' [\App\Http\Controllers\User::class '']);
