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

Route::controller(RegisterController::class)->group(function () {
	Route::view('/register', 'register')->name('register');
	Route::post('/register', 'store')->name('register.store');
});

Route::controller(AuthController::class)->group(function () {
	Route::view('/email/verify', 'sent-confirmation')->name('verification.notice');
	Route::get('/email/verify/{token}', 'verify')->name('verification.verify');
	Route::view('/confirmed', 'confirmed')->name('verification.confirmation');
	Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::controller(LoginController::class)->group(function () {
	Route::view('/login', 'login')->middleware('guest')->name('login');
	Route::post('/login', 'login')->name('auth.login');
});
Route::controller(PasswordController::class)->group(function () {
	Route::view('/reset', 'reset-password')->middleware('guest')->name('password.reset');
	Route::post('/reset', 'sendEmail')->middleware('guest')->name('password.send.email');
	Route::get('/new-password/{token}', 'newPassword')->middleware('guest')->name('password.new');
	Route::post('/new-password/{token}', 'resetPassword')->name('password.set.new');
	Route::view('/update', 'update-confirmation')->middleware('guest')->name('password.confirmation');
});
