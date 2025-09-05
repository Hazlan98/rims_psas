<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Evaluations extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ev_id' => [
                'type'           => 'INT',
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'ev_rpi_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'ev_rj_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'ev_re_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'ev_review_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'ev_total_score' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'default'    => 0.00,
            ],
            'ev_additional_comments' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'ev_recommendation' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'ev_publication_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'ev_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'draft',
            ],
            'ev_created_at' => [
                'type' => 'DATETIME',
                'null'    => true,
            ],
            'ev_updated_at' => [
                'type' => 'DATETIME',
                'null'    => true,
            ],
        ]);
        $this->forge->addKey('ev_id', true);
        $this->forge->createTable('evaluations', true);
    }

    public function down()
    {
        $this->forge->dropTable('evaluations', true);
    }
}
