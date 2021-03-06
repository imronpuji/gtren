<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAccountUpgrades extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'         => [
				'type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true
			],
			'user_id'    => ['type' => 'int', 'constraint' => 11, 'null' => true, 'unsigned' => true],
			'code'       => ['type' => 'text', 'null' => true],
			'status'     => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'created_at' => ['type' => 'datetime', 'null'      => true],
			'updated_at' => ['type' => 'datetime', 'null'      => true],
			'deleted_at' => ['type' => 'datetime', 'null'      => true],
        ]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('account_upgrades', true);
	}

	public function down()
	{
		$this->forge->dropTable('account_upgrades', true);
	}
}
