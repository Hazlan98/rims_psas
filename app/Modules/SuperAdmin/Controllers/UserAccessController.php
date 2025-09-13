<?php

namespace App\Modules\SuperAdmin\Controllers;

use App\Models\UserInformation;
use App\Controllers\BaseController;
use App\Models\AuthGroup;
use App\Models\AuthGroupsUser;

class UserAccessController extends BaseController
{
    protected $user_information;
    protected $auth_groups;
    protected $auth_groups_users;

    public function __construct()
    {
        $this->user_information     = new UserInformation();
        $this->auth_groups          = new AuthGroup();
        $this->auth_groups_users    = new AuthGroupsUser();
    }

    public function listOfUser()
    {
        // Select all registered research events
        $user_info = $this->user_information->findAll();
        $roles = $this->auth_groups->findAll();
        $data = [
            'user_info' => $user_info,
            'roles' => $roles
        ];
        $this->render_user('userAccess/user_db', $data);
    }

    public function assignRole()
    {
        $user_id = $this->request->getPost('user_id');
        $role_id = $this->request->getPost('role_id');

        $data = [
            'agu_au_id' => $user_id,
            'agu_ag_id' => $role_id
        ];

        if ($this->auth_groups_users->insert($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'updated_role' => get_user_role($user_id),
                'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setStatusCode(500)->setJSON([
            'status' => 'error',
            'csrfHash' => csrf_hash()
        ]);
        }
    }

    public function removeRole()
    {
        $user_id = $this->request->getPost('user_id');

        if ($this->auth_groups_users->where('agu_au_id', $user_id)->delete()) {
            return $this->response->setJSON([
                'status' => 'success',
                'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setStatusCode(500)->setJSON([
                'status' => 'error',
                'csrfHash' => csrf_hash()
            ]);
        }
    }
}
