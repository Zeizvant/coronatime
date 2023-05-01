<?php

namespace App\Http\Controllers;

use App\Models\CountryStatistic;
use Illuminate\View\View;

class CountryStatisticController extends Controller
{
	public function country(): View
	{
		return view('country-landing', [
			'confirmed' => CountryStatistic::all()->sum('confirmed'),
			'recovered' => CountryStatistic::all()->sum('recovered'),
			'deaths'    => CountryStatistic::all()->sum('deaths'),
			'countries' => CountryStatistic::all(),
		]);
	}

	public function index(): View
	{
		return view('landing', [
			'confirmed' => CountryStatistic::all()->sum('confirmed'),
			'recovered' => CountryStatistic::all()->sum('recovered'),
			'deaths'    => CountryStatistic::all()->sum('deaths'),
		]);
	}
}
