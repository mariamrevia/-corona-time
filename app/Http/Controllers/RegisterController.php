<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
	public function store(RegisterRequest $request): RedirectResponse
	{
		$user = User::create($request->validated());

		auth()->login($user);
		return redirect()->route('email.confirm');
	}
}
