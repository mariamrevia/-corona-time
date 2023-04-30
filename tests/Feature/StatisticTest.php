<?php

namespace Tests\Feature;

use App\Models\CovidStatistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	use RefreshDatabase;

	protected $data1;

	protected $data2;

	protected function setUp(): void
	{
		parent::setUp();
		$user = User::factory()->create();
		$this->actingAs($user);

		$this->data1 = CovidStatistic::factory()->create([
			'country' => [
				'en' => 'Albania',
				'ka' => 'ალბანეთი',
			],
			'confirmed' => 100,
			'deaths'    => 10,
			'recovered' => 90,
		]);

		$this->data2 = CovidStatistic::factory()->create([
			'country' => [
				'en' => 'Canada',
				'ka' => 'კანადა',
			],
			'confirmed' => 200,
			'deaths'    => 20,
			'recovered' => 180,
		]);
	}

	public function test_dashboard_bycountry_page_is_accessible_for_authenticated_and_verified_user()
	{
		$user = User::factory()->create([
			'email_verified_at' => now(),
		]);
		$this->actingAs($user);
		$response = $this->get(route('statistics.show'));
		$response->assertSuccessful();
		$response->assertSee('Statistics by Country');
	}

	public function test_dashboard_worldwide_page_is_accessible_for_authenticated_and_verified_user()
	{
		$user = User::factory()->create([
			'email_verified_at' => now(),
		]);
		$this->actingAs($user);
		$response = $this->get(route('worldwide.show'));
		$response->assertSuccessful();
		$response->assertSee('Worldwide Statistics');
	}

	public function test_search_in_georgian()
	{
		$response = $this->withSession(['locale' => 'ka'])
			->get('/dashboard/byCountry?search=ალბანეთი');

		$response->assertStatus(200);
		$response->assertViewHas('statistics');
		$viewData = $response->viewData('statistics');

		$this->assertCount(1, $viewData);
		$this->assertEquals($this->data1->id, $viewData->first()->id);
	}

	public function test_search_in_english()
	{
		$response = $this->withSession(['locale' => 'en'])
			->get('/dashboard/byCountry?search=Albania');

		$response->assertStatus(200);
		$response->assertViewHas('statistics');
		$viewData = $response->viewData('statistics');

		$this->assertCount(1, $viewData);
		$this->assertEquals($this->data1->id, $viewData->first()->id);
	}

	public function test_sort_confirmed_asc()
	{
		$response = $this->get('/dashboard/byCountry?sort=confirmed&order=asc');

		$response->assertStatus(200);
		$viewData = $response->viewData('statistics');

		$this->assertNotEmpty($viewData);
		$this->assertTrue($viewData->count() > 1);

		$prevConfirmed = null;
		foreach ($viewData as $item) {
			if (!is_null($prevConfirmed)) {
				$this->assertGreaterThanOrEqual($prevConfirmed, $item->confirmed);
			}
			$prevConfirmed = $item->confirmed;
		}
	}
}
