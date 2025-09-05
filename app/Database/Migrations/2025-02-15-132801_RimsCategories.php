<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RimsCategories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rc_id'         => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'rc_desc'       => ['type' => 'TEXT'],
            'rc_created_at' => ['type' => 'DATETIME', 'null' => true],
            'rc_updated_at' => ['type' => 'DATETIME', 'null' => true],
            'rc_deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('rc_id', true);
        $this->forge->createTable('rims_categories');
    }

    public function down()
    {
        $this->forge->dropTable('rims_categories');
    }
}
