<?php

namespace App\Modules\Auth\Controllers;

use App\Models\AuthUser;
use App\Models\AuthGroupsUser;
use App\Models\RimsNotification;
use App\Controllers\BaseController;
use App\Models\UserInformation;

class RegisterController extends BaseController
{
    protected $auth_user;
    protected $user_information;
    protected $auth_groups_user;
    protected $rims_notification;

    public function __construct()
    {
        $this->auth_user            = new AuthUser();
        $this->user_information     = new UserInformation();
        $this->auth_groups_user     = new AuthGroupsUser();
        $this->rims_notification    = new RimsNotification();
    }
    public function register()
    {
        $data = [];
        $this->render_auth('register', $data);
    }

    public function attempt_register()
    {


        // Validate the request
        $validation = \Config\Services::validation();

        $validation->setRules([
            'registerFullName'          => 'required|string|max_length[255]',
            'registerPhone'             => 'required|string|max_length[15]',
            'registerAddress'           => 'required|string',
            'registerEmail'             => 'required|valid_email|max_length[255]',
            'registerUsername'          => 'required|min_length[8]|string',
            'registerPassword'          => 'required|min_length[8]',
        ]);


        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->with('swal_error', implode("\n", $validation->getErrors()))
                ->withInput();
        }


        $username = $this->request->getPost('registerUsername');

        // Check if the username already exists
        $existingUsername = $this->auth_user->where('au_username', $this->request->getPost('registerUsername'))->first();
        if ($existingUsername) {
            return redirect()->back()
                ->with('swal_error', 'Username is already taken. Please choose another.')
                ->withInput();
        }

        // Check if the email already exists
        $existingEmail = $this->user_information->where('ui_email', $this->request->getPost('registerEmail'))->first();
        if ($existingEmail) {
            return redirect()->back()
                ->with('swal_error', 'Email is already taken. Please use another email.')
                ->withInput();
        }

        $au_register_date = [
            'au_username'   => $this->request->getPost('registerUsername'),
            'au_password'   => password_hash($this->request->getPost('registerPassword'), PASSWORD_BCRYPT),
        ];

        // Save to the database
        if ($this->auth_user->insert($au_register_date)) {

            $ui_au_id = $this->auth_user->getInsertID();

            $ui_register_data = [
                'ui_au_id'          => $ui_au_id,
                'ui_name'           => $this->request->getPost('registerFullName'),
                'ui_email'          => $this->request->getPost('registerEmail'),
                'ui_address'        => $this->request->getPost('registerAddress'),
                'ui_phone_number'   => $this->request->getPost('registerPhone'),
            ];

            // Save username and password
            if ($this->user_information->insert($ui_register_data)) {
                session()->setFlashdata('swal_success', 'Registration successful! Please login.');
                return redirect()->to('/auth/login');
            } else {
                // Delete User data and return redirect back
                $this->auth_user->delete($ui_au_id);
                session()->setFlashdata('swal_error', 'Failed to save user credentials. Please try again.');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('swal_error', 'Failed to save user. Please try again.');
            return redirect()->back();
        }
    }
}
