<?php

namespace App\Modules\User\Controllers;

use App\Models\RimsEventModel;
use App\Models\RimsNotification;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    protected $rims_event;
    protected $rims_notification;

    public function __construct()
    {
        $this->rims_event           = new RimsEventModel();
        $this->rims_notification    = new RimsNotification();
    }

    public function dashboard()
    {
        $user_id = $this->session->get('user_id');

        // Fetch Notification data
        $notification = $this->rims_notification
            ->where('rn_au_id', $user_id)
            ->where('rn_is_read', 0)
            ->orderBy('rn_created_at', 'DESC')
            ->findAll();

        // Fetch event data
        $event = $this->rims_event
            ->where('re_end_date >=', date('Y-m-d'))
            ->orderBy('re_end_date', 'ASC') // Optional: Order by end date ascending
            ->findAll();

        $data = [
            'notification'  => $notification,
            'event'         => $event
        ];

        $this->render_user('dashboard', $data);
    }
}
