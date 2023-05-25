<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Mail\passwordResetMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class PasswordController extends Controller
{
	public function sendEmail(MailRequest $request): RedirectResponse
	{
		$token = Str::random(64);
		DB::table('password_reset_tokens')->insertOrIgnore([
			'email'      => $request->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);
		$passwordToken = DB::table('password_reset_tokens')->where('email', $request->email)->first()->token;

		Mail::to($request->email)->send(new passwordResetMail($passwordToken));
		return redirect()->route('verification.notice');
	}

	public function newPassword(string $token): View
	{
		return view('new-password', [
			'token' => $token,
		]);
	}

	public function resetPassword(PasswordResetRequest $request, string $token): RedirectResponse
	{
		$email = DB::table('password_reset_tokens')->where('token', $token)->first()->email;
		$user = User::all()->where('email', $email)->firstOrFail();
		$user->password = $request->password;
		$user->save();
		return redirect()->route('password.confirmation');
	}
}
