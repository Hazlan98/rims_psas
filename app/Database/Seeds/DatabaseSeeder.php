<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('AuthGroupsSeeder');
        $this->call('UsersSeeder');
        $this->call('RimsCategoriesSeeder');
        $this->call('RimsFieldSeeder');
        $this->call('EvaluationCriteriaSeeder');
    }
}
