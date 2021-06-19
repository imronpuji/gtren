<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductPhoto;
use App\Models\CategoryModel;


class Product extends BaseController
{
	protected $category;

	public function __construct()
	{
		helper(['form', 'url']);

		$this->model    = new ProductModel();
		$this->category = new CategoryModel();
		$this->photo = new ProductPhoto();
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
		$db = db_connect('default'); 

		// save product
		$product = [
			'category_id' => $this->request->getPost('category'),
			'name' => $this->request->getPost('product_name'),
			'description' => $this->request->getPost('description'),
			'fixed_price' => $this->request->getPost('fixed_price'),
			'sell_price' => $this->request->getPost('sell_price'),
			'affiliate_commission' => $this->request->getPost('affiliate_commission'),
			'stockist_commission' => $this->request->getPost('stockist_commission'),
		];

		$save_product = $this->model->insert($product);
		$product_id = $db->insertID();

		
		// save photo
		// $get_photo_1 = $this->request->getFile('photos');



		// $get_photo_2 = $this->request->getFile('photos_2');
		// $get_photo_3 = $this->request->getFile('photos_3');

        // $get_photo_1->move(ROOTPATH . 'public/product_photos');
        // $get_photo_2->move(ROOTPATH . 'public/foto_produk');
        // $get_photo_3->move(ROOTPATH . 'public/foto_produk');


		  if ($this->request->getFileMultiple('file')) {
 
             foreach($this->request->getFileMultiple('file') as $file)
             {   


 				$new_name = $file->getRandomName();

                $file->move(ROOTPATH . 'public/product_photos', $new_name);
 
              $photos = [
              	[
                'photo' =>  $new_name,
		        'product_id'  => $product_id,
		    	]
              ];
 
              $save_photo = $this->photo->insertBatch($photos);

              $msg = 'Files has been uploaded';
             }
        } 

		// Notif

		if($save_product) {
	        session()->setFlashdata('success', 'Data Berhasil Disimpan');
	        return redirect()->to(base_url('admin/products'));
	    } else {
	        session()->setFlashdata('danger', 'Data Gagal Disimpan');
	        return redirect()->to(base_url('admin/products')); 
	    }
	}

	public function tambah_produk()
	{
		$data['categories'] = $this->category->findAll();

		return view('db_admin/produk/tambah_produk', $data);
	}
}
