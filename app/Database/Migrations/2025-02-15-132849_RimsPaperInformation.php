<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RimsPaperInformation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rpi_id'                    => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'rpi_title'                 => ['type' => 'TEXT'],
            'rpi_abstract'              => ['type' => 'TEXT'],
            'rpi_full_paper'            => ['type' => 'TEXT', 'null' => true],
            'rpi_turnitin_report'       => ['type' => 'TEXT', 'null' => true],
            'rpi_status'                => ['type' => 'VARCHAR', 'constraint' => 50],
            'rpi_rf_id'                 => ['type' => 'INT', 'constraint' => 11],
            'rpi_re_id'                 => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'rpi_presentation_link'     => ['type' => 'TEXT', 'null' => true],
            'rpi_owner_id'              => ['type' => 'INT', 'constraint' => 11],
            'rpi_presenter_id'          => ['type' => 'INT', 'constraint' => 11],
            'rpi_proof_of_payment'      => ['type' => 'TEXT'],
            'rpi_payment_verification'  => ['type' => 'BOOLEAN', 'null' => true],
            'rpi_payment_verifier_id'   => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'rpi_publisher_id'          => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'rpi_submitted_at'          => ['type' => 'DATETIME', 'null' => true],
            'rpi_created_at'            => ['type' => 'DATETIME', 'null' => true],
            'rpi_updated_at'            => ['type' => 'DATETIME', 'null' => true],
            'rpi_deleted_at'            => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('rpi_id', true);
        $this->forge->createTable('rims_paper_information');
    }

    public function down()
    {
        $this->forge->dropTable('rims_paper_information');
    }
}
