<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$username = $request->username;

		if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
			auth()->validate(['email' => $username, 'password' => $request->password]);
			if (User::all()->where('email', $username)->first()->is_email_verified == true) {
				auth()->attempt(['email' => $username, 'password' => $request->password], $remember = $request->remember);
				if (auth()->check()) {
					return redirect()->route('index');
				} else {
					return back()->withErrors(['password' => 'invalid password'])->withInput(['username' => $username]);
				}
			} else {
				return redirect()->route('verification.notice');
			}
		} else {
			auth()->validate(['username' => $username, 'password' => $request->password]);
			if (User::all()->where('username', $username)->first()->is_email_verified == true) {
				auth()->attempt(['username' => $username, 'password' => $request->password], $remember = $request->remember);
				if (auth()->check()) {
					return redirect()->route('index');
				} else {
					return back()->withErrors(['password' => 'invalid password'])->withInput(['username' => $username]);
				}
			} else {
				return redirect()->route('verification.notice');
			}
		}
		return back()->withErrors(['password' => 'invalid password'])->withInput(['username' => $username]);
	}
}
