<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistics;

class StatisticsController extends Controller
{
	public function showStatistics(CovidStatistics $statistics)
	{
		$statistics = CovidStatistics::filter(
			request(['search', 'sort'])
		)->get();
		return view(
			'dashboard.covidstatistics',
			[
				'statistics' => $statistics,
				'totals'     => $this->SumData(),
			],
		);
	}

	public function showWorldwide()
	{
		return view('dashboard.worldwide', [
			'totals'     => $this->SumData(),
		]);
	}

	private function SumData()
	{
		$totalDeaths = CovidStatistics::sum('deaths');
		$totalConfirmed = CovidStatistics::sum('confirmed');
		$totalRecovered = CovidStatistics::sum('recovered');

		return [
			'totalDeaths'    => $totalDeaths,
			'totalConfirmed' => $totalConfirmed,
			'totalRecovered' => $totalRecovered,
		];
	}
}
