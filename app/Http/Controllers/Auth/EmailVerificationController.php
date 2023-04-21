<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class EmailVerificationController extends Controller
{
	public function verify(EmailVerificationRequest $request, User $user): RedirectResponse
	{
		$request->fulfill();
		auth()->logout($user);
		return redirect()->route('congrats.show');
	}
}
