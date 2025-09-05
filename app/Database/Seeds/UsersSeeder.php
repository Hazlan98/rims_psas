<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $password = password_hash('abcd1234', PASSWORD_DEFAULT);

        // Insert Users
        $users = [
            ['au_username' => 'superadmin', 'au_password' => $password],
            ['au_username' => 'regadmin', 'au_password' => $password],
            ['au_username' => 'payadmin', 'au_password' => $password],
            ['au_username' => 'judge1', 'au_password' => $password],
            ['au_username' => 'moderator1', 'au_password' => $password],
            ['au_username' => 'publisher1', 'au_password' => $password],
        ];

        $this->db->table('auth_users')->insertBatch($users);

        // Fetch inserted user IDs
        $userIDs = $this->db->table('auth_users')
            ->select('au_id, au_username')
            ->get()
            ->getResultArray();

        $map = [];
        foreach ($userIDs as $user) {
            switch ($user['au_username']) {
                case 'superadmin':
                    $map[] = ['agu_ag_id' => 1, 'agu_au_id' => $user['au_id']]; // Super_Admin
                    break;
                case 'regadmin':
                    $map[] = ['agu_ag_id' => 2, 'agu_au_id' => $user['au_id']]; // Registration_Admin
                    break;
                case 'payadmin':
                    $map[] = ['agu_ag_id' => 3, 'agu_au_id' => $user['au_id']]; // Payment_Admin
                    break;
                case 'judge1':
                    $map[] = ['agu_ag_id' => 4, 'agu_au_id' => $user['au_id']]; // Judge
                    break;
                case 'moderator1':
                    $map[] = ['agu_ag_id' => 5, 'agu_au_id' => $user['au_id']]; // Moderator
                    break;
                case 'publisher1':
                    $map[] = ['agu_ag_id' => 6, 'agu_au_id' => $user['au_id']]; // Publisher
                    break;
            }
        }

        // Insert mapping
        $this->db->table('auth_groups_users')->insertBatch($map);
    }
}
