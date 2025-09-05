<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RimsFieldTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rf_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'rf_desc' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'rf_rc_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'rf_created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'rf_updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'rf_deleted_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        // Set Primary Key
        $this->forge->addPrimaryKey('rf_id');

        // Set Foreign Key (Assuming rims_categories table has a primary key `rc_id`)
        $this->forge->addForeignKey('rf_rc_id', 'rims_categories', 'rc_id', 'CASCADE', 'CASCADE');

        // Create the Table
        $this->forge->createTable('rims_field');
    }

    public function down()
    {
        $this->forge->dropTable('rims_field');
    }
}
