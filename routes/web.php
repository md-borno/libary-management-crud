<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowRecordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::middleware('role:admin')->group(function () {
        Route::resource('authors', AuthorController::class);
        Route::resource('books', BookController::class);
    });

    Route::middleware('role:admin,librarian')->group(function () {
        Route::resource('borrow-records', BorrowRecordController::class);
        Route::post('/borrow-records/{borrowRecord}/return', [BorrowRecordController::class, 'returnBook'])->name('borrow-records.return');
    });

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});
