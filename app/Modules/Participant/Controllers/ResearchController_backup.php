<?php

namespace App\Modules\Participant\Controllers;

use App\Models\RimsCategory;
use App\Models\AuthGroupsUser;
use App\Models\RimsEventModel;
use App\Models\RimsNotification;
use App\Models\ResearchTeamModel;
use App\Controllers\BaseController;
use App\Models\RimsPaperInformation;

class ResearchController extends BaseController
{
    protected $rims_paper_info;
    protected $rims_event;
    protected $rims_category;
    protected $rims_research_team;
    protected $auth_groups_user;
    protected $rims_notification;

    public function __construct()
    {
        $this->rims_paper_info      = new RimsPaperInformation();
        $this->rims_event           = new RimsEventModel();
        $this->rims_category        = new RimsCategory();
        $this->rims_research_team   = new ResearchTeamModel();
        $this->auth_groups_user     = new AuthGroupsUser();
        $this->rims_notification    = new RimsNotification();
    }

    public function get_rp_dashboard($rp_event_id)
    {
        $this->session->set('rp_event_id', $rp_event_id);  // Load session

        return redirect()->to(base_url('participant/research/rp_dashboard'));
    }

    public function rp_dashboard()
    {
        $user_id = $this->session->get('user_id');
        $rp_event_id = $this->session->get('rp_event_id'); // Retrieve event ID

        if (!$rp_event_id) {
            return redirect()->to(base_url('error-page')); // Redirect if ID is missing
        }

        // Fetch event details
        $research_events = $this->rims_event->find($rp_event_id);

        // Fetch category
        $research_category = $this->rims_category->findAll();

        // Fetch registered research details
        $research_papers = $this->rims_paper_info
            ->where('rpi_owner_id', $user_id)
            ->where('rpi_re_id', $rp_event_id)
            ->findAll();

        $research_participant_count = $this->rims_paper_info
            ->where('rpi_re_id', $rp_event_id)->countAllResults();

        $data = [
            'research_events'                       => $research_events,
            'research_category'                     => $research_category,
            'research_papers'                       => $research_papers,
            'rp_event_id'                           => $rp_event_id,
            'research_participant_count'            => $research_participant_count,
        ];

        return $this->render_user('participate_form', $data);
    }

