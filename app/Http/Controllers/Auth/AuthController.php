<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterRequest;
use App\Http\Requests\Sessions\LoginRequest;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$value = $request->validated()['username'];
		$user = User::where('email', $value)
					->orWhere('username', $value)
					->first();

		if (!$user) {
			throw ValidationException::withMessages([
				'email' => 'The username must be a valid email address or username.',
			]);
		}

		if (!auth()->attempt($request->validated())) {
			throw ValidationException::withMessages([
				'email' => 'The provided credentials are incorrect.',
			]);
		}

		session()->regenerate();
		return redirect()->route('confirm.show');
	}

	public function register(RegisterRequest $request): RedirectResponse
	{
		$validatedData = $request->validated();
		$validatedData['password'] = Hash::make($validatedData['password']);
		$user = User::create($validatedData);

		$user->notify(new VerifyEmailNotification);

		auth()->login($user);
		return redirect()->route('verification.notice');
	}
}
