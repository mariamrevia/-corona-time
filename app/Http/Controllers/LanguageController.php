<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
	public function langSwitch(Request $request)
	{
		$locale = $request->input('locale');
		session(['locale' => $locale]);
		return back();
	}
}
