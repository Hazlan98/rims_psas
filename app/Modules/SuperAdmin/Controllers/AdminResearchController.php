<?php

namespace App\Modules\SuperAdmin\Controllers;

use App\Models\RimsEventModel;
use App\Models\RimsPaperRemark;
use App\Models\RimsNotification;
use App\Models\ResearchTeamModel;
use App\Controllers\BaseController;
use App\Models\RimsPaperInformation;

class AdminResearchController extends BaseController
{
    protected $rims_event;
    protected $rims_research_team;
    protected $rims_paper_info;
    protected $rims_paper_remarks;
    protected $rims_notification;

    public function __construct()
    {
        $this->rims_paper_info      = new RimsPaperInformation();
        $this->rims_research_team   = new ResearchTeamModel();
        $this->rims_event           = new RimsEventModel();
        $this->rims_paper_remarks   = new RimsPaperRemark();
        $this->rims_notification    = new RimsNotification();
    }

    public function adminResearchDb()
    {
        // Select all registered research events
        $research_events = $this->rims_event->where('re_type', 'research')->findAll();
        $data = [
            'research' => $research_events
        ];
        $this->render_user('research/research_db', $data);
    }
    public function getResearchData($rp_event_id)
    {
        $this->session->set('rp_event_id', $rp_event_id);  // Load session

        return redirect()->to(base_url('superAdmin/research/research-data'));
    }

    public function researchData()
    {
        $rp_event_id = $this->session->get('rp_event_id'); // Retrieve event ID

        if (!$rp_event_id) {
            return redirect()->to(base_url('error-page')); // Redirect if ID is missing
        }

        // Fetch event details
        $research_events = $this->rims_event->find($rp_event_id);
        // Fetch registered research details
        $research_papers = $this->rims_paper_info->where('rpi_status !=', 'Draft')->findAll();

        $data = [
            'research_events'       => $research_events,
            'research_papers'       => $research_papers,
        ];

        return $this->render_user('research/research_details', $data);
    }

    public function getParticipantResearchData($rpi_id)
    {
        $this->session->set('rpi_id', $rpi_id);  // Load session

        return redirect()->to(base_url('superAdmin/research/participant-research-data'));
    }

    public function participantResearchData()
    {
        $rpi_id = $this->session->get('rpi_id'); // Retrieve event ID

        if (!$rpi_id) {
            return redirect()->to(base_url('error-page')); // Redirect if ID is missing
        }

        // Fetch event details
        $rpi_details = $this->rims_paper_info->find($rpi_id);

        // Fetch team members separately
        $team_members = $this->rims_research_team
            ->where('rrt_rpi_id', $rpi_id)
            ->findAll();

        $data = [
            'rpi'               => $rpi_details,
            'team_members'      => $team_members,
        ];

        return $this->render_user('research/research_abstract_review', $data);
    }

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
}
