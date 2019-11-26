<?php

namespace App;

use App\User;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthenticatesUser {

	protected $request;
	use ValidatesRequests;


	public function __construct(Request $request) {
		$this->request = $request;
	}



	public function invite() {
		$this->validateRequest()
				 ->createToken()
				 ->send();
	}


	public function login(LoginToken $token) {
		Auth::login($token->user);
		$token->delete();
	}


	protected function validateRequest() {
		$this->validate($this->request, [
			'email' => 'required|email|exists:users'
		]);
		return $this;
	}


	protected function createToken() {
		$user = User::byEmail($this->request->email);
		return LoginToken::generateFor($user);
	}



}
