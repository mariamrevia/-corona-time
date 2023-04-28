<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	use RefreshDatabase;

	public function test_register_page_is_accessible()
	{
		$response = $this->get(route('register.show'));
		$response->assertSuccessful();
		$response->assertSee('Welcome to Coronatime');
	}

	public function test_register_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post(route('register'));
		$response->assertSessionHasErrors(['username', 'email', 'password']);
	}

	public function test_register_should_give_us_email_error_if_provided_email_already_exists()
	{
		User::factory()->create([
			'email' => 'mariam@test.com',
		]);
		$response = $this->post(route('register'), [
			'username'              => 'mariamrevia',
			'email'                 => 'mariam@test.com',
		]);
		$response->assertSessionHasErrors(['email' => trans('validation.unique', ['attribute' => 'email'])]);
	}

	public function test_register_should_give_us_username_error_if_provided_username_already_exists()
	{
		User::factory()->create([
			'username' => 'mariamrevia',
		]);
		$response = $this->post(route('register'), [
			'username'              => 'mariamrevia',
			'email'                 => 'mariam@test.com',
		]);
		$response->assertSessionHasErrors(['username' => trans('validation.unique', ['attribute' => 'username'])]);
	}

	public function test_register_should_give_us_required_error_if_password_input_is_not_provided()
	{
		$response = $this->post(route('login'), [
			'username' => 'mariamrevia',
			'email'    => 'mariam@test.com',
		]);
		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_register_should_give_us_required_error_if_username_input_is_not_provided()
	{
		$response = $this->post(route('register'), [
			'password'              => 'password',
			'email'                 => 'mariam@test.com',
		]);
		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_register_should_give_us_required_error_if_email_input_is_not_provided()
	{
		$response = $this->post(route('register'), [
			'password'              => 'password',
			'username'              => 'mariam',
		]);
		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_register_should_fail_if_password_and_confirmation_do_not_match()
	{
		$userData = [
			'username'              => 'mariamrevia',
			'email'                 => 'mariam@test.com',
			'password'              => 'password123',
			'password_confirmation' => 'password',
		];

		$response = $this->post(route('register'), $userData);
		$response->assertSessionHasErrors(['password']);
	}

	public function test_register_should_redirect_us_to_verification_notice_page_after_successful_register()
	{
		$userData = [
			'username'              => 'mariam',
			'email'                 => 'mariam@test.com',
			'password'              => 'password123',
			'password_confirmation' => 'password123',
		];

		$response = $this->post('/register', $userData);

		$response->assertRedirect(route('verification.notice'));

		$this->assertDatabaseHas('users', [
			'username' => $userData['username'],
			'email'    => $userData['email'],
		]);
	}
}
