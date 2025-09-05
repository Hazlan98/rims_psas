<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RimsPaperRemarks extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rpr_id'            => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'rpr_rpi_id'        => ['type' => 'INT', 'constraint' => 11],
            'rpr_remarks'       => ['type' => 'TEXT'],
            'rpr_read_status'   => ['type' => 'BOOLEAN', 'default' => false],
            'rpr_reprimand_id'  => ['type' => 'INT', 'constraint' => 11],
            'rpr_created_at'    => ['type' => 'DATETIME', 'null' => true],
            'rpr_updated_at'    => ['type' => 'DATETIME', 'null' => true],
            'rpr_deleted_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('rpr_id', true);
        $this->forge->createTable('rims_paper_remarks');
    }

    public function down()
    {
        $this->forge->dropTable('rims_paper_remarks');
    }
}
