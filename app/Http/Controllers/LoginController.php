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
		$credential = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		auth()->validate([$credential => $username, 'password' => $request->password]);
		if (User::all()->where($credential, $username)->first()->is_email_verified == true) {
			auth()->attempt([$credential => $username, 'password' => $request->password], $remember = $request->remember);
			if (auth()->check()) {
				return redirect()->route('index');
			} else {
				return back()->withErrors(['password' => 'invalid password'])->withInput(['username' => $username]);
			}
		} else {
			return redirect()->route('verification.notice');
		}
	}
}
