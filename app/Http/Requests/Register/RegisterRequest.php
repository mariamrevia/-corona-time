<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'username' => 'required|min:3|unique:users,username',
			'email'    => 'required|email|unique:users,email',
			'password' => 'required|confirmed|min:3',
		];
	}
}
