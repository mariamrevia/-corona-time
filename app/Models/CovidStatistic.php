<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CovidStatistic extends Model
{
	use HasFactory;

	use HasTranslations;

	public $translatable = ['country'];

	protected $guarded = ['id'];

	public function scopeFilter($query, array $filters)
	{
		$query->when(
			$filters['search'] ?? false,
			function ($query, $search) {
				$query->where(function ($query) use ($search) {
					$lang = session('locale', 'en');
					if ($lang === 'ka') {
						$query->whereRaw("json_extract(country, '$.en') like ?", ['%' . $search . '%']);
					} else {
						$query->whereRaw("lower(json_extract(country, '$.en')) LIKE ?", ['%' . strtolower($search) . '%']);
					}
				});
			}
		);

		$query->when($filters['sort'] ?? false, function ($query, $sort) {
			$sort = request('sort', 'name');
			$order = request('order', 'asc');

			$column = [
				'name'      => "json_extract(country, '$.en')",
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
