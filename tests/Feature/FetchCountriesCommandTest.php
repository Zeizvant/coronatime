<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class FetchCountriesCommandTest extends TestCase
{
	use RefreshDatabase;

	public function test_fetch_countries_command_should_fetch_countries_and_country_statistics()
	{
		$this->artisan('app:fetch-countries')
			->assertSuccessful();
	}

	public function test_fetch_countries_command_should_clear_countries_table_if_exists()
	{
		DB::table('countries');
		$this->assertDatabaseEmpty('countries');
		$this->assertDatabaseEmpty('worldwide_statistics');
		$this->artisan('app:fetch-countries')
			->assertSuccessful();
	}
}
