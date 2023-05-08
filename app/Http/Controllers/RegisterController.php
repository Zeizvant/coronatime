<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

class RegisterController extends Controller
{
	public function register(): View
	{
		return view('register');
	}

	public function store(RegisterRequest $request): RedirectResponse
	{
		$user = User::create($request->validated());
		$token = Str::random(64);
		UserVerify::create([
			'user_id' => $user->id,
			'token'   => $token,
		]);

		Mail::to($request->email)->send(new VerifyEmail($token));
		return redirect()->route('verification.notice');
	}
}
