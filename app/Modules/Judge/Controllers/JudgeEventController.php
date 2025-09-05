<?php

namespace App\Modules\Judge\Controllers;

use App\Models\RimsField;
use App\Models\RimsJudge;
use App\Models\AuthGroupsUser;
use App\Models\RimsEventField;
use App\Models\RimsEventModel;
use App\Controllers\BaseController;
use App\Models\RimsPaperInformation;

class JudgeEventController extends BaseController
{
    protected $rims_paper_info;
    protected $rims_event;
    protected $rims_field;
    protected $rims_event_fields;
    protected $rims_judge;
    protected $auth_groups_users;

    public function __construct()
    {
        $this->rims_event               = new RimsEventModel();
        $this->rims_field               = new RimsField();
        $this->rims_paper_info          = new RimsPaperInformation();
        $this->rims_event_fields        = new RimsEventField();
        $this->rims_judge               = new RimsJudge();
        $this->auth_groups_users        = new AuthGroupsUser();
    }

    // Fetch Selected Event ID
    public function getJudgeEventDb($re_id)
    {
        // Store Event Id into session
        $this->session->set('selected_re_id', $re_id);

        return redirect('judge/event/judge_event_dashboard');
    }

    // View Selected Event Details
    public function judgeEventDb()
    {
        // Fetch event id from session
        $re_id = $this->session->get('selected_re_id');
        $user_id = $this->session->get('user_id');

        // fetch Event data
        $event_info = $this->rims_event->find($re_id);

        // Fetch Event Dropdown Field List
        $rims_field = $this->rims_event_fields
            ->select('rf_id, rf_desc')
            ->where('ref_re_id', $re_id)
            ->join('rims_field', 'rims_field.rf_id = rims_event_fields.ref_rf_id', 'left')
            ->findAll();

        // Check judge registration in event
        $judge_status = $this->rims_judge
            ->where('rj_au_id', $user_id)
            ->where('rj_re_id', $re_id)
            ->first();

        $assigned_rpi = [];
        if ($judge_status) {
            // ✅ Now use reviewer table (assuming table: rims_reviewer_assignment)
            // to fetch all paper assigned to this judge for this event
            $assigned_rpi = $this->rims_paper_info
                ->select('rims_paper_information.*, evaluations.ev_id')
                ->join('evaluations', 'evaluations.ev_rpi_id = rims_paper_information.rpi_id', 'inner')
                ->where('evaluations.ev_rj_id', $user_id)
                // ->where('evaluations.ev_re_id', $re_id)
                ->findAll();
        }

        $data = [
            'event_info'    => $event_info,
            'rims_field'    => $rims_field,
            'assign_rpi'    => $assigned_rpi,
            'judge_status'  => $judge_status,
        ];

        $this->render_user('event/event_details', $data);
    }


    // Register judge
    public function registerEventJudge()
    {
        $user_id = $this->session->get('user_id');

        // Insert data into database
        $data = [
            'rj_au_id' => $user_id,
            'rj_re_id' => $this->request->getPost('rj_re_id'),
            'rj_rf_id' => $this->request->getPost('rj_rf_id')
        ];

        $this->rims_judge->insert($data);

        // Check if user has already become judge
        $judge_status = $this->auth_groups_users
            ->where('agu_au_id', $user_id)
            ->where('agu_ag_id', 4)
            ->first();

        if ($judge_status) {
        } else {
            // register user to auth user table as judge role
            $auth_user_group_data = [
                'agu_au_id' => $user_id,
                'agu_ag_id' => 4
            ];

            $this->auth_groups_users->insert($auth_user_group_data);
        }

        return $this->response->setStatusCode(200)->setJSON([
            'status' => 'success',
            'message' => 'Research paper submitted successfully!',
        ]);
    }

    // View Selected Event Details
    public function assignedEvent()
    {

        $user_id = $this->session->get('user_id');

        // Fetch all events assigned to the judge
        $judge_event = $this->rims_judge->where('rj_au_id', $user_id)->findAll();

        $event_info = [];
        foreach ($judge_event as $event) {
            $event_info[] = $this->rims_event->find($event->rj_re_id);
        }

        $data = [
            'event_info' => $event_info, // Now contains an array of events
        ];

        $this->render_user('event/assigned_event_list', $data);
    }
}
