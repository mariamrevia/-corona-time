<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerificationController extends Controller
{
	public function verify(EmailVerificationRequest $request, User $user): RedirectResponse
	{
		$request->fulfill();
		auth()->logout($user);
		return redirect()->route('email.congrats');
	}
}
