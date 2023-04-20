<?php

namespace App\Http\Requests\Sessions;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	public function rules(): array
	{
		// ddd(request()->all());
		return [
			'username' => 'required',
			'password' => 'required',
		];
	}
}
