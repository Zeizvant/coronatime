<?php

namespace App\Services;

use App\Models\CountryStatistic;

class CountryService
{
	public static function getCountryStatistics()
	{
		$stats = [
			'confirmed' => CountryStatistic::all()->sum('confirmed'),
			'recovered' => CountryStatistic::all()->sum('recovered'),
			'deaths'    => CountryStatistic::all()->sum('deaths'),
		];
		return $stats;
	}
}
