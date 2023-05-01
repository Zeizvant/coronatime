<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
	public function setLocale(string $locale): RedirectResponse
	{
		if (!in_array($locale, ['en', 'ka'])) {
			abort(400);
		}
		App::setLocale($locale);
		session(['locale' => $locale]);

		return redirect()->back();
	}
}
