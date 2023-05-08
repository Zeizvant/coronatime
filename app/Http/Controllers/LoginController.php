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
		if (auth()->attempt(['username' => $request->username, 'password' => $request->password], $remember = $request->remember)) {
			return redirect()->route('index');
		}
		return back();
	}
}
