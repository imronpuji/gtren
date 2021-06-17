<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class Product extends BaseController
{
	protected $category;

	public function __construct()
	{
		$this->model    = new ProductModel();
		$this->category = new CategoryModel();
	}

	public function index()
	{

		$data['categories'] = $this->category->findAll();


		$data['products']   = $this->model->join('product_categories', 'product_categories.id = products.category_id')->paginate(15, 'products');

		$data['pager']      = $this->model->pager;


		return view('db_admin/produk/produk_list', $data);
	}

	public function edit()
	{
		return view('db_admin/produk/edit_produk');
	}
}
