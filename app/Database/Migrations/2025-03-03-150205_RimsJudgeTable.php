<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RimsJudgeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rj_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'rj_au_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'rj_rf_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'rj_re_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'rj_created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'rj_updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'rj_deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('rj_id');
        $this->forge->createTable('rims_judge');
    }

    public function down()
    {
        $this->forge->dropTable('rims_judge');
    }
}
