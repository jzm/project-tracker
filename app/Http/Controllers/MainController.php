<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController
{

	public function __construct() {
	}

	public function index() {

		return 'yep';
	}
}
