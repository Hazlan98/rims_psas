<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthGroups extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ag_id'         => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'ag_name'       => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'ag_desc'       => ['type' => 'TEXT', 'null' => true],
            'ag_created_at' => ['type' => 'DATETIME', 'null' => true],
            'ag_updated_at' => ['type' => 'DATETIME', 'null' => true],
            'ag_deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('ag_id', true);
        $this->forge->createTable('auth_groups');
    }

    public function down()
    {
        $this->forge->dropTable('auth_groups');
    }
}
