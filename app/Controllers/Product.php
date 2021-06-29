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
		
		$data['products']   = $this->model->paginate(8, 'products');
		
		$data['kategori'] = $this->category->findAll();

		$data['pager']      = $this->model->pager;

		// dd($data['categories']);

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

		$db = \Config\Database::connect();
		$builder = $db->table('categories');

		$product['product'] = $this->model->find($id);

		$categories_id = $this->model->find($id)->categories; //[1,2,3]

		$product['product_categories'] = $product['product']->getCategory($categories_id); //[adasdad,asdasd,asdasd]

		$id_categories = [];

		foreach($product['product_categories'] as $c ){
			array_push($id_categories, $c->id);
		}

		$categories = $builder->whereNotIn('id', $id_categories);

		$product['categories'] = $categories->get()->getResult(); //[4,5]
		return view('db_admin/produk/edit_produk', $product);
	}

	public function update($id)

	{
		$product = new \App\Entities\Product();
		$slug    = new Slug();

		$photos = $this->model->find($id)->photos;
		$categories = $this->model->find($id)->categories;
		if($this->request->getPost('category') != null){
			array_push($categories, implode(",", $this->request->getPost('category')));
		}

		// $categories = array(
		//     'categories' => implode(",", $this->request->getPost('category'))
		// );
		if ($this->request->getFileMultiple('file') != null) {

			foreach($this->request->getFileMultiple('file') as $file)
			{   
				if($file->getName() != ''){
					$new_name = $file->getRandomName();
					$file->move(ROOTPATH . 'public/uploads/product_photos', $new_name);

					array_push($photos, $new_name);
				}


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

		return view('db_admin/produk/edit_produk', $product);
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

	public function delete_photo($id, $photo)
	{
		$photos = $this->model->find($id)->photos;
		
		$uns    = $photos[$photo];


		$path   = $_SERVER['DOCUMENT_ROOT'] . '/uploads/product_photos/';
		
		
		if(file_exists($path.$uns)){

			unlink($path.$uns); 

		}

		unset($photos[$photo]);

		$data = [
		    'id'       => $id,
		    'photos' => implode(",", $photos)
		];

  		if($this->model->save($data)){
  			return redirect()->back();
  		}

	}

	public function delete_category($id, $category)
	{
		$categories = $this->model->find($id)->categories;
		
		unset($categories[$category]);
		$data = [
		    'id'       => $id,
		    'categories' => implode(",", $categories)
		];

  		if($this->model->save($data)){
  			return redirect()->back();
  		}


	}

}
