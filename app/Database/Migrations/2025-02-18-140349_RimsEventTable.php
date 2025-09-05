<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RimsEventTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            're_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            're_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            're_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            're_rc_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            're_start_date' => [
                'type' => 'DATE',
            ],
            're_end_date' => [
                'type' => 'DATE',
            ],
            're_location' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            're_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            're_organizer' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            're_status' => [
                'type'       => 'ENUM',
                'constraint' => ['upcoming', 'ongoing', 'completed', 'canceled'],
                'default'    => 'upcoming',
            ],
            're_max_participants' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            're_registration_deadline' => [
                'type' => 'DATE',
                'null' => true,
            ],
            're_banner_image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            're_contact_email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            're_speakers' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            're_created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            're_updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            're_deleted_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ]
        ]);

        $this->forge->addPrimaryKey('re_id');
        $this->forge->createTable('rims_event');
    }

    public function down()
    {
        $this->forge->dropTable('rims_event');
    }
}
