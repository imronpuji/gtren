<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'category'        => 'Clothes'
			],
			[
				'category'        => 'Foods'
			],
			[
				'category'        => 'Electronics'
			],
			[
				'category'        => 'Sports'
			]
		];
		$this->db->table('product_categories')->insertBatch($data);
	}
}
