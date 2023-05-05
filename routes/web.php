<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CountryStatisticController;
use App\Http\Controllers\RegisterController;

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
	Route::get('/', 'index')->name('index');
	Route::get('/country', 'country')->name('landing.country');
});

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', function () {
	return view('login');
});
Route::get('/reset', function () {
	return view('reset-password');
});
Route::get('/new-password', function () {
	return view('new-password');
});
Route::get('/sent', function () {
	return view('sent-confirmation');
});
Route::get('/update', function () {
	return view('update-confirmation');
});
Route::get('/confirmed', function () {
	return view('confirmed');
});
