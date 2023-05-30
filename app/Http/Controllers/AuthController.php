<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\View\View;

class AuthController extends Controller
{
	public function verify(UserVerify $usersVerify): RedirectResponse|View
	{
		if (!is_null($usersVerify->user)) {
			$user = $usersVerify->user;

			if (!$user->is_email_verified) {
				$usersVerify->user->is_email_verified = 1;
				$usersVerify->user->email_verified_at = Carbon::now()->timestamp;
				$usersVerify->user->save();
			}
		}

		return redirect()->route('verification.confirmation');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect()->route('login');
	}
}
