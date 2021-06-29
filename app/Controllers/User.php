<?php

namespace App\Controllers;
use App\Models\AccountUpgradeModel;

class User extends BaseController
{
	public function account()
	{

		helper(['greeting_helper']);
		$data['segments'] = $this->request->uri->getSegments();

		return view('commerce/account', $data);
	}

	public function orders()
	{
		$data['segments'] = $this->request->uri->getSegments();

		return view('commerce/account', $data);
	}

	public function tracking()
	{
		$data['segments'] = $this->request->uri->getSegments();

		$curl = curl_init();

		$url = "https://api.binderbyte.com/v1/list_courier?api_key=1c276a5a2b00d61eafaa0a22a92dd95329d409678a46d1b8e580cc7c80d71c97";
		
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		$response        = curl_exec($curl);
		$set_to_array    = json_decode($response, TRUE);
		$data['couries'] = $set_to_array;
		return view('commerce/account', $data);
	}

	public function address()
	{
		$data['segments'] = $this->request->uri->getSegments();

		return view('commerce/account', $data);
	}

	public function profile()
	{
		$data['segments'] = $this->request->uri->getSegments();

		return view('commerce/account', $data);
	}

	public function upgrade()
	{
		$data['segments'] = $this->request->uri->getSegments();


		if ($this->request->getPost()) {

			$upgrade = new AccountUpgradeModel();
			$data = [
				'user_id' => intval(user()->id),
				'code'    => $this->request->getPost('code'),
				'status'  => 'pending'
			];
			
			$save = $upgrade->insert($data);

			if (!$save) {
				return redirect()->back();
			}
			session()->setFlashdata('success', 'Sukses!, Silahkan menunggu proses verifikasi oleh Admin.');
			return redirect()->back();
		}

		return view('commerce/account', $data);
	}

}
