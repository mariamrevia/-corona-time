<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
	public function store(StoreRegisterRequest $request): RedirectResponse
	{
		$user = User::create($request->validated());

		auth()->login($user);
		return redirect()->route('email.confirm');
	}
}
