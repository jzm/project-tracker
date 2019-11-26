<?php

namespace App;

use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{

	protected $fillable = [
			'user_id', 'token'
	];


	public static function generateFor(User $user) {
		return static::create([
			'user_id' => $user->id,
			'token' => str_random(50)
		]);
	}


	public function send() {

		$url = url("/auth/token", $this->token);

		\Mail::raw(
			"Click this link to login: {$url}",
			function ($message) {
				$message->to($this->user->email)
				->subject('Login to Project Tracker');
			}
		);
	}


	public function user() {
		return $this->belongsTo('App\User');
	}


	public function getRouteKeyName() {
		return 'token';
	}

}
