<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FetchDataTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	use RefreshDatabase;

	public function test_it_fetches_and_saves_data_successfully()
	{
		$this->artisan('app:fetch-data')->expectsOutput('Data fetched and saved successfully.');
		$this->assertDatabaseCount('covid_statistics', 105);
	}
}
