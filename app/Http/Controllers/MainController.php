<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController
{

	public function __construct() {
		$this->middleware('activated');
	}

	public function index() {

		return view('index');
	}


}
