<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Address extends Entity
{
	protected $attributes = [
		'user_id'       => null,
		'provinsi'      => null,
		'kabupaten'     => null,
		'kecamatan'     => null,
		'kode_pos'      => null,
		'detail_alamat' => null,
		'type'          => null,
		'created_at'    => null,
		'updated_at'    => null,
		'deleted_at'    => null,
    ];

	protected $dates   = [
		'created_at',
		'updated_at',
		'deleted_at',
	];
	protected $casts   = [];
}
