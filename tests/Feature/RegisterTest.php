<?php

namespace Tests\Feature;

use App\Mail\emailVerification;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_register_page_is_accessible()
	{
		$response = $this->get(route('register'));
		$response->assertSuccessful();
		$response->assertViewIs('register');
	}

	public function test_register_should_give_us_errors_if_inputs_are_not_provided()
	{
		$response = $this->post(route('register.store'));
		$response->assertSessionHasErrors([
			'username',
			'email',
			'password',
			'password_confirmation',
		]);
	}

	public function test_register_should_give_us_username_error_if_we_wont_provide_username_input()
	{
		$response = $this->post(route('register.store'), [
			'email'                 => 'test@test.com',
			'password'              => 'test',
			'password_confirmation' => 'test',
		]);

		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_register_should_give_us_username_length_error_if_we_provide_2_or_less_symbols()
	{
		$response = $this->post(route('register.store'), [
			'username'              => 'te',
			'email'                 => 'test@test.com',
			'password'              => 'test',
			'password_confirmation' => 'test',
		]);
		$response->assertSessionHasErrors([
			'username' => 'The username field must be at least 3 characters.',
		]);
	}

	public function test_register_should_give_us_username_already_exists_error_if_we_provide_username_which_is_already_used()
	{
		User::factory()->create([
			'username' => 'test',
		]);

		$response = $this->post(route('register.store'), [
			'username'              => 'test',
			'email'                 => 'test@test.com',
			'password'              => 'test',
			'password_confirmation' => 'test',
		]);
		$response->assertSessionHasErrors([
			'username' => 'The username has already been taken.',
		]);
	}

	public function test_register_should_give_us_email_error_if_we_wont_provide_email_input()
	{
		$response = $this->post(route('register.store'), [
			'username'                 => 'test',
			'password'                 => 'test',
			'password_confirmation'    => 'test',
		]);

		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_register_should_give_us_email_validation_error_if_we_wont_provide_valid_email_format()
	{
		$response = $this->post(route('register.store'), [
			'username'                 => 'test',
			'email'                    => 'email',
			'password'                 => 'test',
			'password_confirmation'    => 'test',
		]);

		$response->assertSessionHasErrors([
			'email' => 'The email field must be a valid email address.',
		]);
	}

	public function test_register_should_give_us_email_already_exists_error_if_we_provide_email_which_is_already_used()
	{
		User::factory()->create([
			'email' => 'test@test.com',
		]);

		$response = $this->post(route('register.store'), [
			'username'              => 'test',
			'email'                 => 'test@test.com',
			'password'              => 'test',
			'password_confirmation' => 'test',
		]);
		$response->assertSessionHasErrors([
			'email' => 'The email has already been taken.',
		]);
	}

	public function test_register_should_give_us_password_error_if_we_wont_provide_password_input()
	{
		$response = $this->post(route('register.store'), [
			'username'                 => 'test',
			'email'                    => 'test@test.com',
			'password_confirmation'    => 'test',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_register_should_give_us_password_length_error_if_we_wont_provide_3_or_more_symbols()
	{
		$response = $this->post(route('register.store'), [
			'username'                 => 'test',
			'email'                    => 'test@test.com',
			'password'                 => 'te',
			'password_confirmation'    => 'test',
		]);

		$response->assertSessionHasErrors([
			'password' => 'The password field must be at least 3 characters.',
		]);
	}

	public function test_register_should_give_us_password_confirmation_error_if_we_wont_provide_password_confirmation_input()
	{
		$response = $this->post(route('register.store'), [
			'username'                 => 'test',
			'email'                    => 'test@test.com',
			'password'                 => 'test',
		]);

		$response->assertSessionHasErrors([
			'password_confirmation',
		]);
	}

	public function test_register_should_give_us_password_confirmation_does_not_match_error_if_we_provide_different_passwords()
	{
		$response = $this->post(route('register.store'), [
			'username'                 => 'test',
			'email'                    => 'test@test.com',
			'password'                 => 'test',
			'password_confirmation'    => 'te',
		]);

		$response->assertSessionHasErrors([
			'password' => 'The password field confirmation does not match.',
		]);
	}

	public function test_register_should_redirect_to_email_verification_page_after_successfull_registration()
	{
		$response = $this->post(route('register.store'), [
			'username'                 => 'test',
			'email'                    => 'test@test.com',
			'password'                 => 'test',
			'password_confirmation'    => 'test',
		]);
		$response->assertRedirect(route('verification.notice'));
	}

	public function test_register_should_send_email_to_user_after_successfull_registration()
	{
		Mail::fake();
		$token = Str::random(64);
		$response = $this->post(route('register.store'), [
			'username'                 => 'test',
			'email'                    => 'test@test.com',
			'password'                 => 'test',
			'password_confirmation'    => 'test',
		]);
		$response->assertRedirect(route('verification.notice'));
		Mail::assertSent(emailVerification::class);
	}
}
