<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{

	protected $table         = "members";
	protected $primaryKey    = "id";
	protected $allowedFields = [
        "role_id",
        "user_id",
        "name",
        "phone",
        "email",
        "address"
    ];

}

?>
