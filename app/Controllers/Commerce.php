<?php

namespace App\Controllers;

class Commerce extends BaseController
{
	public function index()
	{
		return view('commerce/home');
	}

	public function Auth()
	{
		return view('commerce/auth_commerce/login_register');
	}

}
