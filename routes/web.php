<?php

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

Route::get('/login', function () {
	return view('login');
});
Route::get('/register', function () {
	return view('register');
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
Route::get('/', function () {
	return view('landing');
});
Route::get('/country', function () {
	return view('country-landing');
});
