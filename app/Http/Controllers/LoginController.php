<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
	public function show(): View
	{
		return view('login');
	}

	public function login(LoginRequest $request): RedirectResponse
	{
		$username = $request->username;

		if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
			auth()->attempt(['email' => $username, 'password' => $request->password], $remember = $request->remember);
		} else {
			auth()->attempt(['username' => $username, 'password' => $request->password], $remember = $request->remember);
		}

		if (auth()->check()) {
			return redirect()->route('index');
		}

		return back()->withErrors(['password' => 'invalid password']);
	}
}
