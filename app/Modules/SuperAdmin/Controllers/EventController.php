<?php

namespace App\Modules\SuperAdmin\Controllers;

use App\Models\RimsField;
use App\Models\RimsCategory;
use App\Models\RimsEventModel;
use App\Controllers\BaseController;
use App\Models\RimsEventField;
use App\Models\RimsPaperInformation;

class EventController extends BaseController
{
    protected $rims_event;
    protected $rims_category;
    protected $rims_field;
    protected $rims_paper_info;
    protected $rims_event_fields;

    public function __construct()
    {
        $this->rims_event               = new RimsEventModel();
        $this->rims_category            = new RimsCategory();
        $this->rims_field               = new RimsField();
        $this->rims_paper_info          = new RimsPaperInformation();
        $this->rims_event_fields        = new RimsEventField();
    }

    // View List of Event
    public function eventList()
    {
        // Select all registered research events
        $research_events = $this->rims_event->findAll();
        // Fecth event categories
        $event_category = $this->rims_category->findAll();
        $data = [
            'events' => $research_events,
            'event_category' => $event_category
        ];
        $this->render_user('event/event_list', $data);
    }

    // Fetch Selected Event ID
    public function getEventDetails($re_id)
    {
        // Store Event Id into session
        $this->session->set('selected_re_id', $re_id);

        return redirect('superAdmin/event/event_details');
    }

    // View Selected Event Details
    public function eventDetails()
    {
        // Fetch event id from session
        $re_id = $this->session->get('selected_re_id');

        // fetch Event data
        $event_info = $this->rims_event->find($re_id);

        // Fetch List of participant registered
        $registered_participant = $this->rims_paper_info
            ->where('rpi_status !=', 'Draft')
            ->where('rpi_re_id', $re_id)
            ->findAll();

        // Fetch Event Dropdown Field List
        $rims_field = $this->rims_field
            ->where('rf_rc_id', $event_info->re_rc_id)
            ->findAll();


        $event_field = $this->rims_event_fields
            ->select('*')
            ->join('rims_field', 'rims_event_fields.ref_rf_id = rims_field.rf_id', 'left')
            ->where('ref_re_id', $re_id)
            ->findAll();
        // dd($event_field);

        $data = [
            'event_info' => $event_info,
            'rims_field' => $rims_field,
            'event_field' => $event_field,
            'registered_participant' => $registered_participant,
        ];
        $this->render_user('event/event_details', $data);
    }

    public function submitEvent()
    {

        // Validate Input
        if (!$this->validate([
            're_name'                   => 'required|string|max_length[255]',
            're_max_participants'       => 'permit_empty|integer|min_length[1]',
            're_start_date'             => 'required|valid_date',
            're_end_date'               => 'required|valid_date',
            're_category'               => 'required',
            're_registration_deadline'  => 'permit_empty|valid_date',
            're_location'               => 'permit_empty|string|max_length[255]',
            're_description'            => 'permit_empty|string',
            're_organizer'              => 'required|string|max_length[255]',
            're_contact_email'          => 'permit_empty|valid_email',
            're_banner_image'           => 'uploaded[re_banner_image]|is_image[re_banner_image]|max_size[re_banner_image,50048]|mime_in[re_banner_image,image/png,image/jpeg,image/jpg]'
        ])) {
            return $this->response->setJSON([
                'error'     => true,
                'messages'  => $this->validator->getErrors(),
            ]);
        }

        // Handle File Upload
        $file = $this->request->getFile('re_banner_image');
        if ($file->isValid() && !$file->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/events/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true); // Create directory if it doesn't exist
            }
            $newFileName = $file->getRandomName();

            $file->move($uploadPath, $newFileName);
        } else {
            return $this->response->setJSON([
                'error' => true,
                'messages' => 'File upload failed.',
            ]);
        }

        // Prepare Data for Database Insertion
        $data = [
            're_name'                   => $this->request->getPost('re_name'),
            're_max_participants'       => $this->request->getPost('re_max_participants'),
            're_start_date'             => $this->request->getPost('re_start_date'),
            're_end_date'               => $this->request->getPost('re_end_date'),
            're_rc_id'                  => $this->request->getPost('re_category'),
            're_registration_deadline'  => $this->request->getPost('re_registration_deadline'),
            're_location'               => $this->request->getPost('re_location'),
            're_description'            => $this->request->getPost('re_description'),
            're_organizer'              => $this->request->getPost('re_organizer'),
            're_contact_email'          => $this->request->getPost('re_contact_email'),
            're_type'                   => 'research',
            're_banner_image'           => $newFileName, // Save file name in DB
        ];

        // Insert into Database
        $this->rims_event->insert($data);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Event submitted successfully!',
        ]);
    }

    public function eventCategoryAndField()
    {
        // Fetch All Category
        $category_list = $this->rims_category->findAll();

        // Fetch All Field
        $field_list = $this->rims_field->findAll();

        // dd($mapped_fields);

        $data = [
            'category_list' => $category_list,
            'field_list' => $field_list,
        ];
        $this->render_user('event/category_field_list', $data);
    }

    public function addEventField()
    {
        // Prepare Data for Database Insertion
        $data = [
            'ref_re_id'     => $this->request->getPost('ref_re_id'),
            'ref_rf_id'     => $this->request->getPost('ref_rf_id'),
        ];

        // Insert into Database
        $this->rims_event_fields->insert($data);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Event submitted successfully!',
        ]);
    }

    // Remove eventfield
    public function removeEventFields($ref_id)
    {
        // Delete data from table rims event field
        if ($this->rims_event_fields->delete($ref_id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Record deleted successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete record']);
        }
    }
    // Delete Event Function
    public function deleteEvent($id)
    {
        if ($this->rims_event->delete($id)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Event deleted successfully.',
                'csrf_token' => csrf_hash() // Send the updated CSRF token
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to delete event.',
                'csrf_token' => csrf_hash() // Send the updated CSRF token
            ]);
        }
    }

    // public function research_paper()
    // {
    //     // Select all registered research events
    //     $research_events = $this->rims_event->where('re_type', 'research')->findAll();
    //     $data = [
    //         'events' => $research_events
    //     ];
    //     $this->render_user('research_paper', $data);
    // }


}
