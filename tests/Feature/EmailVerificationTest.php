<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	use RefreshDatabase;

	public function test_unverified_user_redirected_to_verification_notice_page_after_register()
	{
		$userData = [
			'username'              => 'mariam',
			'email'                 => 'mariam@test.com',
			'password'              => 'password123',
			'password_confirmation' => 'password123',
			'email_verified_at'     => null,
		];

		$response = $this->post('/register', $userData);
		$response->assertSessionDoesntHaveErrors();
		$response->assertRedirect(route('verification.notice'));
	}

	public function test_verified_user_redirected_to_congrats_page_after_verification()
	{
		$user = User::factory()->create([
			'email_verified_at' => now(),
		]);
		$this->actingAs($user);
		$url = URL::temporarySignedRoute(
			'verification.verify',
			now(),
			['id' => $user->getKey(), 'hash' => sha1($user->getEmailForVerification())]
		);
		$response = $this->get($url);
		$response->assertRedirect(route('congrats.show'));
	}
}
