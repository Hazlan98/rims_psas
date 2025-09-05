<?php

namespace App\Modules\SuperAdmin\Controllers;

use App\Models\RimsEventModel;
use App\Models\EvaluationModel;
use App\Models\RimsPaperRemark;
use App\Models\RimsNotification;
use App\Models\ResearchTeamModel;
use App\Controllers\BaseController;
use App\Models\RimsPaperInformation;

class AdminReviewerController extends BaseController
{
    protected $rims_event;
    protected $rims_research_team;
    protected $rims_paper_info;
    protected $rims_paper_remarks;
    protected $rims_notification;
    protected $evaluations;

    public function __construct()
    {
        $this->rims_paper_info      = new RimsPaperInformation();
        $this->rims_research_team   = new ResearchTeamModel();
        $this->rims_event           = new RimsEventModel();
        $this->rims_paper_remarks   = new RimsPaperRemark();
        $this->rims_notification    = new RimsNotification();
        $this->evaluations          = new EvaluationModel();
    }



    // Admin Approve/Reject Abstract Function
    public function update_status()
    {
        $user_id = $this->session->get('user_id');

        $rpi_id = $this->request->getPost('id');
        $status = $this->request->getPost('status');
        $remarks = $this->request->getPost('remarks') ?? null;

        // Fetch rpi owner id
        $rpi_owner_id = $this->rims_paper_info->select('rpi_owner_id')->where('rpi_id', $rpi_id)->first();

        if ($remarks) {
            $data_remarks = [
                'rpr_remarks'       => $remarks,
                'rpr_reprimand_id'  => $user_id,
                'rpr_rpi_id'        => $rpi_id,
            ];
            $this->rims_paper_remarks->insert($data_remarks);
        }

        $data = [
            'rpi_status'       => $status,
        ];

        if ($this->rims_paper_info->update($rpi_id, $data)) {
            // Send Notification to the User
            $notification_data = [
                'rn_au_id'       => $rpi_owner_id->rpi_owner_id, // Use array notation if `findAll()` returns an array
                'rn_title'       => 'RiMS Admin: Researh/Project Approval',
                'rn_description' => 'Your Research / Project Has Been ' . ($status == 'Approved' ? 'Approved' : 'Rejected') .  'By Admin.' // Fixed concatenation and ternary operator
            ];

            $this->rims_notification->insert($notification_data);
        }

        return $this->response->setJSON(['success' => true]);
    }

