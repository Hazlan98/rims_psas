<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EvaluationScores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'es_id' => [
                'type'           => 'INT',
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'es_ev_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'es_ec_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'es_score' => [
                'type' => 'INT',
                'null' => true,
            ],
            'es_comment' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('es_id', true);
        $this->forge->createTable('evaluation_scores', true);
    }

    public function down()
    {
        $this->forge->dropTable('evaluation_scores', true);
    }
}
