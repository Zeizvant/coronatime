<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\PasswordResetMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class PasswordController extends Controller
{
	public function reset(): View
	{
		return view('reset-password');
	}

	public function sendEmail(MailRequest $request): RedirectResponse
	{
		$token = Str::random(64);
		DB::table('password_reset_tokens')->insert([
			'email'      => $request->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);
		Mail::to($request->email)->send(new PasswordResetMail($token));
		return redirect()->back();
	}

	public function newPassword($token): View
	{
		return view('new-password');
	}

	public function confirmation(): View
	{
		return view('update-confirmation');
	}
}
