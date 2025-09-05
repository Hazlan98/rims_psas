<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RimsNotifications extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rn_id'          => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'rn_au_id'       => ['type' => 'INT', 'constraint' => 11],
            'rn_title'       => ['type' => 'TEXT'],
            'rn_description' => ['type' => 'TEXT'],
            'rn_is_read'     => ['type' => 'BOOLEAN', 'default' => false],
            'rn_created_at'  => ['type' => 'DATETIME', 'null' => true],
            'rn_updated_at'  => ['type' => 'DATETIME', 'null' => true],
            'rn_deleted_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('rn_id', true);
        $this->forge->createTable('rims_notifications');
    }

    public function down()
    {
        $this->forge->dropTable('rims_notifications');
    }
}
