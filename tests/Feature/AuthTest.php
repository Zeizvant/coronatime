<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessible()
	{
		$response = $this->get('/login');

		$response->assertSuccessful();
		$response->assertViewIs('login');
	}

	public function test_auth_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post('/login');
		$response->assertSessionHasErrors(
			[
				'username',
				'password',
			]
		);
	}

	public function test_auth_should_give_us_username_error_if_we_wont_provide_username_input()
	{
		$response = $this->post('/login', [
			'password' => 'test',
		]);
		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_auth_should_give_us_username_length_error_if_we_provide_only_2_or_less_symbols()
	{
		$response = $this->post('/login', [
			'username' => 'te',
			'password' => 'test',
		]);
		$response->assertSessionHasErrors([
			'username' => 'The username field must be at least 3 characters.',
		]);
	}

	public function test_auth_should_give_us_password_error_if_we_wont_provide_password_input()
	{
		$response = $this->post('/login', [
			'username' => 'test',
		]);
		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_auth_should_give_us_incorrect_credentials_error_when_such_user_does_not_exists()
	{
		$response = $this->post('/login', [
			'username' => 'test',
			'passwprd' => 'test',
		]);

		$response->assertSessionHasErrors([
			'username' => 'The selected username is invalid.',
		]);
	}

	public function test_auth_should_give_us_incorrect_password_error_if_we_provide_incorrect_password()
	{
		User::factory()->create([
			'username' => 'test',
			'email'    => 'test',
			'password' => 'test',
		]);
		$response = $this->post('/login', [
			'username' => 'test',
			'password' => 'invalid_password',
		]);
		$response->assertSessionHasErrors([
			'password' => 'invalid password',
		]);
	}

	public function test_auth_should_login_user_with_email_if_username_input_includes_at_symbol()
	{
		User::factory()->create([
			'username' => 'test',
			'email'    => 'test@test.com',
			'password' => 'test',
		]);
		$response = $this->post('/login', [
			'username'    => 'test@test.com',
			'password'    => 'test',
		]);
		$response->assertRedirect('/');
	}

	public function test_auth_should_redirect_to_index_page_after_successfull_login()
	{
		User::factory()->create([
			'username' => 'test',
			'email'    => 'test',
			'password' => 'test',
		]);
		$response = $this->post('/login', [
			'username' => 'test',
			'password' => 'test',
		]);
		$response->assertRedirect('/');
	}
}
