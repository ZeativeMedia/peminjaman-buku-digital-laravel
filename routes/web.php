<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.main')->name('pages.main');

Route::get('/auth/signin', [AuthController::class, 'showSignIn'])->name('auth.signin');
Route::post('/auth/signin', [AuthController::class, 'signin'])->middleware('web');;

Route::get('/auth/signup', [AuthController::class, 'showSignUp'])->name('auth.signup');
Route::post('/auth/signup', [AuthController::class, 'signup'])->middleware('web');;

Route::post('/auth/logout', [AuthController::class, 'signout'])->name('auth.signout');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('dashboard.main');

    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::patch('/transactions/{id}/return', [TransactionController::class, 'returnBook'])->name('transactions.return');
});

Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('dashboard.users');
    Route::get('/reports', [TransactionController::class, 'index'])->name('dashboard.reports');

    Route::resource('books', BookController::class); 
    Route::resource('users', UserController::class);
});


