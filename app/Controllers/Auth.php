<?php

namespace App\Controllers;
use App\Models\AuthModel;
use App\Models\MemberModel;

class Auth extends BaseController
{
    public $auth, $member;

    public function __construct()
    {
        $this->member = new MemberModel();
        return $this->auth = new AuthModel();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $username  = $this->request->getPost('username');
		$password  = $this->request->getPost('password');

        $cek_login = $this->auth->getWhere([
			'username' => $username
		])->getRow();

        if ($cek_login) {
            if (password_verify($password, $cek_login->password)) {
                echo "Sukses";
            } else {
                echo "Login Gagal";
            }
        } else {
            echo "Username tidak ditemukan";
        }
        echo "<pre>";
        var_dump($cek_login);
    }

    public function test()
    {
        echo "string";
    }

    public function register()
    {
        echo view('templates/top');
        echo view('auth/register');
        echo view('templates/bot');
    }

    public function register_proses()
    {
        $ref = $this->request->getPost('ref');
        $name = $this->request->getPost('nama');
        echo "$name register dengan ref = $ref";
    }
}
