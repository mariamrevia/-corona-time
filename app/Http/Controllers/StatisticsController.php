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
			]
		);
	}
}
