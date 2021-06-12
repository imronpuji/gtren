<?php

namespace App\Controllers;
use App\Models\CategoryModel;

class Admin extends BaseController
{
	public $model;

	public function __construct()
	{
		$uri = service('uri');
	}
	public function index()
	{
		return view('db_admin/produk/tambah_produk');
	}

	public function produk_list()
	{
		return view('db_admin/produk/produk_list');
	}
	
	public function order()
	{
		return view('db_admin/order/order');
	}

	public function order_detail()
	{
		return view('db_admin/order/order_detail');
	}

	public function member_admin()
	{
		return view('db_admin/members/member_admin');
	}

	public function member_finance()
	{
		return view('db_admin/members/member_finance');
	}

	public function add_member()
	{
		return view('db_admin/members/add_member');
	}

}
