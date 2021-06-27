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

		$data['products']   = $this->model->paginate(15, 'products');

		$data['pager']      = $this->model->pager;
		
		return view('db_admin/produk/produk_list', $data);
	}

	public function commerce()
	{

		$data['products']   = $this->model->paginate(15, 'products');

		// $data['categories'] = $this->category->findAll();

		$data['pager']      = $this->model->pager;

		// dd($data['products']);

		return view('commerce/home', $data);

	}

	public function detail($slug)
	{
		$data['product'] = $this->model->where('slug', $slug)->first();

		// dd($data['product']);
		return view('commerce/product_detail', $data);
	}

	public function edit($id)

	{

		return view('db_admin/produk/edit_produk');
	}

	public function delete($id)
	{	

		$path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/product_photos/';

		$files = $this->model->find($id);

		$photos = $files;

		$files = glob($path.'*');

		foreach($files as $file){
	      if(is_file($file))
	        unlink($file); 
    	}   

        $delete_product = $this->model->delete($id);

        foreach($photos as $file){
	      	$delete_photo = $this->photo->delete($file->id);
    	} 

        if($delete_product) {
	        session()->setFlashdata('success', 'Data Berhasil Dihapus');
	        return redirect()->to(base_url('/products'));
	    } else {
	        session()->setFlashdata('danger', 'Data Gagal Dihapus');
	        return redirect()->to(base_url('/products')); 
	    }

		return view('db_admin/produk/produk_list');
	}

	public function save()
	{
		$db      = db_connect('default'); 
		$slug    = new Slug();
		$product = new \App\Entities\Product();


		$photos = [];
		$categories = array(
		    'categories' => implode(",", $this->request->getPost('category'))
		);

		if ($this->request->getFileMultiple('file')) {

			foreach($this->request->getFileMultiple('file') as $file)
			{   

				$new_name = $file->getRandomName();

				$file->move(ROOTPATH . 'public/uploads/product_photos', $new_name);

				array_push($photos, $new_name);

			}
		}

		$data = [
			'name'                 => $this->request->getPost('name'),
			'description'          => $this->request->getPost('description'),
			'categories'           => $categories,
			'slug'                 => $this->request->getPost('name'),
			'photos'               => $photos,
			'fixed_price'          => $this->request->getPost('fixed_price'),
			'sell_price'           => $this->request->getPost('sell_price'),
			'affiliate_commission' => $this->request->getPost('affiliate_commission'),
			'stockist_commission'  => $this->request->getPost('stockist_commission')
		];

		$product->fill($data);

		$save_product = $this->model->save($product);


		if(!$save_product) {
			$data['categories'] = $this->category->findAll();
			$data['errors']     = $this->model->errors();
	        return view('db_admin/produk/tambah_produk', $data); 
	    }
	    session()->setFlashdata('success', 'Data Berhasil Disimpan');
	    return redirect()->to(base_url('/products'));

	}

	public function tambah_produk()
	{
		$data['categories'] = $this->category->findAll();

		return view('db_admin/produk/tambah_produk', $data);
	}

}
