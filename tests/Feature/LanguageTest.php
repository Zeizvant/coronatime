<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LanguageTest extends TestCase
{
	use RefreshDatabase;

	public function test_language_should_change_locale_according_locale_ka_parameter()
	{
		$response = $this->get('/change/ka');
		$response->assertSessionHas('locale', 'ka');
	}

	public function test_language_should_change_locale_according_locale_en_parameter()
	{
		$response = $this->get('/change/en');
		$response->assertSessionHas('locale', 'en');
	}

	public function test_language_should_return_400_error_if_we_provide_incorrect_locale()
	{
		$response = $this->get('/change/test');
		$response->assertStatus(400);
	}
}
