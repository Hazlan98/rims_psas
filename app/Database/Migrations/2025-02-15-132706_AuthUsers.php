<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'au_id'          => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'au_username'    => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'au_password'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'au_created_at'  => ['type' => 'DATETIME', 'null' => true],
            'au_updated_at'  => ['type' => 'DATETIME', 'null' => true],
            'au_deleted_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('au_id', true);
        $this->forge->createTable('auth_users');
    }

    public function down()
    {
        $this->forge->dropTable('auth_users');
    }
}
