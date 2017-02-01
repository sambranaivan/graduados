<?php

namespace graduados\Http\Controllers;

class BackController extends Controller {
	public function index() {
		return view('auth/login');
	}
	public function general() {
		return view('back/panel');
	}
}
