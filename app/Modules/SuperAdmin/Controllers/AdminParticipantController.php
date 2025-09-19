<?php

namespace App\Modules\SuperAdmin\Controllers;

use App\Models\RimsField;
use App\Models\RimsJudge;
use App\Models\RimsCategory;
use App\Models\RimsEventField;
use App\Models\RimsEventModel;
use App\Models\EvaluationModel;
use App\Models\UserInformation;
use App\Models\ResearchTeamModel;
use App\Controllers\BaseController;
use App\Models\RimsPaperInformation;

class AdminParticipantController extends BaseController
{
    protected $rims_event;
    protected $rims_category;
    protected $rims_field;
    protected $rims_paper_info;
    protected $rims_event_fields;
    protected $rims_research_team;
    protected $rims_judge;
    protected $user_information;
    protected $evaluations;

    public function __construct()
    {
        $this->rims_event               = new RimsEventModel();
        $this->rims_research_team       = new ResearchTeamModel();
        $this->rims_category            = new RimsCategory();
        $this->rims_field               = new RimsField();
        $this->rims_paper_info          = new RimsPaperInformation();
        $this->rims_event_fields        = new RimsEventField();
        $this->rims_judge               = new RimsJudge();
        $this->user_information         = new UserInformation();
        $this->evaluations              = new EvaluationModel();
    }

    public function getParticipationData($rpi_id)
    {
        $this->session->set('rpi_id', $rpi_id);  // Load session

        return redirect()->to(base_url('superAdmin/participant/participation-data'));
    }

    public function participationData()
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
        // check if rpi_status = Payment Approved 
        $judges_list = null; // Initialize as null

        if ($rpi_details->rpi_status == 'Payment Approved' || $rpi_details->rpi_status == 'Awaiting Reviewer Acceptance') {
            // Fetch List of judges based on the field
            $judges_list = $this->rims_judge
                ->join('users_information', 'rims_judge.rj_au_id = users_information.ui_au_id', 'left')
                ->where('rj_rf_id', $rpi_details->rpi_rf_id)
                ->findAll();
        }

        $judge_names = [];

        if ($rpi_details->rpi_status == 'Awaiting Reviewer Acceptance') {
            $evaluations = $this->evaluations
                ->where('ev_rpi_id', $rpi_details->rpi_id)
                ->where('ev_status', 'pending')
                ->findAll();

            if ($evaluations) {
                foreach ($evaluations as $evaluation) {
                    $user = $this->user_information
                        ->select('ui_name, ui_au_id')
                        ->where('ui_au_id', $evaluation->ev_rj_id)
                        ->first();

                    if ($user) {
                        $judge_names[] = [
                            'id'   => $user->ui_au_id,
                            'name' => $user->ui_name
                        ];
                    }
                }
            }
        }


        $data = [
            'rpi'          => $rpi_details,
            'team_members' => $team_members,
            'judges_list'  => $judges_list,
            'judge_name'   => $judge_names,
        ];

        dd($judges_list);

        return $this->render_user('participant/participant_abstract_review', $data);
    }
}
