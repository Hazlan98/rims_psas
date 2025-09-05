<?php

namespace App\Modules\Participant\Controllers;

use App\Models\RimsField;
use App\Models\RimsCategory;
use App\Models\AuthGroupsUser;
use App\Models\RimsEventField;
use App\Models\RimsEventModel;
use App\Models\RimsNotification;
use App\Models\ResearchTeamModel;
use App\Controllers\BaseController;
use App\Models\RimsPaperInformation;

class ParticipantEventController extends BaseController
{
    protected $rims_paper_info;
    protected $rims_event;
    protected $rims_category;
    protected $rims_research_team;
    protected $rims_field;
    protected $rims_event_field;
    protected $auth_groups_user;
    protected $rims_notification;

    public function __construct()
    {
        $this->rims_paper_info      = new RimsPaperInformation();
        $this->rims_event           = new RimsEventModel();
        $this->rims_category        = new RimsCategory();
        $this->rims_research_team   = new ResearchTeamModel();
        $this->rims_field           = new RimsField();
        $this->rims_event_field     = new RimsEventField();
        $this->auth_groups_user     = new AuthGroupsUser();
        $this->rims_notification    = new RimsNotification();
    }

    public function getJoinedEvent()
    {
        $user_id = $this->session->get('user_id');

        // Fetch event details
        $events = $this->rims_paper_info->where('rpi_owner_id', $user_id)->findAll();

        // Ensure $events is an array
        if (!is_array($events)) {
            $events = [$events]; // Convert single object to an array
        }

        foreach ($events as $event) {
            // Get event category
            $category = $this->rims_category
                ->join('rims_field', 'rims_field.rf_rc_id = rims_categories.rc_id', 'left')
                ->where('rf_id', $event->rpi_rf_id)
                ->select('rims_categories.rc_desc') // Fix table alias
                ->first();

            // Ensure the category is an object and assign rc_desc
            $event->rc_desc = is_object($category) ? $category->rc_desc : 'N/A';
        }

        $data = [
            'events'                       => $events,
        ];

        return $this->render_user('event/joined_event_list', $data);
    }

    public function getParticipantEventDashboard($rp_event_id)
    {
        $this->session->set('rp_event_id', $rp_event_id);  // Load session

        return redirect()->to(base_url('participant/event/participant_event_dashboard'));
    }

    public function participantEventDashboard()
    {
        $user_id = $this->session->get('user_id');
        $rp_event_id = $this->session->get('rp_event_id'); // Retrieve event ID

        if (!$rp_event_id) {
            return redirect()->to(base_url('error-page')); // Redirect if ID is missing
        }

        // Fetch event details
        $research_events = $this->rims_event->find($rp_event_id);

        // Fetch field based on category
        $research_field = $this->rims_event_field
            ->select('rf_id, rf_desc')
            ->where('ref_re_id', $rp_event_id)
            ->join('rims_field', 'rims_field.rf_id = rims_event_fields.ref_rf_id', 'left')
            ->findAll();

        // Fetch registered research details
        $research_papers = $this->rims_paper_info
            ->where('rpi_owner_id', $user_id)
            ->where('rpi_re_id', $rp_event_id)
            ->findAll();

        $research_participant_count = $this->rims_paper_info
            ->where('rpi_re_id', $rp_event_id)->countAllResults();

        $data = [
            'research_events'                       => $research_events,
            'research_field'                     => $research_field,
            'research_papers'                       => $research_papers,
            'rp_event_id'                           => $rp_event_id,
            'research_participant_count'            => $research_participant_count,
        ];

        return $this->render_user('event/participate_form', $data);
    }

    public function saveParticipationFormDraft()
    {
        $user_id = $this->session->get('user_id');

        $validationRules = [
            'projectTitle'      => 'required',
            'projectField'      => 'required',
            'paperFile'         => 'uploaded[paperFile]|max_size[paperFile,51200]|ext_in[paperFile,pdf]',
            'teamMembers'       => 'required',
            // 'proofOfPayment'    => 'max_size[paperFile,51200]|ext_in[paperFile,pdf]',

        ];

        if (!$this->validate($validationRules)) {
            return $this->response->setStatusCode(400)->setBody(json_encode($this->validator->getErrors()));
        }

        // Save uploaded abstract
        $file = $this->request->getFile('paperFile');
        if ($file->isValid() && !$file->hasMoved()) {
            $year = date('Y');
            $uploadPath = FCPATH . 'uploads/abstract/' . $year;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $newFileName = $file->getRandomName();
            $file->move($uploadPath, $newFileName);

            $abstract_attachment = 'uploads/abstract/' . $year . '/' . $newFileName;
        }

        // // Save uploaded pop file
        // $popFile = $this->request->getFile('proofOfPayment');
        // if ($popFile->isValid() && !$popFile->hasMoved()) {
        //     $year = date('Y'); // Get current year
        //     $uploadPath = FCPATH . 'uploads/payment/' . $year;

        //     // Create the folder if it doesn't exist
        //     if (!is_dir($uploadPath)) {
        //         mkdir($uploadPath, 0777, true);
        //     }

        //     $newPopFileName = $popFile->getRandomName();
        //     $popFile->move($uploadPath, $newPopFileName);

        //     // Store path relative to base URL
        //     $pop_attachment = 'uploads/payment/' . $year . '/' . $newPopFileName;
        // }

        // Save as draft
        $rpi_data = [
            'rpi_owner_id'          => $user_id,
            'rpi_title'             => $this->request->getPost('projectTitle'),
            'rpi_abstract'          => $abstract_attachment ?? '',
            // 'rpi_proof_of_payment'  => $pop_attachment ?? '',
            'rpi_rf_id'             => $this->request->getPost('projectField'),
            'rpi_re_id'             => $this->request->getPost('rp_event_id'),
            'rpi_status'            => 'Draft',
            'rpi_submitted_at'      => null // No submission date for drafts
        ];

        $this->rims_paper_info->insert($rpi_data);
        $rpi_id = $this->rims_paper_info->insertID();

        if ($rpi_id) {
            $team_members = $this->request->getPost('teamMembers');
            $team_presenter = $this->request->getPost('teamLeader');

            foreach ($team_members as $member) {
                $team_data = [
                    'rrt_rpi_id' => $rpi_id,
                    'rrt_name'   => $member,
                    'rrt_role'   => ($member == $team_presenter) ? 'presenter' : 'member'
                ];

                $this->rims_research_team->insert($team_data);
            }
        }

        return $this->response->setStatusCode(200)->setJSON(['message' => 'Research paper saved as draft!']);
    }

