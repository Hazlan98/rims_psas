<?php

namespace App\Modules\Judge\Controllers;

use App\Models\RimsField;
use App\Models\RimsJudge;
use App\Models\AuthGroupsUser;
use App\Models\RimsEventField;
use App\Models\RimsEventModel;
use App\Models\RimsPaperRemark;
use App\Models\RimsNotification;
use App\Models\ResearchTeamModel;
use App\Controllers\BaseController;
use App\Models\RimsPaperInformation;

class JudgeReviewController extends BaseController
{
    protected $rims_paper_info;
    protected $rims_event;
    protected $rims_field;
    protected $rims_event_fields;
    protected $rims_judge;
    protected $auth_groups_user;
    protected $rims_notification;
    protected $rims_research_team;
    protected $rims_paper_remarks;

    public function __construct()
    {
        $this->rims_event               = new RimsEventModel();
        $this->rims_field               = new RimsField();
        $this->rims_paper_info          = new RimsPaperInformation();
        $this->rims_event_fields        = new RimsEventField();
        $this->rims_judge               = new RimsJudge();
        $this->auth_groups_user         = new AuthGroupsUser();
        $this->rims_notification        = new RimsNotification();
        $this->rims_research_team       = new ResearchTeamModel();
        $this->rims_paper_remarks       = new RimsPaperRemark();
    }

    public function updateReviewStatus()
    {
        try {
            $user_id = $this->session->get('user_id');

            if (!$user_id) {
                log_message('error', 'User ID not found in session.');
                return $this->response->setJSON(['success' => false, 'message' => 'User not logged in']);
            }

            $rpiId = $this->request->getPost('rpi_id');
            $status = $this->request->getPost('status');

            if (!$rpiId || !$status) {
                log_message('error', 'Missing rpi_id or status in POST request.');
                return $this->response->setJSON(['success' => false, 'message' => 'Missing parameters']);
            }

            // Prepare data
            $data_review = [
                'rpi_status' => ($status == 'Accepted') ? 'Awaiting Review' : 'Assignment Rejected',
            ];

            // Attempt update
            if ($this->rims_paper_info->update($rpiId, $data_review)) {

                // Fetch all admin
                $admin_lists = $this->auth_groups_user
                    ->select('agu_au_id')
                    ->where('agu_ag_id', 1)
                    ->findAll();

                foreach ($admin_lists as $admin) {
                    // Give Admin Notification
                    $notification_data = [
                        'rn_au_id'       => $admin->agu_au_id, // Use array notation if `findAll()` returns an array
                        'rn_title'       => 'Assignment Status:' . ($status == 'Accepted' ? 'Accepted' : 'Rejected'),
                        'rn_description' => 'This assignation has been ' . ($status == 'Accepted' ? 'Accepted' : 'Rejected') . 'by Reviewer' // Fixed concatenation and ternary operator
                    ];

                    $this->rims_notification->insert($notification_data);
                }


                return $this->response->setJSON(['success' => true]);
            } else {
                log_message('error', 'Database update failed for rpi_id: ' . $rpiId);
                return $this->response->setJSON(['success' => false, 'message' => 'Database update failed']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'Internal server error']);
        }
    }

    public function getReviewFullPaper($rpi_id)
    {
        $this->session->set('selected_rpi_id', $rpi_id);

        return redirect('judge/review/review-full-paper');
    }
    public function reviewFullPaper()
    {
        $rpi_id = $this->session->get('selected_rpi_id');

        $rpi_info = $this->rims_paper_info->find($rpi_id);

        // Fetch team members separately
        $team_members = $this->rims_research_team
            ->where('rrt_rpi_id', $rpi_id)
            ->findAll();

        // initialize
        $remarks = [];
        // check status
        // if ($rpi_info->rpi_status == 'Minor Correction' || $rpi_info->rpi_status == 'Major Correction') {
        // Fetch all remarks for this paper
        $remarks = $this->rims_paper_remarks
            ->join('users_information', 'users_information.ui_au_id = rims_paper_remarks.rpr_reprimand_id', 'left')
            ->where('rpr_rpi_id', $rpi_id)->findAll();
        // }
        $data = [
            'team_members'  => $team_members,
            'rpi_info'      => $rpi_info,
            'remarks'       => $remarks,
        ];

        $this->render_user('review/review_full_paper', $data);
    }

    public function submitReview()
    {
        $user_id = $this->session->get('user_id');

        $review_remarks = $this->request->getPost('review_comments');
        $review_status  = $this->request->getPost('review_status');
        $rpi_id         = $this->request->getPost('submission_id');

        // Validate input
        if (empty($review_remarks) || empty($review_status) || empty($rpi_id)) {
            return $this->response->setJSON(['success' => false, 'message' => 'All fields are required.']);
        }

        // Prepare data for insertion
        $rpi_data = [
            'rpi_status'        => $review_status,
            'rpi_updated_at'    => date('Y-m-d H:i:s'),
        ];

        // Insert or update review
        if ($this->rims_paper_info->update($rpi_id, $rpi_data)) {

            $data_remarks = [
                'rpr_remarks'       => $review_remarks,
                'rpr_reprimand_id'  => $user_id,
                'rpr_rpi_id'        => $rpi_id,
            ];
            if ($this->rims_paper_remarks->insert($data_remarks)) {
                return $this->response->setJSON(['success' => true]);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to submit review. Please try again.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to submit review. Please try again.']);
        }




        return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Invalid request.']);
    }
}
