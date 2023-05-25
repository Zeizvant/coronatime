<?php

namespace App\Http\Controllers;

use App\Models\CountryStatistic;
use App\Services\CountryService;
use Illuminate\View\View;

class CountryStatisticController extends Controller
{
	public function country(): View
	{
		$data = CountryService::getCountryStatistics();
		$data['countries'] = CountryStatistic::with('countryName')->get();
		return view('country-landing', $data);
	}

	public function index(): View
	{
		return view('landing', CountryService::getCountryStatistics());
	}
}