    public function submitParticipationForm()
    {
        // get user id
        $user_id = $this->session->get('user_id');
        // if ($this->request->getMethod() === 'post') {
        $validationRules = [
            'projectTitle'      => 'required',
            'projectField'      => 'required',
            'paperFile'         => 'uploaded[paperFile]|max_size[paperFile,2048]|ext_in[paperFile,pdf]',
            'teamMembers'       => 'required',
            'teamLeader'        => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return $this->response->setStatusCode(400)->setBody(json_encode($this->validator->getErrors()));
        }

        // Save uploaded file
        $file = $this->request->getFile('paperFile');
        if ($file->isValid() && !$file->hasMoved()) {
            $year = date('Y'); // Get current year
            $uploadPath = FCPATH . 'uploads/abstract/' . $year;

            // Create the folder if it doesn't exist
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $newFileName = $file->getRandomName();
            $file->move($uploadPath, $newFileName);

            // Store path relative to base URL
            $abstract_attachment = 'uploads/abstract/' . $year . '/' . $newFileName;
        }

        // Save uploaded pop file
        // $popFile = $this->request->getFile('proofOfPayment');
        // if ($popFile->isValid() && !$popFile->hasMoved()) {
        //     $year = date('Y'); // Get current year
        //     $uploadPath = FCPATH . 'uploads/payment/' . $year;

        //     // Create the folder if it doesn't exist
        //     if (!is_dir($uploadPath)) {
        //         mkdir($uploadPath, 0777, true);
        //     }

        //     $newPopFileName = $popFile->getRandomName();
        //     $popFile->move($uploadPath, $newPopFileName);

        //     // Store path relative to base URL
        //     $pop_attachment = 'uploads/payment/' . $year . '/' . $newPopFileName;
        // }

        // Store data in the database (modify this to fit your database structure)
        $rpi_data = [
            'rpi_owner_id'          => $user_id,
            'rpi_title'             => $this->request->getPost('projectTitle'),
            'rpi_abstract'          => $abstract_attachment ?? '',
            // 'rpi_proof_of_payment'  => $pop_attachment ?? '',
            'rpi_rf_id'             => $this->request->getPost('projectField'),
            'rpi_re_id'             => $this->request->getPost('rp_event_id'),
            'rpi_status'            => 'Submit',
            'rpi_submitted_at'      => date('Y-m-d H:i:s')

        ];

        // Insert rpi information into the database
        $this->rims_paper_info->insert($rpi_data);
        $rpi_id = $this->rims_paper_info->insertID();

        if ($rpi_id) {
            // Get team members and presenter
            $team_members   = $this->request->getPost('teamMembers');
            $team_presenter = $this->request->getPost('teamLeader');

            foreach ($team_members as $member) {
                $team_data = [
                    'rrt_rpi_id' => $rpi_id,
                    'rrt_name'   => $member,
                    'rrt_role'   => ($member == $team_presenter) ? 'presenter' : 'member'
                ];

                // Insert team member into database
                $this->rims_research_team->insert($team_data);
            }

            // Fetch all admin
            $admin_and_payment_admin_lists = $this->auth_groups_user
                ->select('agu_au_id')
                ->where('agu_ag_id', 1)
                // ->orWhere('agu_ag_id', 3)
                ->findAll();

            foreach ($admin_and_payment_admin_lists as $admin) {
                // Give Admin Notification
                $notification_data = [
                    'rn_au_id'       => $admin->agu_au_id, // Use array notation if `findAll()` returns an array
                    'rn_title'       => 'Participant: Participation Submission',
                    'rn_description' => 'New Submission Has been Made.'
                ];

                $this->rims_notification->insert($notification_data);
            }
        }

        return $this->response->setStatusCode(200)->setJSON(['message' => 'Research paper submitted successfully!']);
        // }

        // return $this->response->setStatusCode(405)->setBody("Method Not Allowed");
    }

    public function activeEventList()
    {
        // Fetch all event where registration not closed yet
        $today = date('Y-m-d'); // Get today's date in 'YYYY-MM-DD' format

        $active_event = $this->rims_event
            ->where('re_registration_deadline >', $today)
            ->findAll();

        // Fetch Event Categories
        $event_categories  =  $this->rims_category->findAll();
        $data = [
            'events' => $active_event,
            'event_categories' => $event_categories,
        ];

        $this->render_user('event/active_event_list', $data);
    }

    // Delete Draft Participatin
    // Remove eventfield
    public function deleteDraftParticipation($rpi_id)
    {
        // Delete data from table rims event field
        if ($this->rims_paper_info->delete($rpi_id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Record deleted successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete record']);
        }
    }
}
