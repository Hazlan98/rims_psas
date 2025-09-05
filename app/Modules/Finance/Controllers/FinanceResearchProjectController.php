<?php

namespace App\Modules\Finance\Controllers;

use App\Models\RimsCategory;
use App\Models\AuthGroupsUser;
use App\Models\RimsEventModel;
use App\Models\RimsPaperRemark;
use App\Models\RimsNotification;
use App\Models\ResearchTeamModel;
use App\Controllers\BaseController;
use App\Models\RimsPaperInformation;

class FinanceResearchProjectController extends BaseController
{
    protected $rims_paper_info;
    protected $rims_event;
    protected $rims_category;
    protected $rims_research_team;
    protected $auth_groups_user;
    protected $rims_notification;
    protected $rims_paper_remarks;

    public function __construct()
    {
        $this->rims_paper_info      = new RimsPaperInformation();
        $this->rims_event           = new RimsEventModel();
        $this->rims_category        = new RimsCategory();
        $this->rims_research_team   = new ResearchTeamModel();
        $this->auth_groups_user     = new AuthGroupsUser();
        $this->rims_notification    = new RimsNotification();
        $this->rims_paper_remarks   = new RimsPaperRemark();
    }

    public function financeResearchDb()
    {
        $rpi_info = $this->rims_paper_info->where('rpi_status !=', 'Draft')->findAll();  // Load session

        $data = [
            'rpi_info' => $rpi_info,
        ];
        return $this->render_user('research/event_payment_validation', $data);
    }

    public function updatePaymentStatus()
    {
        try {
            $user_id = $this->session->get('user_id');
            $reason = $this->request->getPost('reason');

            if (!$user_id) {
                log_message('error', 'User ID not found in session.');
                return $this->response->setJSON(['success' => false, 'message' => 'User not logged in']);
            }

            $paperId = $this->request->getPost('rpi_id');
            $status = $this->request->getPost('status');

            if (!$paperId || !$status) {
                log_message('error', 'Missing rpi_id or status in POST request.');
                return $this->response->setJSON(['success' => false, 'message' => 'Missing parameters']);
            }

            // Prepare data
            $data_finance = [
                'rpi_payment_verification' => ($status == 'Approved') ? '1' : '0',
                'rpi_status' => ($status == 'Approved') ? 'Payment Approved' : 'Payment Rejected',
                'rpi_payment_verifier_id'  => $user_id
            ];

            // Attempt update
            if ($this->rims_paper_info->update($paperId, $data_finance)) {

                if ($status != 'Approved') {
                    // Add remarks for rejection
                    $reject_remarks_data = [
                        'rpr_rpi_id'        => $paperId,
                        'rpr_remarks'       => $reason,
                        'rpr_reprimand_id'  => $user_id,
                    ];

                    $this->rims_paper_remarks->insert($reject_remarks_data);
                }

                // Fetch all admin
                $admin_lists = $this->auth_groups_user
                    ->select('agu_au_id')
                    ->where('agu_ag_id', 1)
                    ->findAll();

                foreach ($admin_lists as $admin) {
                    // Give Admin Notification
                    $notification_data = [
                        'rn_au_id'       => $admin->agu_au_id, // Use array notation if `findAll()` returns an array
                        'rn_title'       => 'Payment Admin: Payment Updated',
                        'rn_description' => 'This payment has now been ' . ($status == 'Approved' ? 'Approved' : 'Rejected') // Fixed concatenation and ternary operator
                    ];

                    $this->rims_notification->insert($notification_data);
                }


                return $this->response->setJSON(['success' => true]);
            } else {
                log_message('error', 'Database update failed for rpi_id: ' . $paperId);
                return $this->response->setJSON(['success' => false, 'message' => 'Database update failed']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'Internal server error']);
        }
    }
}
