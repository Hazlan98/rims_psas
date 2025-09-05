<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RimsFieldSeeder extends Seeder
{
    public function run()
    {
        $fields = [
            // ========== ISMAD ==========
            ['rf_desc' => 'Mathematics & Applied Mathematics', 'rf_rc_id' => 1],
            ['rf_desc' => 'Statistics', 'rf_rc_id' => 1],
            ['rf_desc' => 'Actuarial Science', 'rf_rc_id' => 1],
            ['rf_desc' => 'Data Science & Analytics', 'rf_rc_id' => 1],
            ['rf_desc' => 'Financial Mathematics', 'rf_rc_id' => 1],
            ['rf_desc' => 'Artificial Intelligence & Machine Learning', 'rf_rc_id' => 1],
            ['rf_desc' => 'Computational Science', 'rf_rc_id' => 1],
            ['rf_desc' => 'Operations Research & Optimization', 'rf_rc_id' => 1],
            ['rf_desc' => 'Education in Mathematics & Statistics', 'rf_rc_id' => 1],

            // ========== Innovation ==========
            ['rf_desc' => 'Engineering & Technology Innovation', 'rf_rc_id' => 2],
            ['rf_desc' => 'Information Technology & Software', 'rf_rc_id' => 2],
            ['rf_desc' => 'Education & Teaching Aids', 'rf_rc_id' => 2],
            ['rf_desc' => 'Business, Management & Entrepreneurship Innovation', 'rf_rc_id' => 2],
            ['rf_desc' => 'Social Sciences & Humanities Innovation', 'rf_rc_id' => 2],
            ['rf_desc' => 'Green Technology & Sustainability', 'rf_rc_id' => 2],
            ['rf_desc' => 'Health Sciences & Medical Innovation', 'rf_rc_id' => 2],
            ['rf_desc' => 'Agriculture & Food Technology Innovation', 'rf_rc_id' => 2],
            ['rf_desc' => 'Creative Arts, Design & Multimedia', 'rf_rc_id' => 2],
            ['rf_desc' => 'Product Prototype / Commercialization', 'rf_rc_id' => 2],

            // ========== NCTS ==========
            ['rf_desc' => 'Engineering & Technology', 'rf_rc_id' => 3],
            ['rf_desc' => 'Computer Science & ICT', 'rf_rc_id' => 3],
            ['rf_desc' => 'Technical & Vocational Education (TVET)', 'rf_rc_id' => 3],
            ['rf_desc' => 'Social Sciences', 'rf_rc_id' => 3],
            ['rf_desc' => 'Humanities', 'rf_rc_id' => 3],
            ['rf_desc' => 'Education & Pedagogy', 'rf_rc_id' => 3],
            ['rf_desc' => 'Business & Management', 'rf_rc_id' => 3],
            ['rf_desc' => 'Communication & Media Studies', 'rf_rc_id' => 3],
            ['rf_desc' => 'Environmental Studies & Sustainability', 'rf_rc_id' => 3],
            ['rf_desc' => 'Language, Literature & Culture', 'rf_rc_id' => 3],
        ];

        // Add timestamps
        foreach ($fields as &$field) {
            $field['rf_created_at'] = date('Y-m-d H:i:s');
        }

        $this->db->table('rims_field')->insertBatch($fields);
    }
}
