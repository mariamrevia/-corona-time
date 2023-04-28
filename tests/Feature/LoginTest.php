<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	use RefreshDatabase;

	public function test_login_page_is_accessible()
	{
		$response = $this->get(route('login.show'));
		$response->assertSuccessful();
		$response->assertSee('Welcome Back');
	}

	public function test_login_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post(route('login'));

		$response->assertSessionHasErrors(['username', 'password']);
	}

	public function test_login_should_give_us_required_error_if_username_input_is_not_provided()
	{
		$response = $this->post(route('login'), [
			'password' => 'my-password',
		]);
		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_login_should_give_us_required_error_if_password_input_is_not_provided()
	{
		$response = $this->post(route('login'), [
			'username' => 'mariamrevia',
		]);
		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_login_should_give_us_username_error_if_provided_username_is_not_correct()
	{
		{
			User::factory()->create([
				'username'    => 'mariam@test.com',
				'password'    => bcrypt('password123'),
			]);

			$response = $this->post(route('login'), [
				'username' => 'mar',
				'password' => bcrypt('password123'),
			]);

			$response->assertSessionHasErrors(['username'=>trans('validation.valid-username')]);
		}
	}

	public function test_login_should_give_us_credential_error_if_password_is_not_correct()
	{
		{
			User::factory()->create([
				'username'    => 'mariam@test.com',
				'password'    => bcrypt('password123'),
			]);

			$response = $this->post('/login', [
				'username' => 'mariam@test.com',
				'password' => bcrypt('password'),
			]);

			$response->assertSessionHasErrors(['username' => trans('validation.email')]);
		}
	}

	public function test_login_should_redirect_us_to_dashboard_worldwide_page_after_successful_login()
	{
		$username = 'mariam@test.com';
		$password = 'password';

		User::factory()->create(
			[
				'username' => $username,
				'password' => bcrypt($password),
			]
		);

		$response = $this->post(route('login'), [
			'username' => $username,
			'password' => $password,
		]);

		$response->assertRedirect(route('worldwide.show'));
	}
}
