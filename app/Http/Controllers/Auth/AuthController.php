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
				'username' => trans('validation.valid-username'),
			]);
		}

		$attributes = $request->validated();
		if (!auth()->attempt(['email' => $user->email, 'password' => $attributes['password']], $request->remember)) {
			throw ValidationException::withMessages([
				'email' => trans('validation.email'),
			]);
		}

		session()->regenerate();
		return redirect()->route('worldwide.show');
	}

	public function destroy()
	{
		auth()->logout();
		return redirect()->route('login.show');
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