    // Admin Assign Reviewer
    public function assignReviewer()
    {
        // Fetch Reviewer id
        $reviewer1 = $this->request->getPost('reviewer1');
        $reviewer2 = $this->request->getPost('reviewer2');

        // Fetch rpi_id
        $rpi_id = $this->session->get('rpi_id'); // Retrieve event ID

        if (!$reviewer1 || !$reviewer2 || !$rpi_id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Both reviewers must be selected.',
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }

        $reviewer1_data = [
            // 'ev_rpi_id'   => 'Awaiting Reviewer Acceptance',
            'ev_rpi_id' => $rpi_id,
            'ev_rj_id'  => $reviewer1,
        ];

        $reviewer2_data = [
            'ev_rpi_id' => $rpi_id,
            'ev_rj_id'  => $reviewer2,
        ];

        // Update the RimsPaperInformation with the selected reviewers
        // Update the first reviewer
        if ($reviewer1_data) {
            $this->evaluations->insert($reviewer1_data);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to assign reviewer 1',
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }

        if ($reviewer2_data) {
            $this->evaluations->insert($reviewer2_data);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to assign reviewer 2',
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }

        // Update paper status to 'Awaiting Reviewer Acceptance' if both reviewers are inserted
        if ($this->rims_paper_info->update($rpi_id, $update_data = [
            'rpi_status' => 'Awaiting Reviewer Acceptance',
        ])) {

            // Sent Notification through system and email
            // Send Notification to the User
            $notification_data = [
                'rn_au_id'       => $reviewer1, // Use array notation if `findAll()` returns an array
                'rn_title'       => 'RiMS Admin: Researh/Project Assignation',
                'rn_description' => "You have been assigned a research project for review by the admin. Please accept or decline."
            ];

            $this->rims_notification->insert($notification_data);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to assign reviewer',
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }

        if ($this->rims_paper_info->update($rpi_id, $data_second_judge)) {

            // Sent Notification through system and email
            // Send Notification to the User
            $notification_data = [
                'rn_au_id'       => $reviewer2, // Use array notation if `findAll()` returns an array
                'rn_title'       => 'RiMS Admin: Researh/Project Assignation',
                'rn_description' => "You have been assigned a research project for review by the admin. Please accept or decline."
            ];

            $this->rims_notification->insert($notification_data);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to assign reviewer',
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }

        // Send email
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Reviewer assigned successfully',
            'csrfToken' => csrf_hash(), // 🔑 refresh token
        ]);
    }

    // Reassign Reviewer
    public function reAssignReviewer()
    {

        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid request method.'
            ]);
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'reviewer_to_replace' => 'required',
            'new_reviewer'        => 'required|is_natural_no_zero'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => implode('<br>', $validation->getErrors()),
                'csrf_token' => csrf_hash()
            ]);
        }

        $reviewerToReplace = $this->request->getPost('reviewer_to_replace');
        $newReviewer       = $this->request->getPost('new_reviewer');
        $rpi_id            = $this->request->getPost('rpi_id');

        log_message('debug', 'POST data: ' . print_r($this->request->getPost(), true));

        // Check evaluation record for the reviewer to replace
        $evaluation = $this->evaluations
            ->where('ev_rpi_id', $rpi_id)
            ->where('ev_rj_id', $reviewerToReplace)
            ->first();

        log_message('debug', 'ev result: ' . $rpi_id);


        if (!$evaluation) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Reviewer to replace not found.',
                'csrf_token' => csrf_hash()
            ]);
        }

        // then insert a new evaluation record with the new reviewer
        // Check if the new reviewer is already assigned to this paper
        $existingEvaluation = $this->evaluations
            ->where('ev_rpi_id', $rpi_id)
            ->where('ev_rj_id', $newReviewer)
            ->first();
        if ($existingEvaluation) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'The new reviewer is already assigned to this paper.',
                'csrf_token' => csrf_hash()
            ]);
        } elseif ($newReviewer == $reviewerToReplace) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'The new reviewer cannot be the same as the reviewer to replace.',
                'csrf_token' => csrf_hash()
            ]);
        } else {
            // If the new reviewer is not already assigned, soft delete the old evaluation record
            $deleteCurrentReview = $this->evaluations->delete($evaluation->ev_id);

            if (!$deleteCurrentReview) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to delete the current reviewer record.',
                    'csrf_token' => csrf_hash()
                ]);
            } else {
                // insert new evaluation record
                $newEvaluationData = [
                    'ev_rpi_id' => $rpi_id,
                    'ev_rj_id'  => $newReviewer,
                    'ev_re_id'  => $evaluation->ev_re_id, // Retain the same RE ID
                    'ev_status' => 'pending', // Set status to pending
                    'ev_created_at' => date('Y-m-d H:i:s'),
                    'ev_updated_at' => date('Y-m-d H:i:s'),
                ];
                $insertNewEvaluation = $this->evaluations->insert($newEvaluationData);

                if ($insertNewEvaluation) {
                    // Send notification to the new reviewer
                    $notificationData = [
                        'rn_au_id'       => $newReviewer,
                        'rn_title'       => 'RiMS Admin: Research/Project Reassignment',
                        'rn_description' => 'You have been reassigned as a reviewer for a research project. Please check your dashboard for details.'
                    ];
                    $this->rims_notification->insert($notificationData);

                    return $this->response->setJSON([
                        'status'     => 'success', // or 'error'
                        'message'    => 'Reviewer reassigned successfully.',
                        'csrf_token' => csrf_hash()
                    ]);
                }
            }
        }
    }
}
