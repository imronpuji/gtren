<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'email' => 'm.hilmimubarok@gmail.com',
				'username' => 'hilmimubarok',
				'fullname' => 'Hilmi Mubarok',
				'phone' => 083127903672,
				'password_hash' => password_hash("koploplo123!@#", PASSWORD_DEFAULT)
			],
			[
				'email' => 'imronpuji5@gmail.com',
				'username' => 'imronpuji',
				'fullname' => 'Imron Puji',
				'phone' => 0831273456,
				'password_hash' => password_hash("koploplo123!@#", PASSWORD_DEFAULT)
			]
		];
		$this->db->table('users')->insertBatch($data);
	}
}
