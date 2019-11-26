<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{


	public function user() {
		$this->belongsTo('App\User');
	}


}
