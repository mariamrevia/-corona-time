<?php

namespace App\Http\Controllers\Sessions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sessions\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function store(LoginRequest $request): RedirectResponse
	{
		if (!auth()->attempt($request->validated())) {
			throw ValidationException::withMessages([
				'email'=> 'your provieded credentials could not be verified',
			]);
		}

		session()->regenerate();
		return back();
	}
}
