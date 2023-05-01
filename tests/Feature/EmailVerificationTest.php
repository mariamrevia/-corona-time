<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	use RefreshDatabase;

	use WithFaker;

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

	public function test_an_email_is_sent_to_user_when_they_register()
	{
		Notification::fake();
		$user = User::factory()->create();
		$notification = new VerifyEmailNotification('https://example.com/email/verify');
		$user->notify($notification);
		Notification::assertSentTo(
			$user,
			VerifyEmailNotification::class,
			function ($notification, $channels, $notifiable) use ($user) {
				return $notifiable->id === $user->id && in_array('mail', $channels);
			}
		);
	}

		public function test_it_sends_a_verification_email_notification()
		{
			Notification::fake();
			$user = User::factory()->create();
			$user->notify(new VerifyEmailNotification());
			Notification::assertSentTo($user, VerifyEmailNotification::class);
		}
}
