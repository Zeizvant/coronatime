<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\View\View;

class AuthController extends Controller
{
	public function verify(UserVerify $users_verify): RedirectResponse|View
	{
		if (!is_null($users_verify)) {
			$user = $users_verify->user;

			if (!$user->is_email_verified) {
				$users_verify->user->is_email_verified = 1;
				$users_verify->user->email_verified_at = Carbon::now()->timestamp;
				$users_verify->user->save();
			}
		} else {
			abort(404);
		}

		return redirect()->route('verification.confirmation');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect()->route('login');
	}
}
