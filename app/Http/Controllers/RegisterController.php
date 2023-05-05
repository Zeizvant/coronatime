<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
	public function register(): View
	{
		return view('register');
	}

	public function store(RegisterRequest $request): RedirectResponse
	{
		//		dd($request->validated());
		User::create($request->validated());
		return redirect()->route('index');
	}
}
