<?php

namespace Tests\Feature;

use Tests\TestCase;

class LanguageTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	public function test_it_changes_language_successfully()
	{
		$response = $this->post('/languages/{locale}', ['locale' => 'ka']);
		$response->assertRedirect(url()->previous());
		$this->assertEquals(session('locale'), 'ka');
	}
}
