<?php

namespace Tests\Feature;

use App\Http\Controllers\Auth\PasswordResetController;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;
use Illuminate\View\View;

class ResetPasswordTest extends TestCase
{
	use WithFaker;

	use RefreshDatabase;

	public function test_notify_method_throws_error_when_user_does_not_exists()
	{
		$user = User::factory()->create();
		$response = $this->post(route('password.email'), ['email' => $user->email]);
		$response->assertRedirect(route('confirm.show'));
		$nonExistingEmail = 'mariam@test.com';
		$response = $this->post(route('password.email'), ['email' => $nonExistingEmail]);
		$response->assertSessionHasErrors('email');
	}

	public function test_if_reset_password_email_is_sent_to_user()
	{
		Notification::fake();
		$user = User::factory()->create();
		$notification = new ResetPasswordNotification('https://example.com/reset-password');
		$user->notify($notification);
		Notification::assertSentTo(
			$user,
			ResetPasswordNotification::class,
			function ($notification, $channels, $notifiable) use ($user) {
				return $notifiable->id === $user->id && in_array('mail', $channels);
			}
		);
	}

	public function test_notify_function_requires_valid_email_address()
	{
		$response = $this->post(route('password.email'), ['email' => 'invalid-email']);
		$response->assertSessionHasErrors('email');
	}

	public function test_notify_function_requires_email_input()
	{
		$response = $this->post(route('password.email'), []);
		$response->assertSessionHasErrors('email');
	}

	public function test_reset_password_mail_contains_verification_url_and_content()
	{
		$verificationUrl = $this->faker->url;
		$mail = new ResetPasswordMail($verificationUrl);
		$builtMail = $mail->build();
		$this->assertEquals('Password Reset Notification', $builtMail->subject);
		$this->assertEquals($verificationUrl, $builtMail->viewData['verificationUrl']);
		$content = $builtMail->render();
		$this->assertStringContainsString($verificationUrl, $content);
		$this->assertStringContainsString('click this button to recover a password', $content);
	}

	public function test_reset_password_notification_contains_verification_url_and_data()
	{
		$verificationUrl = $this->faker->url;
		$notifiable = User::factory()->create(['email' => $this->faker->email]);
		$notification = new ResetPasswordNotification($verificationUrl);
		$mail = $notification->toMail($notifiable);
		$this->assertStringContainsString($verificationUrl, $mail->render());
		$this->assertArrayHasKey('verificationUrl', $mail->viewData);
		$this->assertEquals($verificationUrl, $mail->viewData['verificationUrl']);
	}

	public function test_Show_Reset_Form()
	{
		$token = 'some_token';
		$request = new Request([], ['REQUEST_METHOD' => 'GET']);
		$passwordController = new PasswordResetController();
		$view = $passwordController->showResetForm($token, $request);
		$this->assertInstanceOf(View::class, $view);
		$this->assertEquals($token, $view->token);
		$this->assertEquals($request, $view->request);
	}

	public function test_user_can_reset_password()
	{
		$user = User::factory()->create([
			'password' => Hash::make('oldpassword'),
		]);
		$token = Password::createToken($user);
		$response = $this->post('/reset-password', [
			'email'                 => $user->email,
			'password'              => 'newpassword',
			'password_confirmation' => 'newpassword',
			'token'                 => $token,
		]);

		$response->assertRedirect(route('login.show'))
				 ->assertSessionHas('status', trans('passwords.reset'))
				 ->assertSessionDoesntHaveErrors();
		$this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
	}
}
