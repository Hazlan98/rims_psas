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
use App\Models\RimsPaperRemark;

class ResearchProjectController extends BaseController
{
    protected $rims_paper_info;
    protected $rims_event;
    protected $rims_category;
    protected $rims_research_team;
    protected $rims_field;
    protected $rims_event_field;
    protected $auth_groups_user;
    protected $rims_notification;
    protected $rims_paper_remark;

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
        $this->rims_paper_remark    = new RimsPaperRemark();
    }

    public function getRPDetails($rpi_id)
    {
        try {
            // Validate input: Ensure $rpi_id is not empty and is a valid numeric ID
            if (empty($rpi_id) || !is_numeric($rpi_id)) {
                throw new \Exception("Invalid Research Project ID.");
            }

            // Store rpi_id in session
            if (!$this->session) {
                throw new \Exception("Session not initialized.");
            }

            $this->session->set('rpi_id', $rpi_id);

            // Redirect to the research project details page
            return redirect()->to(base_url('participant/research_project/rp_details'));
        } catch (\Exception $e) {
            // Log error for debugging
            log_message('error', 'Error in getRPDetails: ' . $e->getMessage());

            // Show user-friendly error message
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    public function rPDetails()
    {

        try {
            // Fetch RPI ID from session
            $rpi_id = $this->session->get('rpi_id');

            // Validate session data
            if (empty($rpi_id) || !is_numeric($rpi_id)) {
                throw new \Exception("Invalid or missing Research Project ID.");
            }

            // Fetch all information based on rpi_id
            $rpi_info = $this->rims_paper_info->find($rpi_id);

            // Check if data exists
            if (!$rpi_info) {
                throw new \Exception("Research project details not found.");
            }

            // Fetch team presentor
            $team_presentor = $this->rims_research_team
                ->where('rrt_rpi_id', $rpi_id)
                ->where('rrt_role', 'presenter')
                ->first();
            // Fetch team members separately
            $team_members = $this->rims_research_team
                ->where('rrt_rpi_id', $rpi_id)
                ->where('rrt_role', 'member')
                ->findAll();

            $data = [
                'rpi_info'          => $rpi_info,
                'team_presentor'    => $team_presentor,
                'team_members'      => $team_members,
            ];

            return $this->render_user('research_project/rp_details', $data);
        } catch (\Exception $e) {
            // Log error for debugging
            log_message('error', 'Error in rPDetails: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    public function getRPUpdateForm($rpi_id)
    {
        $this->session->set('rpi_id', $rpi_id); // Store in session

        return redirect()->to(base_url('participant/research_project/rp-update-form'));
    }

    public function rPUpdateForm()
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
        // Fetch field based on category
        $research_field = $this->rims_event_field
            ->select('rf_id, rf_desc')
            ->where('ref_re_id', $paper->rpi_re_id)
            ->join('rims_field', 'rims_field.rf_id = rims_event_fields.ref_rf_id', 'left')
            ->findAll();

        // Fetch Comment from admin and judges
        $admin_comments = $this->rims_paper_remark
            ->join('users_information', 'users_information.ui_id = rims_paper_remarks.rpr_reprimand_id', 'left')
            ->where('rpr_rpi_id', $rpi_id)->findAll();
        $data = [
            'paper'             => $paper,
            'research_field'    => $research_field,
            'team_members'      => $team_members,
            'team_presenter'    => $team_presenter,
            'admin_comments'    => $admin_comments
        ];

        return $this->render_user('research_project/rp_update_form', $data);
    }

    public function getRPUpdateFullRPForm($rpi_id)
    {
        $this->session->set('rpi_id', $rpi_id); // Store in session

        return redirect()->to(base_url('participant/research_project/rp-update-full-rp-form'));
    }

    public function rPUpdateFullRPForm()
    {
        $rpi_id = $this->session->get('rpi_id'); // Retrieve from session

        // Fetch paper information
        $paper = $this->rims_paper_info->find($rpi_id);

        if (empty($paper)) {
            $this->session->setFlashdata('error', 'No Research Paper ID found in session.');
            return redirect()->back();
        }

        // Fetch Comment from admin and judges
        $admin_comments = $this->rims_paper_remark
            ->join('users_information', 'users_information.ui_id = rims_paper_remarks.rpr_reprimand_id', 'left')
            ->where('rpr_rpi_id', $rpi_id)->findAll();

        $data = [
            'rpi_info'             => $paper,
            'admin_comments'       => $admin_comments,
        ];

        return $this->render_user('research_project/rp_update_full_form', $data);
    }

    public function getRPMakeCorrection($rpi_id)
    {
        $this->session->set('rpi_id', $rpi_id); // Store in session

        return redirect()->to(base_url('participant/research_project/rp-make-correction'));
    }

    public function rPMakeCorrection()
    {
        $rpi_id = $this->session->get('rpi_id'); // Retrieve from session

        // Fetch paper information
        $paper = $this->rims_paper_info->find($rpi_id);

        if (empty($paper)) {
            $this->session->setFlashdata('error', 'No Research Paper ID found in session.');
            return redirect()->back();
        }

        // Fetch Comment from admin and judges
        $admin_comments = $this->rims_paper_remark
            ->join('users_information', 'users_information.ui_id = rims_paper_remarks.rpr_reprimand_id', 'left')
            ->where('rpr_rpi_id', $rpi_id)->findAll();

        $data = [
            'rpi_info'             => $paper,
            'admin_comments'       => $admin_comments,
        ];

        return $this->render_user('research_project/rp_correction_form', $data);
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

        $fileColumns = [
            'abstract'          => 'rpi_abstract',
            'proof_of_payment'  => 'rpi_proof_of_payment',
            'full_report'       => 'rpi_full_paper',
            'turnitin_report'   => 'rpi_turnitin_report'
        ];

        if (isset($fileColumns[$fileType])) {
            $column = $fileColumns[$fileType];
            $filePath = $paper->$column;

            if ($filePath && file_exists(FCPATH . $filePath)) {
                unlink(FCPATH . $filePath); // Delete the file
                $this->rims_paper_info->update($rpi_id, [$column => null]);

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'File deleted successfully.',
                    'csrfName' => csrf_token(),  // New CSRF name
                    'csrfHash' => csrf_hash()    // New CSRF hash
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'File not found on server.',
                    'csrfName' => csrf_token(),  // New CSRF name
                    'csrfHash' => csrf_hash()    // New CSRF hash
                ]);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid file type.']);
        }
    }

    public function updateParticipationResearchProject()
    {
        $rpi_id = $this->session->get('rpi_id'); // Retrieve from session

        // Load the request object
        $request = $this->request;

        // Initialize validation rules
        $validationRules = [
            'projectTitle'  => 'required',
            'projectField'  => 'required',
            'teamMembers'   => 'required',
        ];

        // Conditionally add validation rules for paperFile
        $file = $request->getFile('paperFile');
        if ($file && $file->isValid()) {
            $validationRules['paperFile'] = 'uploaded[paperFile]|max_size[paperFile,51200]|ext_in[paperFile,pdf]';
        }

        // Conditionally add validation rules for proofOfPayment
        // $popFile = $request->getFile('proofOfPayment');
        // if ($popFile && $popFile->isValid()) {
        //     $validationRules['proofOfPayment'] = 'uploaded[proofOfPayment]|max_size[proofOfPayment,51200]|ext_in[proofOfPayment,pdf]';
        // }

        if (!$this->validate($validationRules)) {
            return $this->response->setStatusCode(400)->setJSON([
                'errors'    => $this->validator->getErrors(),
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }


        // Initialize data array
        $rpi_data = [
            'rpi_title'        => $this->request->getPost('projectTitle'),
            'rpi_rf_id'        => $this->request->getPost('projectField'),
            'rpi_status'       => 'Draft',
            'rpi_submitted_at' => null // No submission date for drafts
        ];

        // Save uploaded abstract
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $year = date('Y');
            $uploadPath = FCPATH . 'uploads/abstract/' . $year;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $newFileName = $file->getRandomName();
            $file->move($uploadPath, $newFileName);

            $rpi_data['rpi_abstract'] = 'uploads/abstract/' . $year . '/' . $newFileName;
        }

        // Save uploaded proof of payment file
        // if ($popFile && $popFile->isValid() && !$popFile->hasMoved()) {
        //     $year = date('Y');
        //     $uploadPath = FCPATH . 'uploads/payment/' . $year;

        //     if (!is_dir($uploadPath)) {
        //         mkdir($uploadPath, 0777, true);
        //     }

        //     $newPopFileName = $popFile->getRandomName();
        //     $popFile->move($uploadPath, $newPopFileName);

        //     $rpi_data['rpi_proof_of_payment'] = 'uploads/payment/' . $year . '/' . $newPopFileName;
        // }

        // Update research paper info
        $this->rims_paper_info->update($rpi_id, $rpi_data);

        if ($rpi_id) {
            // Delete current team members before updating
            $this->rims_research_team->where('rrt_rpi_id', $rpi_id)->delete();

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

        return $this->response->setStatusCode(200)->setJSON([
            'message'   => 'Research paper saved as draft!',
            'csrfToken' => csrf_hash(), // 🔑 refresh token
        ]);
    }

    public function submitParticipationResearchProject()
    {
        $rpi_id = $this->session->get('rpi_id'); // Retrieve from session

        // Load the request object
        $request = $this->request;

        // Initialize validation rules
        $validationRules = [
            'projectTitle'  => 'required',
            'projectField'  => 'required',
            'teamMembers'   => 'required',
        ];

        // Conditionally add validation rules for paperFile
        $file = $request->getFile('paperFile');
        if ($file && $file->isValid()) {
            $validationRules['paperFile'] = 'uploaded[paperFile]|max_size[paperFile,51200]|ext_in[paperFile,pdf]';
        }

        // Conditionally add validation rules for proofOfPayment
        // $popFile = $request->getFile('proofOfPayment');
        // if ($popFile && $popFile->isValid()) {
        //     $validationRules['proofOfPayment'] = 'uploaded[proofOfPayment]|max_size[proofOfPayment,51200]|ext_in[proofOfPayment,pdf]';
        // }

        if (!$this->validate($validationRules)) {
            return $this->response->setStatusCode(400)->setJSON([
                'errors'    => $this->validator->getErrors(),
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }


        // Initialize data array
        $rpi_data = [
            'rpi_title'        => $this->request->getPost('projectTitle'),
            'rpi_rf_id'        => $this->request->getPost('projectField'),
            'rpi_status'       => 'Submit',
            'rpi_submitted_at' => date('Y-m-d H:i:s') // No submission date for drafts
        ];

        // Save uploaded abstract
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $year = date('Y');
            $uploadPath = FCPATH . 'uploads/abstract/' . $year;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $newFileName = $file->getRandomName();
            $file->move($uploadPath, $newFileName);

            $rpi_data['rpi_abstract'] = 'uploads/abstract/' . $year . '/' . $newFileName;
        }

        // Save uploaded proof of payment file
        // if ($popFile && $popFile->isValid() && !$popFile->hasMoved()) {
        //     $year = date('Y');
        //     $uploadPath = FCPATH . 'uploads/payment/' . $year;

        //     if (!is_dir($uploadPath)) {
        //         mkdir($uploadPath, 0777, true);
        //     }

        //     $newPopFileName = $popFile->getRandomName();
        //     $popFile->move($uploadPath, $newPopFileName);

        //     $rpi_data['rpi_proof_of_payment'] = 'uploads/payment/' . $year . '/' . $newPopFileName;
        // }

        // Update research paper info
        $this->rims_paper_info->update($rpi_id, $rpi_data);

        if ($rpi_id) {
            // Delete current team members before updating
            $this->rims_research_team->where('rrt_rpi_id', $rpi_id)->delete();

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

        return $this->response->setStatusCode(200)->setJSON([
            'message'   => 'Research paper saved as draft!',
            'csrfToken' => csrf_hash(), // 🔑 refresh token
        ]);
    }

    /**
     * Uploads a file and returns its relative path.
     */
    private function uploadFile($inputName, $folder)
    {
        $file = $this->request->getFile($inputName);
        if ($file->isValid() && !$file->hasMoved()) {
            $year = date('Y');
            $uploadPath = FCPATH . "uploads/{$folder}/{$year}";

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $newFileName = $file->getRandomName();
            $file->move($uploadPath, $newFileName);

            return "uploads/{$folder}/{$year}/{$newFileName}";
        }
        return null;
    }

    // Submit Full Report
    public function updateFullResearhProject()
    {

        $rpi_id = $this->session->get('rpi_id');
        $validation = \Config\Services::validation();


        // Fetch rpi info to check existing data
        $rpi_info = $this->rims_paper_info->find($rpi_id);
        if (!$rpi_info) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Invalid request. Record not found.',
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }


        // Fetch presentation link
        $presentationLink = $this->request->getPost('project_link');

        // Default attachments (keep existing values if not updated)
        $turnitin_report_attachment = $rpi_info->rpi_turnitin_report ?? null;
        $full_report_attachment = $rpi_info->rpi_full_paper ?? null;
        $pop_attachment = $rpi_info->rpi_proof_of_payment ?? null;

        // Set validation rules
        $rules = [
            'project_link' => 'required|valid_url',
        ];

        if (!$rpi_info->rpi_turnitin_report) {
            $rules['turnitin_report'] = 'uploaded[turnitin_report]|mime_in[turnitin_report,application/pdf]';
        }

        if (!$rpi_info->rpi_full_paper) {
            $rules['full_report'] = 'uploaded[full_report]|mime_in[full_report,application/pdf]';
        }

        if (!$rpi_info->rpi_proof_of_payment) {
            $rules['proof_of_payment'] = 'uploaded[proof_of_payment]|mime_in[proof_of_payment,application/pdf]';
        }


        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => implode('<br>', $validation->getErrors()),
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }



        // Process file uploads
        if (!$rpi_info->rpi_turnitin_report) {
            $turnitin_report_attachment = $this->uploadFile('turnitin_report', 'turnitinReport');
        }

        if (!$rpi_info->rpi_full_paper) {
            $full_report_attachment = $this->uploadFile('full_report', 'fullReport');
        }

        if (!$rpi_info->rpi_proof_of_payment) {
            $pop_attachment = $this->uploadFile('proof_of_payment', 'payment');
        }

        // Store data in the database
        $rpi_data = [
            'rpi_presentation_link' => $presentationLink,
            'rpi_full_paper' => $full_report_attachment,
            'rpi_proof_of_payment' => $pop_attachment,
            'rpi_turnitin_report' => $turnitin_report_attachment,
            'rpi_updated_at' => date('Y-m-d H:i:s'),
            'rpi_status' => 'awaiting payment approval',
            'rpi_payment_verification' => null,
        ];

        if ($this->rims_paper_info->update($rpi_id, $rpi_data)) {
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
                    'rn_title'       => 'Participant: Full Paper Submission',
                    'rn_description' => 'New Submission Has been Made.'
                ];

                $this->rims_notification->insert($notification_data);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Files uploaded successfully!',
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }

        return $this->response->setStatusCode(400)->setJSON([
            'success' => false,
            'message' => 'Failed to update the record.',
            'csrfToken' => csrf_hash(), // 🔑 refresh token
        ]);
    }

    // Save as Draft Full Report
    public function draftFullResearchProject()
    {
        $rpi_id = $this->session->get('rpi_id');
        $validation = \Config\Services::validation();

        // Fetch rpi info to check existing data
        $rpi_info = $this->rims_paper_info->find($rpi_id);
        if (!$rpi_info) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Invalid request. Record not found.',
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }

        // Fetch presentation link
        $presentationLink = $this->request->getPost('project_link');

        // Default attachments (keep existing values if not updated)
        $turnitin_report_attachment = $rpi_info->rpi_turnitin_report ?? null;
        $full_report_attachment = $rpi_info->rpi_full_paper ?? null;
        $pop_attachment = $rpi_info->rpi_proof_of_payment ?? null;

        // Set validation rules
        $rules = [
            'project_link' => 'required|valid_url',
        ];

        if (!$rpi_info->rpi_turnitin_report) {
            $rules['turnitin_report'] = 'uploaded[turnitin_report]|mime_in[turnitin_report,application/pdf]';
        }

        if (!$rpi_info->rpi_full_paper) {
            $rules['full_report'] = 'uploaded[full_report]|mime_in[full_report,application/pdf]';
        }

        if (!$rpi_info->rpi_proof_of_payment) {
            $rules['proofOfPayment'] = 'uploaded[proof_of_payment]|mime_in[proof_of_payment,application/pdf]';
        }

        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => implode('<br>', $validation->getErrors()),
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }

        // Process file uploads
        if (!$rpi_info->rpi_turnitin_report) {
            $turnitin_report_attachment = $this->uploadFile('turnitin_report', 'turnitinReport');
        }

        if (!$rpi_info->rpi_full_paper) {
            $full_report_attachment = $this->uploadFile('full_report', 'fullReport');
        }

        if (!$rpi_info->rpi_proof_of_payment) {
            $pop_attachment = $this->uploadFile('proof_of_payment', 'payment');
        }

        // Store data in the database
        $rpi_data = [
            'rpi_presentation_link' => $presentationLink,
            'rpi_full_paper' => $full_report_attachment,
            'rpi_proof_of_payment' => $pop_attachment,
            'rpi_turnitin_report' => $turnitin_report_attachment,
            'rpi_updated_at' => date('Y-m-d H:i:s'),
            'rpi_status' => 'Full Report Draft',
        ];

        if ($this->rims_paper_info->update($rpi_id, $rpi_data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Files uploaded successfully!',
                'csrfToken' => csrf_hash(), // 🔑 refresh token
            ]);
        }

        return $this->response->setStatusCode(400)->setJSON([
            'success' => false,
            'message' => 'Failed to update the record.',
            'csrfToken' => csrf_hash(), // 🔑 refresh token
        ]);
    }

    // Submit Full Report
    public function updateCorrection()
    {

        $rpi_id = $this->session->get('rpi_id');
        $validation = \Config\Services::validation();


        // Fetch rpi info to check existing data
        $rpi_info = $this->rims_paper_info->find($rpi_id);
        if (!$rpi_info) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Invalid request. Record not found.',
            ]);
        }


        // Fetch presentation link
        $presentationLink = $this->request->getPost('project_link');

        // Default attachments (keep existing values if not updated)
        $turnitin_report_attachment = $rpi_info->rpi_turnitin_report ?? null;
        $full_report_attachment = $rpi_info->rpi_full_paper ?? null;

        // Set validation rules
        $rules = [
            'project_link' => 'required|valid_url',
        ];

        if (!$rpi_info->rpi_turnitin_report) {
            $rules['turnitin_report'] = 'uploaded[turnitin_report]|mime_in[turnitin_report,application/pdf]';
        }

        if (!$rpi_info->rpi_full_paper) {
            $rules['full_report'] = 'uploaded[full_report]|mime_in[full_report,application/pdf]';
        }


        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => implode('<br>', $validation->getErrors()),
            ]);
        }



        // Process file uploads
        if (!$rpi_info->rpi_turnitin_report) {
            $turnitin_report_attachment = $this->uploadFile('turnitin_report', 'turnitinReport');
        }

        if (!$rpi_info->rpi_full_paper) {
            $full_report_attachment = $this->uploadFile('full_report', 'fullReport');
        }

        // Store data in the database
        $rpi_data = [
            'rpi_presentation_link' => $presentationLink,
            'rpi_full_paper' => $full_report_attachment,
            'rpi_turnitin_report' => $turnitin_report_attachment,
            'rpi_updated_at' => date('Y-m-d H:i:s'),
            'rpi_status' => 'Awaiting Review',
            'rpi_payment_verification' => null,
        ];

        if ($this->rims_paper_info->update($rpi_id, $rpi_data)) {
            // Fetch all admin
            $admin_lists = $this->auth_groups_user
                ->select('agu_au_id')
                ->where('agu_ag_id', 1)
                ->orWhere('agu_ag_id', 3)
                ->findAll();

            foreach ($admin_lists as $admin) {
                // Give Admin Notification
                $notification_data = [
                    'rn_au_id'       => $admin->agu_au_id, // Use array notation if `findAll()` returns an array
                    'rn_title'       => 'Participant: Correction Submission',
                    'rn_description' => 'New Correction Has been Made.'
                ];

                $this->rims_notification->insert($notification_data);
            }

            // also give notification to reviewers
            $reviewer_notification = [
                'rn_au_id'       => $rpi_info->rpi_judge_id, // Use array notation if `findAll()` returns an array
                'rn_title'       => 'Participant: Correction Submission',
                'rn_description' => 'New Correction Has been Made.'
            ];

            $this->rims_notification->insert($reviewer_notification);


            return $this->response->setJSON([
                'success' => true,
                'message' => 'Files uploaded successfully!',
            ]);
        }

        return $this->response->setStatusCode(400)->setJSON([
            'success' => false,
            'message' => 'Failed to update the record.',
        ]);
    }

    // Save as Draft Full Report
    public function draftCorrection()
    {
        $rpi_id = $this->session->get('rpi_id');
        $validation = \Config\Services::validation();

        // Fetch rpi info to check existing data
        $rpi_info = $this->rims_paper_info->find($rpi_id);
        if (!$rpi_info) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Invalid request. Record not found.',
            ]);
        }

        // Fetch presentation link
        $presentationLink = $this->request->getPost('project_link');

        // Default attachments (keep existing values if not updated)
        $turnitin_report_attachment = $rpi_info->rpi_turnitin_report ?? null;
        $full_report_attachment = $rpi_info->rpi_full_paper ?? null;

        // Set validation rules
        $rules = [
            'project_link' => 'required|valid_url',
        ];

        if (!$rpi_info->rpi_turnitin_report) {
            $rules['turnitin_report'] = 'uploaded[turnitin_report]|mime_in[turnitin_report,application/pdf]';
        }

        if (!$rpi_info->rpi_full_paper) {
            $rules['full_report'] = 'uploaded[full_report]|mime_in[full_report,application/pdf]';
        }

        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => implode('<br>', $validation->getErrors()),
            ]);
        }

        // Process file uploads
        if (!$rpi_info->rpi_turnitin_report) {
            $turnitin_report_attachment = $this->uploadFile('turnitin_report', 'turnitinReport');
        }

        if (!$rpi_info->rpi_full_paper) {
            $full_report_attachment = $this->uploadFile('full_report', 'fullReport');
        }

        // Store data in the database
        $rpi_data = [
            'rpi_presentation_link' => $presentationLink,
            'rpi_full_paper' => $full_report_attachment,
            'rpi_turnitin_report' => $turnitin_report_attachment,
            'rpi_updated_at' => date('Y-m-d H:i:s'),
            'rpi_status' => 'Correction Draft',
        ];

        if ($this->rims_paper_info->update($rpi_id, $rpi_data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Files uploaded successfully!',
            ]);
        }

        return $this->response->setStatusCode(400)->setJSON([
            'success' => false,
            'message' => 'Failed to update the record.',
        ]);
    }
}
