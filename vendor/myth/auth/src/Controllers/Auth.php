<?php 
namespace Myth\Auth\Controllers;

use Config\Email;
use CodeIgniter\Controller;
use Myth\Auth\Entities\User;

class Auth extends Controller
{

	public function __construct()
	{
		// Most services in this controller require
		// the session to be started - so fire it up!
		$this->session = service('session');

		$this->config = config('Auth');
		$this->auth = service('authentication');
	}

	public function login()
	{
		// echo "tes";
		return view($this->config->views['authLogin'], ['config' => $this->config]);
	}

	public function register()
	{
		return view($this->config->views['authRegister'], ['config' => $this->config]);

	}

}