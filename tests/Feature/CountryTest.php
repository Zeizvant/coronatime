<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\CountryStatistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryTest extends TestCase
{
	use RefreshDatabase;

	public function test_country_index_page_is_accessible()
	{
		User::factory()->create([
			'username'          => 'test',
			'email'             => 'test@test.com',
			'password'          => 'test',
			'is_email_verified' => 1,
		]);
		auth()->attempt(['username' => 'test', 'password' => 'test']);
		$response = $this->get('/');
		$response->assertSuccessful();
	}

	public function test_country_statistics_page_is_accessible()
	{
		User::factory()->create([
			'username'          => 'test',
			'email'             => 'test@test.com',
			'password'          => 'test',
			'is_email_verified' => 1,
		]);
		auth()->attempt(['username' => 'test', 'password' => 'test']);
		$response = $this->get('/country');
		$response->assertSuccessful();
	}

	public function test_country_index_redirects_to_login_page_if_we_try_to_access_with_unverified_user()
	{
		User::factory()->create([
			'username'          => 'test',
			'email'             => 'test@test.com',
			'password'          => 'test',
			'is_email_verified' => 0,
		]);
		$this->post('/login', [
			'username' => 'test',
			'password' => 'test',
		]);
		$response = $this->get('/');
		$response->assertRedirect('/login');
	}

	public function test_country_redirects_to_login_page_if_we_try_to_access_with_unverified_user()
	{
		User::factory()->create([
			'username'          => 'test',
			'email'             => 'test@test.com',
			'password'          => 'test',
			'is_email_verified' => 0,
		]);
		$this->post('/login', [
			'username' => 'test',
			'password' => 'test',
		]);
		$response = $this->get('/country');
		$response->assertRedirect('/login');
	}

	public function test_country_model_should_return_country_statistics_relation_with_country_property()
	{
		$country = Country::create([
			'code' => 'AF',
			'name' => '"{""en"": ""Afghanistan"", ""ka"": ""ავღანეთი""}"',
		]);

		$countryStats = CountryStatistic::create([
			'code'      => 'AF',
			'country'   => 'Afghanistan',
			'confirmed' => 1204,
			'critical'  => 3445,
			'deaths'    => 4382,
			'recovered' => 4066,
		]);
		$this->assertEquals($country->code, $country->country->code);
	}

	public function test_country_statistics_model_should_return_country_relation_with_country_name_property()
	{
		$country = Country::create([
			'code' => 'AF',
			'name' => '"{""en"": ""Afghanistan"", ""ka"": ""ავღანეთი""}"',
		]);

		$countryStats = CountryStatistic::create([
			'code'      => 'AF',
			'country'   => 'Afghanistan',
			'confirmed' => 1204,
			'critical'  => 3445,
			'deaths'    => 4382,
			'recovered' => 4066,
		]);
		$this->assertEquals($countryStats->code, $countryStats->countryName->code);
	}
}