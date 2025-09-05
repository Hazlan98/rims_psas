<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RimsCategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'rc_desc' => 'Conference ISMAD',
                'rc_created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'rc_desc' => 'Innovation - Idea & Product',
                'rc_created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'rc_desc' => 'NCTS',
                'rc_created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('rims_categories')->insertBatch($data);
    }
}
