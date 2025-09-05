<?php

use App\Models\AuthGroupsUser;

if (!function_exists('get_user_role')) {
    function get_user_role($user_id)
    {
        $model = new AuthGroupsUser();
        $user_roles = $model
            ->select('auth_groups.ag_name')
            ->join('auth_groups', 'auth_groups.ag_id = auth_groups_users.agu_ag_id', 'left')
            ->where('auth_groups_users.agu_au_id', $user_id)
            ->findAll();

        if (empty($user_roles)) {
            return '<span class="badge bg-secondary">No Role</span>'; // Default when no role found
        }

        $roleTags = [];
        foreach ($user_roles as $role) {
            $roleTags[] = '<span class="badge bg-primary">' . esc($role->ag_name) . '</span>';
        }

        return implode(' ', $roleTags); // Join multiple roles with space
    }
}
