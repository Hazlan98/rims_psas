<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['ag_name' => 'Super_Admin', 'ag_desc' => 'Super Administrator'],
            ['ag_name' => 'Registration_Admin', 'ag_desc' => 'Handles user registrations'],
            ['ag_name' => 'Payment_Admin', 'ag_desc' => 'Manages payments and verifications'],
            ['ag_name' => 'Judge', 'ag_desc' => 'Responsible for judging papers'],
            ['ag_name' => 'Moderator', 'ag_desc' => 'Moderates content and submissions'],
            ['ag_name' => 'Publisher', 'ag_desc' => 'Manages publication of papers'],
        ];

        // Insert data into auth_groups table
        $this->db->table('auth_groups')->insertBatch($data);
    }
}
