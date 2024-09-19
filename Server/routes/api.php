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
    Route::get('all_user_loans', [LoanController::class, 'index' ]);

    //loans
    Route::get('all_loans', [LoanController::class, 'allloans']);
    Route::post('loan', [LoanController::class, 'store'])->middleware(Cors::class);

    // Loan request route


});
//Route::get('user' [\App\Http\Controllers\User::class '']);
