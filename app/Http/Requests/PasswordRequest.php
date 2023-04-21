<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'token'    => 'required',
			'email'    => 'required|email',
			'password' => 'required|confirmed',
        ];
    }
}
