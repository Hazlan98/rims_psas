<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EvaluationCriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ec_id' => [
                'type'           => 'INT',
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'ec_number' => [
                'type' => 'INT',
            ],
            'ec_text' => [
                'type' => 'TEXT',
            ],
            'ec_max_score' => [
                'type'    => 'INT',
                'default' => 10,
            ],
            'ec_is_active' => [
                'type'    => 'BOOLEAN',
                'default' => true,
            ],
        ]);
        $this->forge->addKey('ec_id', true);
        $this->forge->createTable('evaluation_criteria', true);
    }

    public function down()
    {
        $this->forge->dropTable('evaluation_criteria', true);
    }
}
