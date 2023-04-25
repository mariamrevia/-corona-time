<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidStatistics extends Model
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

		$query->when($filters['sort'] ?? false, function ($query, $sort) use ($filters) {
			$sort = request('sort', 'name');
			$order = request('order', 'asc');

			switch ($sort) {
				case 'name':
					$query->orderByRaw("JSON_EXTRACT(country, '$.en') $order");
					break;
				case 'deaths':
					$query->orderBy('deaths', $order);

					break;
				case 'recovered':
					$query->orderBy('recovered', $order);

					break;
				case 'confirmed':
					$query->orderBy('confirmed', $order);

					break;
				default:
					break;
			}
		});

		return $query;
	}
}
