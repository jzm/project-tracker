<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\LoginToken;
use App\AuthenticatesUser;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthController extends Controller
{

	protected $auth;

	public function __construct(AuthenticatesUser $auth) {
		$this->auth = $auth;
	}


	public function login() {
		return view('login');
	}


	public function postLogin() {
		$this->auth->invite();
		return "You have received an email to login. Check spam if you can't find it.";
	}


	public function authenticate(LoginToken $token) {
		$this->auth->login($token);
		return redirect('/');
	}


	public function logout() {
		Auth::logout();
		return redirect('/');
	}


	public function register() {
		return view('register');
	}



	public function postRegister(Request $request) {
		$data = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users'
		]);
		$this->create($data);
		return redirect('/login')->with('message', 'Registration complete, you may now log in.');
	}





	protected function validator(array $data)
	{
			return \Validator::make($data, [
					'name' => ['required', 'string', 'max:255'],
					'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data)
	{
			return User::create([
					'name' => $data['name'],
					'email' => $data['email'],
			]);
	}

}
