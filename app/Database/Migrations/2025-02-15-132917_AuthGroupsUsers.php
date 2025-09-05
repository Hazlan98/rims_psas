<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthGroupsUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'agu_id'        => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'agu_ag_id'     => ['type' => 'INT', 'constraint' => 11],
            'agu_au_id'     => ['type' => 'INT', 'constraint' => 11],
            'agu_created_at' => ['type' => 'DATETIME', 'null' => true],
            'agu_updated_at' => ['type' => 'DATETIME', 'null' => true],
            'agu_deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('agu_id', true);
        $this->forge->addForeignKey('agu_ag_id', 'auth_groups', 'ag_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('agu_au_id', 'auth_users', 'au_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('auth_groups_users');
    }

    public function down()
    {
        $this->forge->dropTable('auth_groups_users');
    }
}
