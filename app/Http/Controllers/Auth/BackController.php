<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class BackController extends Controller {
	public function index() {
		return view('auth.login');
	}

	public function general() {
		return view('auth.dashboard.panel');
	}
}
