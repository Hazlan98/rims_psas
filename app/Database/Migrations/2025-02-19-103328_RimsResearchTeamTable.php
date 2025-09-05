<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RimsResearchTeamTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rrt_id'          => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'rrt_rpi_id'      => ['type' => 'INT', 'constraint' => 11],
            'rrt_name'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'rrt_role'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'rrt_created_at'  => ['type' => 'DATETIME', 'null' => true],
            'rrt_updated_at'  => ['type' => 'DATETIME', 'null' => true],
            'rrt_deleted_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('rrt_id', true);
        $this->forge->addForeignKey('rrt_rpi_id', 'rims_paper_information', 'rpi_id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('rims_research_team');
    }

    public function down()
    {
        $this->forge->dropTable('rims_research_team');
    }
}
