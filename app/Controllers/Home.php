<?php

namespace App\Controllers;

class Home extends BaseController
{
	// public function __construct()
	// {
	// 	load model
	// }

	public function index()
	{
		return view('welcome_message');
	}

	// public function add()
	// {
	// 	// code...
	// }
	//
	// public function proses($value='')
	// {
	// 	// code...
	// }
}
