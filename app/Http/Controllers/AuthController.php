<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\View\View;

class AuthController extends Controller
{
	public function verifyEmail(): View
	{
		return view('sent-confirmation');
	}

	public function verify($token): RedirectResponse|View
	{
		$verifyUser = UserVerify::where('token', $token)->first();

		if (!is_null($verifyUser)) {
			$user = $verifyUser->user;

			if (!$user->is_email_verified) {
				$verifyUser->user->is_email_verified = 1;
				$verifyUser->user->email_verified_at = Carbon::now()->timestamp;
				$verifyUser->user->save();
			}
		} else {
			abort(404);
		}

		return redirect()->route('verification.confirmation');
	}

	public function confirmation(): View
	{
		return view('confirmed');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect()->route('login');
	}
}
