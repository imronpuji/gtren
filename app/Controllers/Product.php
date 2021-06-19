<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductPhoto;
use App\Models\CategoryModel;
use App\Libraries\Slug;


class Product extends BaseController
{
	protected $category;

	public function __construct()
	{
		helper(['form', 'url']);

		$this->model    = new ProductModel();
		$this->category = new CategoryModel();
		$this->photo    = new ProductPhoto();
	}

	public function index()
	{

		$data['categories'] = $this->category->findAll();

		$data['products']   = $this->model->getProductWithCategory()->paginate(15, 'products');

		$data['pager']      = $this->model->pager;


		return view('db_admin/produk/produk_list', $data);
	}

	public function edit()
	{
		return view('db_admin/produk/edit_produk');
	}

	public function delete($id)
	{	

        $delete_product = $this->model->delete($id);

        if($delete_product) {
	        session()->setFlashdata('success', 'Data Berhasil Dihapus');
	        return redirect()->to(base_url('admin/products'));
	    } else {
	        session()->setFlashdata('danger', 'Data Gagal Dihapus');
	        return redirect()->to(base_url('admin/products')); 
	    }

		return view('db_admin/produk/produk_list');
	}

	public function save()
	{
		$db   = db_connect('default'); 
		$slug = new Slug();


		// save product
		$product = [
			'category_id'          => $this->request->getPost('category'),
			'name'                 => $this->request->getPost('name'),
			'description'          => $this->request->getPost('description'),
			'slug'                 => $slug->slugify($this->request->getPost('name')),
			'fixed_price'          => $this->request->getPost('fixed_price'),
			'sell_price'           => $this->request->getPost('sell_price'),
			'affiliate_commission' => $this->request->getPost('affiliate_commission'),
			'stockist_commission'  => $this->request->getPost('stockist_commission')
		];


		$save_product = $this->model->insert($product);

		if(!$save_product) {
			$data['categories'] = $this->category->findAll();
			$data['errors']     = $this->model->errors();
	        return view('db_admin/produk/tambah_produk', $data); 
	    }
		

		$product_id   = $db->insertID();

		
		if ($this->request->getFileMultiple('file')) {

			foreach($this->request->getFileMultiple('file') as $file)
			{   

				$new_name = $file->getRandomName();

				$file->move(WRITEPATH . 'uploads/product_photos', $new_name);

				$photos   = [
					[
						'photo'      => $new_name,
						'product_id' => $product_id,
					]
				];

				$save_photo = $this->photo->insertBatch($photos);
				if (!$save_photo) {
					session()->setFlashdata('danger', 'Data Gagal Disimpan');
				}
				// $msg        = 'Files has been uploaded';
			}
		}
	    session()->setFlashdata('success', 'Data Berhasil Disimpan');
	    return redirect()->to(base_url('admin/products'));
		// session()->setFlashdata('danger', $this->model->errors());
	    // return redirect()->to(base_url('admin/products')); 


	}

	public function tambah_produk()
	{
		$data['categories'] = $this->category->findAll();

		return view('db_admin/produk/tambah_produk', $data);
	}
}
