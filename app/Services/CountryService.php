<?php

namespace App\Services;

use App\Models\WorldwideStatistic;

class CountryService
{
	public static function getCountryStatistics(): array
	{
		$stats = [
			'confirmed' => WorldwideStatistic::all()->sum('confirmed'),
			'recovered' => WorldwideStatistic::all()->sum('recovered'),
			'deaths'    => WorldwideStatistic::all()->sum('deaths'),
		];
		return $stats;
	}
}
