<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class EmailVerifyTest extends TestCase
{
	use RefreshDatabase;

	public function test_email_verify_page_sent_confirmation_is_accessible()
	{
		$response = $this->get('/email/verify');
		$response->assertSuccessful();
		$response->assertViewIs('sent-confirmation');
	}

	public function test_email_verify_should_veirfy_user_email_if_its_not_verified_already()
	{
		$user = User::factory()->create([
			'username' => 'test',
		]);
		$token = Str::random(64);
		UserVerify::create([
			'user_id'           => $user->id,
			'token'             => $token,
			'is_email_verified' => 0,
		]);

		$response = $this->get('/email/verify/' . $token);
		$response->assertRedirect('/confirmed');
	}

	public function test_email_verify_should_redirect_to_verification_confirmation_page_after_user_verification()
	{
		$user = User::factory()->create([
			'username'          => 'test',
			'is_email_verified' => 1,
		]);
		$token = Str::random(64);
		UserVerify::create([
			'user_id' => $user->id,
			'token'   => $token,
		]);
		$response = $this->get('/email/verify/' . $token);
		$response->assertRedirect('/confirmed');
	}

	public function test_email_verify_should_return_404_if_we_provide_incorrect_token()
	{
		$response = $this->get('/email/verify/test');
		$response->assertStatus(404);
	}

	public function test_email_verify_confirmation_page_is_accessible()
	{
		$response = $this->get('/confirmed');
		$response->assertSuccessful();
	}
}
