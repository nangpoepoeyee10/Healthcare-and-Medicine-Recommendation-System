<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// dashboard
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// register
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('register', [AuthController::class, 'register'])->name('register');
// login
Route::post('adminLogin', [AuthController::class, 'adminLogin'])->name('loginAuth');

// forgetPassword
Route::get('forgotPasswordPage', [AuthController::class, 'forgotPasswordPage'])->name('forgotPasswordPage');
Route::post('forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('resetPasswordPage/{token}', [AuthController::class, 'resetPasswordPage'])->name('resetPasswordPage');
Route::post('resetPassword', [AuthController::class, 'resetPassword'])->name('resetPassword');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // admin
    Route::get('categoryList', [CategoryController::class, 'categoryList'])->name('categoryList');

    // user
    Route::get('userHome', function () {
        return view('user.home');
    })->name('userHome');
});

Route::get('/', function () {
    return view('auth.login');
});
