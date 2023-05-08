<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CountryStatisticController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;

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
	Route::get('/', 'index')->middleware('verified')->name('index');
	Route::get('/country', 'country')->name('landing.country');
});

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/email/verify', [AuthController::class, 'verifyEmail'])->name('verification.notice');

Route::get('/email/verify/{token}', [AuthController::class, 'verify'])->name('verification.verify');

Route::get('/confirmed', [AuthController::class, 'confirmation'])->name('verification.confirmation');

Route::get('/login', function () {
	return view('login');
})->name('login');
Route::get('/reset', function () {
	return view('reset-password');
});
Route::get('/new-password', function () {
	return view('new-password');
});
Route::get('/update', function () {
	return view('update-confirmation');
});
