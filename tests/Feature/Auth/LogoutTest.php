<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	use RefreshDatabase;

	public function test_successfull_log_out()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		$response = $this->post(route('logout'));
		$response->assertRedirect(route('login.show'));
	}
}
