<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\WorldwideStatistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCountries extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:fetch-countries';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$countries = Http::get('https://devtest.ge/countries')->json();
		Country::truncate();
		WorldwideStatistic::truncate();
		foreach ($countries as $country) {
			Country::create([
				'code' => $country['code'],
				'name' => $country['name'],
			]);
			$stats = Http::post('https://devtest.ge/get-country-statistics', ['code' => $country['code']]);
			$data = json_decode($stats->body());
			WorldwideStatistic::create([
				'country'      => $data->country,
				'code'         => $data->code,
				'confirmed'    => $data->confirmed,
				'recovered'    => $data->recovered,
				'critical'     => $data->critical,
				'deaths'       => $data->deaths,
				'created_at'   => $data->created_at,
				'updated_at'   => $data->updated_at,
			]);
		}
	}
}
