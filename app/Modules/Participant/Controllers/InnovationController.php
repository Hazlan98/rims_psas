<?php

namespace App\Modules\Participant\Controllers;

use App\Controllers\BaseController;
use App\Models\RimsPaperInformation;

class InnovationController extends BaseController
{
    protected $rims_paper_info;

    public function __construct()
    {
        $this->rims_paper_info = new RimsPaperInformation();
    }

    public function new_participation_form()
    {
        $data = [];
        $this->render_user('new_participation_form', $data);
    }

    public function submitResearchPaper()
    {
        // Validate input
        if (!$this->validate([
            'projectTitle' => 'required|string|max_length[255]',
            'projectCategory' => 'required|string|max_length[255]',
            'paperFile' => 'uploaded[paperFile]|max_size[paperFile,10048]|ext_in[paperFile,pdf]',
            'teamMembers' => 'required', // Use the custom rule here
        ])) {
            return $this->response->setJSON([
                'error' => true,
                'messages' => $this->validator->getErrors(),
            ]);
        }


        // Get the file and save it
        $file = $this->request->getFile('paperFile');
        $newFileName = $file->getRandomName();
        // $file->move(WRITEPATH . 'uploads/research/', $newFileName);

        // Get form data
        $data = [
            'projectTitle' => $this->request->getVar('projectTitle'),
            'projectCategory' => $this->request->getVar('projectCategory'),
            'teamMembers' => $this->request->getVar('teamMembers'),
            'fileName' => $newFileName,
        ];

        dd($data);
        // Process the data (e.g., store in database)
        $this->rims_paper_info->insert($data);

        // Respond with success
        return $this->response->setJSON([
            'error' => false,
            'message' => 'Research paper submitted successfully!',
        ]);
    }
}
