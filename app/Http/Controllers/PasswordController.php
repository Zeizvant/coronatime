<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PasswordController extends Controller
{
	public function reset(): View
	{
		return view('reset-password');
	}

	public function newPassword(): View
	{
		return view('new-password');
	}

	public function confirmation(): View
	{
		return view('update-confirmation');
	}
}
