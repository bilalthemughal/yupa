<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware {
	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return string
	 */
	protected function redirectTo($request) {
		//
		$request->session()->forget('request');
		$request->session()->push('request', json_encode($request->all()));
		// Session::set('request', json_encode($request->all()));
		if (!$request->expectsJson()) {
			return route('login');
		}
	}
}
