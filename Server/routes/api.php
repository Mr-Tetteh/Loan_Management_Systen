<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\PaymentsController;
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
    Route::get('Admin_all_users', [UserController::class, 'index']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::patch('users/{user}', [UserController::class, 'update']);
    Route::get('users', [UserController::class, 'user']);
    Route::get('deleted', [UserController::class, 'deleted_users']);
    Route::get('restore/{user}', [UserController::class, 'restore']);
    Route::get('total', [UserController::class, 'total_number_of_users']);


    // user loans
    Route::get('loan', [LoanController::class, 'index']);
    Route::post('loans', [LoanController::class, 'store'])->middleware(Cors::class);
    Route::get('loans/{loan}', [LoanController::class, 'show']);
    Route::get('admin_all_loans', [LoanController::class, 'loanss'])->middleware(Cors::class);
    Route::get('active_loans', [LoanController::class, 'activeLoans'])->middleware(Cors::class);
    Route::get('pending_loans', [LoanController::class, 'LoansPending'])->middleware(Cors::class);
    Route::get('compeleted_loans', [LoanController::class, 'completeLoans'])->middleware(Cors::class);
    Route::get('rejected_loans', [LoanController::class, 'rejectedLoan'])->middleware(Cors::class);
    Route::get('history_loans', [PaymentsController::class, 'History'])->middleware(Cors::class);


    Route::delete('loans/{loan}', [LoanController::class, 'destroy']);
    Route::patch('loans/{loan}', [LoanController::class, 'update'])->middleware(Cors::class);
    Route::get('approved', [LoanController::class, 'approvedLoans']);
    Route::get('pending', [LoanController::class, 'pendingLoans']);
    Route::get('rejected', [LoanController::class, 'rejectedLoans']);
    Route::get('compeleted_loans_count', [LoanController::class, 'compeleteLoans']);




    Route::get('loan_payments', [PaymentsController::class, 'index']);

    Route::post('pay_loans', [PaymentsController::class, 'store'])->middleware(Cors::class);
    Route::get('payments/{payment}', [PaymentsController::class, 'show']);


    //loans
    Route::get('loans', [LoanController::class, 'all_loans']);

    // Loan request route


});
//Route::get('user' [\App\Http\Controllers\User::class '']);
