<?php

namespace App\Http\Requests\Sessions;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'login' => [
				'required',
				function ($attribute, $value, $fail) {
					$user = User::where('email', $value)
						->orWhere('username', $value)
						->first();

					if (!$user) {
						$fail('The ' . $attribute . ' must be a valid email address or username.');
					}
				},
			],
			'password' => 'required',
		];
	}
}
