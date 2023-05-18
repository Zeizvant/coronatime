<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CountryStatisticController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;

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
Route::get('/change/{locale}', [LanguageController::class, 'setLocale'])->name('language.change');
Route::controller(CountryStatisticController::class)->group(function () {
	Route::get('/', 'index')->middleware('auth')->name('index');
	Route::get('/country', 'country')->middleware('auth')->name('landing.country');
});

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/email/verify', [AuthController::class, 'verifyEmail'])->name('verification.notice');

Route::get('/email/verify/{token}', [AuthController::class, 'verify'])->name('verification.verify');

Route::get('/confirmed', [AuthController::class, 'confirmation'])->name('verification.confirmation');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::get('/reset', [PasswordController::class, 'reset'])->middleware('guest')->name('password.reset');
Route::post('/reset', [PasswordController::class, 'sendEmail'])->middleware('guest')->name('password.send.email');
Route::get('/new-password/{token}', [PasswordController::class, 'newPassword'])->middleware('guest')->name('password.new');
Route::post('/new-password/{token}', [PasswordController::class, 'resetPassword'])->name('password.set.new');
Route::get('/update', [PasswordController::class, 'confirmation'])->middleware('guest')->name('password.confirmation');
