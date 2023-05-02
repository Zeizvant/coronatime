<?php

namespace App\Console\Commands;

use App\Models\CountryStatistic;
use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCountryStatistics extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:fetch-country-statistics';

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
		$countries = Country::all();
		CountryStatistic::truncate();
		$countries->each(function ($country) {
			$stats = Http::post('https://devtest.ge/get-country-statistics', ['code' => $country['code']]);
			$data = json_decode($stats->body());
			CountryStatistic::create([
				'country'      => $data->country,
				'code'         => $data->code,
				'confirmed'    => $data->confirmed,
				'recovered'    => $data->recovered,
				'critical'     => $data->critical,
				'deaths'       => $data->deaths,
				'created_at'   => $data->created_at,
				'updated_at'   => $data->updated_at,
			]);
		});
	}
}
