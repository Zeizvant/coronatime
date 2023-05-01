<?php

namespace App\Console\Commands;

use App\Models\Country;
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
		foreach ($countries as $country) {
			\App\Models\Country::create([
				'code' => $country['code'],
				'name' => json_encode($country['name']),
			]);
		}
	}
}
