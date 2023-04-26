<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidStatistic extends Model
{
	use HasFactory;

	protected $guarded = ['id'];

	public function scopeFilter($query, array $filters)
	{
		$query->when(
			$filters['search'] ?? false,
			function ($query, $search) {
				$query->where(function ($query) use ($search) {
					$query->whereRaw("JSON_EXTRACT(country, '$.en') like ?", ['%' . $search . '%'])
						->orWhereRaw("JSON_EXTRACT(country, '$.ka') like ?", ['%' . $search . '%']);
				});
			}
		);

		$query->when($filters['sort'] ?? false, function ($query, $sort) {
			$sort = request('sort', 'name');
			$order = request('order', 'asc');

			$column = [
				'name'      => "JSON_EXTRACT(country, '$.en')",
				'deaths'    => 'deaths',
				'recovered' => 'recovered',
				'confirmed' => 'confirmed',
			];

			if (isset($column[$sort])) {
				$query->orderByRaw("{$column[$sort]} $order");
			}
		});

		return $query;
	}
}
