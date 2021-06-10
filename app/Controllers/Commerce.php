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

	public function Cart()
	{
		return view('commerce/cart');
	}

	public function Account()
	{
		return view('commerce/account');
	}

	public function Contact()
	{
		return view('commerce/contact');
	}

	public function Checkout()
	{
		return view('commerce/checkout');
	}

	public function Product_detail()
	{
		return view('commerce/product_detail');
	}

	public function Wishlist()
	{
		return view('commerce/wishlist');
	}

}
