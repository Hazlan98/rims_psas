<?php

namespace App\Modules\SuperAdmin\Controllers;

use App\Models\RimsField;
use App\Models\RimsCategory;
use App\Models\RimsEventModel;
use App\Controllers\BaseController;
use App\Models\RimsEventField;
use App\Models\RimsPaperInformation;

class EventCategoryController extends BaseController
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
    public function insertNewField()
    {
        $validationRules = [
            'category' => 'required|integer',
            'fieldDesc' => 'required|string|max_length[255]',
        ];

        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid input. Please check your data.'
            ]);
        }

        $category = $this->request->getPost('category');
        $fieldDesc = trim($this->request->getPost('fieldDesc'));

        $data = [
            'rf_rc_id'  => $category,
            'rf_desc'   => $fieldDesc
        ];

        if ($this->rims_field->insert($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'New field added successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to add new field.'
            ]);
        }

        return $this->response->setStatusCode(400)->setJSON([
            'status' => 'error',
            'message' => 'Invalid request method.'
        ]);
    }

    public function deleteField()
    {
        $fieldId = $this->request->getPost('id');

        if (!$fieldId || !is_numeric($fieldId)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid field ID.'
            ]);
        }

        if ($this->rims_field->delete($fieldId)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Research field deleted successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to delete research field.'
            ]);
        }

        return $this->response->setStatusCode(400)->setJSON([
            'status' => 'error',
            'message' => 'Invalid request method.'
        ]);
    }
}
