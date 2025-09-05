<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RimsEventField extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ref_id'            => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'ref_re_id'         => ['type' => 'INT', 'constraint' => 11],
            'ref_rf_id'         => ['type' => 'INT', 'constraint' => 11],
            'ref_created_at'    => ['type' => 'DATETIME', 'null' => true],
            'ref_updated_at'    => ['type' => 'DATETIME', 'null' => true],
            'ref_deleted_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('ref_id', true);
        $this->forge->createTable('rims_event_fields');
    }

    public function down()
    {
        $this->forge->dropTable('rims_event_fields');
    }
}
