<?php

use App\Models\AuthGroupsUser;

if (!function_exists('canAccess')) {

    function canAccess($roleIds = [])
    {
        $session = session();
        $userId = $session->get('user_id'); // Get user ID from session

        if (!$userId) {
            return false; // No user ID, deny access
        }

        // Get database connection
        $model = new AuthGroupsUser();

        // Check if the user has any of the roles in $roleIds
        $category = $model->where('agu_au_id', $userId)
            ->whereIn('agu_ag_id', $roleIds) // Check multiple roles
            ->first();

        return !empty($category); // Return true if role exists, false otherwise
    }
}