    public function submitResearchPaper()
    {
        // get user id
        $user_id = $this->session->get('user_id');
        // if ($this->request->getMethod() === 'POST') {
        $validationRules = [
            'projectTitle'      => 'required',
            'projectCategory'   => 'required',
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
        $popFile = $this->request->getFile('proofOfPayment');
        if ($popFile->isValid() && !$popFile->hasMoved()) {
            $year = date('Y'); // Get current year
            $uploadPath = FCPATH . 'uploads/payment/' . $year;

            // Create the folder if it doesn't exist
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $newPopFileName = $popFile->getRandomName();
            $popFile->move($uploadPath, $newPopFileName);

            // Store path relative to base URL
            $pop_attachment = 'uploads/payment/' . $year . '/' . $newPopFileName;
        }

        // Store data in the database (modify this to fit your database structure)
        $rpi_data = [
            'rpi_owner_id'          => $user_id,
            'rpi_title'             => $this->request->getPost('projectTitle'),
            'rpi_abstract'          => $abstract_attachment ?? '',
            'rpi_proof_of_payment'  => $pop_attachment ?? '',
            'rpi_rc_id'             => $this->request->getPost('projectCategory'),
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
                ->orWhere('agu_ag_id', 3)
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

    public function saveResearchDraft()
    {
        $user_id = $this->session->get('user_id');

        $validationRules = [
            'projectTitle'      => 'required',
            'projectCategory'   => 'required',
            'paperFile'         => 'uploaded[paperFile]|max_size[paperFile,2048]|ext_in[paperFile,pdf]',
            'teamMembers'       => 'required',
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

        // Save uploaded pop file
        $popFile = $this->request->getFile('proofOfPayment');
        if ($popFile->isValid() && !$popFile->hasMoved()) {
            $year = date('Y'); // Get current year
            $uploadPath = FCPATH . 'uploads/payment/' . $year;

            // Create the folder if it doesn't exist
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $newPopFileName = $popFile->getRandomName();
            $popFile->move($uploadPath, $newPopFileName);

            // Store path relative to base URL
            $pop_attachment = 'uploads/payment/' . $year . '/' . $newPopFileName;
        }

        // Save as draft
        $rpi_data = [
            'rpi_owner_id'          => $user_id,
            'rpi_title'             => $this->request->getPost('projectTitle'),
            'rpi_abstract'          => $abstract_attachment ?? '',
            'rpi_proof_of_payment'  => $pop_attachment ?? '',
            'rpi_rc_id'             => $this->request->getPost('projectCategory'),
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

    public function getResearchPaper()
    {
        $rpi_id = $this->request->getGet('rpi_id');

        // Fetch paper information
        $paper = $this->rims_paper_info->find($rpi_id);

        // Fetch team members separately
        $team_members = $this->rims_research_team
            ->where('rrt_rpi_id', $rpi_id)
            ->findAll();

        if (empty($paper)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Paper not found'
            ]);
        }

        // Convert object to array
        $paper = (array) $paper;

        // Add category description using the helper function
        if ($paper) {
            $paper['category_desc'] = get_category_desc($paper['rpi_rc_id']);
        }

        // Combine data only if the paper exists
        $response = [
            'paper' => $paper,
            'team_members' => $team_members
        ];

        return $this->response->setJSON([
            'success' => true,
            'response' => $response
        ]);
    }

    public function getRpiUpdateForm($rpi_id)
    {
        $this->session->set('rpi_id', $rpi_id); // Store in session

        return redirect()->to(base_url('participant/research/rpi-update-form'));
    }

    public function rpiUpdateForm()
    {
        $rpi_id = $this->session->get('rpi_id'); // Retrieve from session

        // Fetch paper information
        $paper = $this->rims_paper_info->find($rpi_id);

        // Fetch team members separately
        $team_members = $this->rims_research_team
            ->where('rrt_rpi_id', $rpi_id)
            ->findAll();

        $team_presenter = $this->rims_research_team
            ->where('rrt_rpi_id', $rpi_id)
            ->where('rrt_role', 'presenter')
            ->first();

        if (empty($paper)) {
            $this->session->setFlashdata('error', 'No Research Paper ID found in session.');
            return redirect()->back();
        }

        // Fetch category
        $research_category = $this->rims_category->findAll();

        $data = [
            'paper'             => $paper,
            'research_category' => $research_category,
            'team_members'      => $team_members,
            'team_presenter'    => $team_presenter,
        ];

        return $this->render_user('research_update_form', $data);
    }


    // Delete File Controller
    public function deleteFile()
    {
        $session = session();
        $rpi_id = $session->get('rpi_id');

        if (!$rpi_id) {
            return $this->response->setJSON(['success' => false, 'message' => 'No Research Paper ID found.']);
        }

        $fileType = $this->request->getPost('fileType');
        $paper = $this->rims_paper_info->find($rpi_id);

        if (!$paper) {
            return $this->response->setJSON(['success' => false, 'message' => 'Paper not found.']);
        }

        $filePath = ($fileType === 'abstract') ? $paper->rpi_abstract : $paper->proof_of_payment;

        if ($filePath && file_exists(FCPATH . $filePath)) {
            unlink(FCPATH . $filePath); // Delete the file
            $this->rims_paper_info->update($rpi_id, [$fileType === 'abstract' ? 'rpi_abstract' : 'proof_of_payment' => null]);

            return $this->response->setJSON(['success' => true, 'message' => 'File deleted successfully.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'File not found on server.']);
        }
    }


    public function update_team()
    {
        $teamModel = new \App\Models\TeamModel(); // Make sure TeamModel exists
        $rpi_id = $this->request->getPost('rpi_id');
        $presenter = $this->request->getPost('presenter');
        $teamMembers = $this->request->getPost('teamMembers');

        if (!$rpi_id || !$presenter || empty($teamMembers)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid data.']);
        }

        // Remove old team members for this paper
        $teamModel->where('rrt_rpi_id', $rpi_id)->delete();

        // Insert new presenter
        $teamModel->insert([
            'rrt_rpi_id' => $rpi_id,
            'rrt_name' => $presenter,
            'rrt_role' => 'presenter'
        ]);

        // Insert team members
        foreach ($teamMembers as $member) {
            if ($member !== $presenter) { // Avoid duplicate presenter as a member
                $teamModel->insert([
                    'rrt_rpi_id' => $rpi_id,
                    'rrt_name' => $member,
                    'rrt_role' => 'member'
                ]);
            }
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'Team updated successfully!']);
    }


    public function updateResearchPaper()
    {
        // $rpi_id = $this->request->getPost('rpi_id');
        // $model = new ResearchPaperModel();

        // $data = [
        //     'projectTitle'   => $this->request->getPost('projectTitle'),
        //     'projectCategory' => $this->request->getPost('projectCategory'),
        //     'teamLeader'     => $this->request->getPost('teamLeader'),
        //     'teamMembers'    => $this->request->getPost('teamMembers'),
        // ];

        // if ($model->update($rpi_id, $data)) {
        //     return $this->response->setJSON(['success' => true]);
        // } else {
        //     return $this->response->setJSON(['success' => false, 'message' => 'Update failed']);
        // }
    }
}
