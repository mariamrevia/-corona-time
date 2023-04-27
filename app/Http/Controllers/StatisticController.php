<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistic;

class StatisticController extends Controller
{
	public function showStatistics(CovidStatistic $statistics)
	{
		$statistics = CovidStatistic::filter(
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
		$totalDeaths = CovidStatistic::sum('deaths');
		$totalConfirmed = CovidStatistic::sum('confirmed');
		$totalRecovered = CovidStatistic::sum('recovered');

		return [
			'totalDeaths'    => $totalDeaths,
			'totalConfirmed' => $totalConfirmed,
			'totalRecovered' => $totalRecovered,
		];
	}
}
