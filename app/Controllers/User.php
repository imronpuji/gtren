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

	public function upgradeList()
	{
		helper(['status_upgrade_helper']);
		$upgrade         = new \App\Models\AccountUpgradeModel();
		$data['members'] = $upgrade->getAll();
		return view('db_admin/members/member_upgrade', $data);
	}

	public function action($value, $id)
	{
		$authorize = service('authorization');
		$upgrade   = new \App\Models\AccountUpgradeModel();
		$user      = $upgrade->getAll($id);

		
		switch ($value) {
			case 'rerject':
				$data = [
					'status' => 'rejected'
				];
				$update = $upgrade->update($id, $data);
				if ($update) {
					return redirect()->back();
				}
				break;
			
			default:
				$data = [
					'status' => 'approved'
				];
				$update = $upgrade->update($id, $data);
				if ($update) {
					$add_to_group = $authorize->addUserToGroup($user->id_user, 'stockist');
					// $remove_from_group = $authorize->removeUserFromGroup($user->id_user, 'user');
					return redirect()->back();
				}
				break;
		}
	}

}
