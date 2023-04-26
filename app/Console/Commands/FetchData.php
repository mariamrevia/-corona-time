<?php

namespace App\Console\Commands;

use App\Models\CovidStatistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchData extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:fetch-data';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$response = Http::get('https://devtest.ge/countries');
		$data = $response->json();

		$this->info('Data fetched and saved successfully.');

		foreach ($data as $country) {
			$code = $country['code'];

			$response = Http::post('https://devtest.ge/get-country-statistics', [
				'code' => $code,
			]);
			$stats = $response->json();
			// $results[$code] = $stats;

			CovidStatistic::updateOrCreate(
				['code' => $country['code']],
				[
					'country'      => json_encode([
						'en' => $country['name']['en'],
						'ka' => $country['name']['ka'],
					]),
					'code' => $country['code'],

					'deaths'    => $stats['deaths'],
					'recovered' => $stats['recovered'],
					'confirmed' => $stats['confirmed'],
				]
			);
		}
	}
}
