<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\CustomResetPassword;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
	public function notify(Request $request): RedirectResponse
	{
		$attributes = $request->validate(['email' => 'required|email']);
		$user = User::where('email', $attributes['email'])->first();

		if (!$user) {
			return back()->withErrors(['email' => trans('error')]);
		}
		$token = app('auth.password.broker')->createToken($user);
		$verificationUrl = url('/reset-password/' . $token . '?email=' . $attributes['email']);
		$user->notify(new CustomResetPassword($verificationUrl));
		return redirect()->route('confirm.show');
	}

	public function showResetForm(string $token, Request $request): View
	{
		return
	view('reset-password', ['token' => $token, 'request' => $request]);
	}

	public function update(PasswordRequest $request): RedirectResponse
	{
		$request->validated();
		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function (User $user, string $password) {
				$user->forceFill([
					'password' => Hash::make($password),
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		return $status === Password::PASSWORD_RESET
					? redirect()->route('login.show')->with('status', __($status))
					: back()->withErrors(['email' => [__($status)]]);
	}
}
