<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistic;
use Illuminate\Contracts\View\View;

class StatisticController extends Controller
{
	public function showStatistics(CovidStatistic $statistics): View
	{
		$statistics = CovidStatistic::filter(
			request(['search', 'sort', 'order'])
		)->get();
		return view(
			'dashboard.covidstatistics',
			[
				'statistics' => $statistics,
				'totals'     => $this->SumData(),
			],
		);
	}

	public function showWorldwide(): View
	{
		return view('dashboard.worldwide', [
			'totals'     => $this->SumData(),
		]);
	}

	private function SumData(): array
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
