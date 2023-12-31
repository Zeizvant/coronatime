<?php

namespace Tests\Feature;

use App\Mail\EmailVerification;
use App\Mail\PasswordResetMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class PasswordTest extends TestCase
{
	use RefreshDatabase;

	public function test_password_reset_page_is_accessible()
	{
		$response = $this->get(route('password.reset'));
		$response->assertViewIs('reset-password');
		$response->assertSuccessful();
	}

	public function test_password_should_give_us_email_error_if_we_wont_provide_email_input()
	{
		$response = $this->post(route('password.send-email'));
		$response->assertSessionHasErrors('email');
	}

	public function test_password_should_give_us_email_invalid_error_if_our_provided_email_does_not_exists()
	{
		$response = $this->post(route('password.send-email'), ['email' => 'test']);
		$response->assertSessionHasErrors([
			'email' => 'The selected email is invalid.',
		]);
	}

	public function test_password_should_send_email_if_we_provide_correct_email()
	{
		Mail::fake();
		$email = 'test@test.com';
		User::factory()->create([
			'email'             => $email,
		]);
		$token = Str::random(64);
		DB::table('password_reset_tokens')->insert([
			'email'      => $email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);
		$response = $this->post(route('password.send-email'), ['email' => $email]);
		Mail::assertSent(passwordResetMail::class, function ($mail) {
			return $mail->hasSubject('Password Reset Mail');
		});
		Mail::assertNotSent(emailVerification::class);
	}

	public function test_password_new_password_page_is_accessible()
	{
		$response = $this->get(route('password.new', ['test']));
		$response->assertViewIs('new-password');
		$response->assertSuccessful();
	}

	public function test_password_should_give_us_password_error_if_we_wont_provide_password_inputs()
	{
		$response = $this->post(route('password.new', ['test']));
		$response->assertSessionHasErrors([
			'password',
			'password_confirmation',
		]);
	}

	public function test_password_should_give_us_password_length_error_if_we_provide_two_or_less_symbols()
	{
		$response = $this->post(route('password.new', ['test']), [
			'password'              => 'te',
			'password_confirmation' => 'te',
		]);
		$response->assertSessionHasErrors([
			'password' => 'The password field must be at least 3 characters.',
		]);
	}

	public function test_password_should_give_us_password_confirmation_error_if_we_wont_provide_same_values()
	{
		$response = $this->post(route('password.new', ['test']), [
			'password'              => 'test',
			'password_confirmation' => 'test1',
		]);
		$response->assertSessionHasErrors([
			'password' => 'The password field confirmation does not match.',
		]);
	}

	public function test_password_should_reset_password_if_we_provide_valid_password()
	{
		$email = 'test@test.com';
		$token = 'test';
		$user = User::factory()->create([
			'email' => $email,
		]);
		$oldPassword = $user->password;
		DB::table('password_reset_tokens')->insert([
			'email'      => $email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);
		$password = 'test';
		$response = $this->post(route('password.set-new', [$token]), [
			'password'              => $password,
			'password_confirmation' => $password,
			'token'                 => $token,
		]);

		$this->assertNotEquals(User::all()->first()->password, $oldPassword);
	}

	public function test_passowrd_should_redirect_email_verification_page_if_we_provide_valid_email()
	{
		$email = 'testa@test.com';
		User::factory()->create([
			'username'          => 'test',
			'email'             => $email,
			'password'          => 'test',
			'is_email_verified' => 1,
		]);
		$response = $this->post(route('password.send-email'), ['email' => $email]);
		$response->assertRedirect(route('verification.notice'));
	}

	public function test_password_should_redirect_to_password_confirmation_page_if_password_reseted_successfully()
	{
		$email = 'test@test.com';
		$token = 'test';
		$user = User::factory()->create([
			'email' => $email,
		]);
		DB::table('password_reset_tokens')->insert([
			'email'      => $email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);
		$response = $this->post(route('password.set-new', [$token]), [
			'password'              => 'test',
			'password_confirmation' => 'test',
			'token'                 => $token,
		]);

		$response->assertRedirect(route('password.confirmation'));
	}

	public function test_password_update_page_is_accessible()
	{
		$response = $this->get(route('password.confirmation'));
		$response->assertSuccessful();
		$response->assertViewIs('update-confirmation');
	}
}
