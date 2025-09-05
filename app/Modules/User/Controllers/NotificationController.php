<?php

namespace App\Modules\User\Controllers;

use App\Models\RimsEventModel;
use App\Models\RimsNotification;
use App\Controllers\BaseController;

class NotificationController extends BaseController
{
    protected $rims_event;
    protected $rims_notification;

    public function __construct()
    {
        $this->rims_event           = new RimsEventModel();
        $this->rims_notification    = new RimsNotification();
    }

    public function markAsRead()
    {
        $notificationId = $this->request->getPost('id');

        if (empty($notificationId)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request']);
        }

        $update = $this->rims_notification->update($notificationId, ['rn_is_read' => 1]);

        if ($update) {
            return $this->response->setJSON([
                'success' => true,
                'csrf_token' => csrf_hash() // Send the new CSRF token
            ]);
        } else {
            return $this->response->setJSON([
                '
            success' => false,
                'message' => 'Database update failed',
                'csrf_token' => csrf_hash() // Send the new CSRF token
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Invalid request',
            'csrf_token' => csrf_hash() // Send the new CSRF token
        ]);
    }

    public function markAllRead()
    {
        $user_id = $this->session->get('user_id');

        if (!$user_id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'User not logged in',
                'csrf_token' => csrf_hash() // Send the new CSRF token
            ]);
        }

        // Update all notifications for the user
        $this->rims_notification
            ->where('rn_au_id', $user_id)
            ->set(['rn_is_read' => 1]) // Set notifications as read
            ->update();

        return $this->response->setJSON([
            'success' => true,
            'message' => 'All notifications marked as read',
            'csrf_token' => csrf_hash() // Send the new CSRF token
        ]);
    }
}
