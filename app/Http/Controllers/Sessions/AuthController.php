<?php

namespace App\Http\Controllers\Sessions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sessions\StoreLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function store(StoreLoginRequest $request): RedirectResponse
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
