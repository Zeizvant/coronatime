<?php

namespace App\Http\Controllers;

use App\Models\WorldwideStatistic;
use App\Services\CountryService;
use Illuminate\View\View;

class WorldwideStatisticsController extends Controller
{
	public function country(): View
	{
		$data = CountryService::getCountryStatistics();
		$data['countries'] = WorldwideStatistic::with('countryName')->get();
		return view('country-landing', $data);
	}

	public function index(): View
	{
		return view('landing', CountryService::getCountryStatistics());
	}
}
