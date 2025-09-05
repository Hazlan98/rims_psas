<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersInformation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ui_id'           => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'ui_name'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'ui_email'        => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'ui_address'      => ['type' => 'TEXT', 'null' => true],
            'ui_phone_number' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'ui_au_id'        => ['type' => 'INT', 'constraint' => 11],
            'ui_created_at'   => ['type' => 'DATETIME', 'null' => true],
            'ui_updated_at'   => ['type' => 'DATETIME', 'null' => true],
            'ui_deleted_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('ui_id', true);
        $this->forge->addForeignKey('ui_au_id', 'auth_users', 'au_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('users_information');
    }

    public function down()
    {
        $this->forge->dropTable('users_information');
    }
}
