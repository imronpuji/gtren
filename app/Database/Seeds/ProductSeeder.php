<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use \CodeIgniter\I18n\Time;

class ProductSeeder extends Seeder
{
	public function run()
	{
		for ($i=0; $i < 100; $i++) { 
			$data = [
				'category_id'          => rand(1, 4),
				'name'                 => static::faker()->bothify('Product ##??'),
				'description'          => static::faker()->realText(200, 2),
				'fixed_price'          => static::faker()->numberBetween(10000, 500000),
				'sell_price'           => static::faker()->numberBetween(10000, 900000),
				'affiliate_commission' => static::faker()->numberBetween(10000, 20000),
				'stockist_commission'  => static::faker()->numberBetween(10000, 20000),
				'created_at'  => Time::now()
			];
			$this->db->table('products')->insert($data);
		}
	}
}
