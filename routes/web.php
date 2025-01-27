<?php

use App\Http\Controllers\AuthController;
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
    return view('auth.login');
});
//register
Route::get('register', [AuthController::class, 'register'])->name('register');

// login
Route::post('loginUser', [AuthController::class, 'loginUser'])->name('loginUser');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// forgetPassword
Route::get('forgotPasswordPage', [AuthController::class, 'forgotPasswordPage'])->name('forgotPasswordPage');
Route::post('forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('resetPasswordPage/{token}', [AuthController::class, 'resetPasswordPage'])->name('resetPasswordPage');
Route::post('resetPassword', [AuthController::class, 'resetPassword'])->name('resetPassword');
