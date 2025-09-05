<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EvaluationCriteriaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'ec_id' => 1,
                'ec_text' => 'Relevance and significance of the research topic',
            ],
            [
                'ec_id' => 2,
                'ec_text' => 'Data collection and sampling procedures',
            ],
            [
                'ec_id' => 3,
                'ec_text' => 'Data analysis and interpretation',
            ],
            [
                'ec_id' => 4,
                'ec_text' => 'Results presentation and clarity',
            ],
            [
                'ec_id' => 5,
                'ec_text' => 'Discussion and implications',
            ],
            [
                'ec_id' => 6,
                'ec_text' => 'Conclusions and recommendations',
            ],
            [
                'ec_id' => 7,
                'ec_text' => 'Writing quality and organization',
            ],
            [
                'ec_id' => 8,
                'ec_text' => 'References and citation quality',
            ],
        ];

        // Insert batch
        $this->db->table('evaluation_criteria')->insertBatch($data);
    }
}
