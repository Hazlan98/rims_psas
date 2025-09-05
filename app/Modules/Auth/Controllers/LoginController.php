<?php

namespace App\Modules\Auth\Controllers;

use App\Models\AuthUser;
use App\Controllers\BaseController;
use App\Models\AuthGroup;
use App\Models\AuthGroupsUser;
use App\Models\RimsNotification;

class LoginController extends BaseController
{
    protected $auth_user;
    protected $auth_group;
    protected $auth_groups_user;
    protected $rims_notification;

    public function __construct()
    {
        $this->auth_user            = new AuthUser();
        $this->auth_group           = new AuthGroup();
        $this->auth_groups_user     = new AuthGroupsUser();
        $this->rims_notification    = new RimsNotification();
    }

    public function login()
    {
        $data = [];
        $this->render_auth('sign_in', $data);
    }

    public function attempt_login()
    {
        $username = $this->request->getPost('loginUsername');
        $password = $this->request->getPost('loginPassword');

        // Load model
        $authUserModel = new \App\Models\AuthUser();

        // Check if the user exists
        $user = $authUserModel->where('au_username', $username)->first();

        if ($user) {
            // Verify the password
            if (password_verify($password, $user->au_password)) {
                $this->session->set([
                    'user_id'   => $user->au_id,
                    'user_name' => $user->au_username,
                    'logged_in' => true,
                ]);

                session()->setFlashdata('swal_success', 'Login successful! Welcome back.');

                return redirect()->to('user/dashboard'); // Redirect to the dashboard
            } else {
                session()->setFlashdata('swal_error', 'Invalid password.');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('swal_error', 'User not found.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Destroy session
        return redirect()->to(base_url('auth/login')); // Redirect to login page
    }
}
