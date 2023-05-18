<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FetchCountryStatisticsCommandTest extends TestCase
{
	use RefreshDatabase;

	public function test_fetch_country_statistics_should_fetch_data_according_to_countries()
	{
		$this->artisan('app:fetch-countries')->execute();
		$this->artisan('app:fetch-country-statistics')
			->assertSuccessful();
	}
}
