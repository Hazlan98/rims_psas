<?php

namespace App\Models;

use CodeIgniter\Model;

class RimsPaperInformation extends Model
{
    protected $table            = 'rims_paper_information';
    protected $primaryKey       = 'rpi_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'rpi_title',
        'rpi_abstract',
        'rpi_full_paper',
        'rpi_turnitin_report',
        'rpi_status',
        'rpi_rf_id',
        'rpi_re_id',
        'rpi_presentation_link',
        'rpi_owner_id',
        'rpi_presenter_id',
        'rpi_proof_of_payment',
        'rpi_payment_verification',
        'rpi_payment_verifier_id',
        'rpi_publisher_id',
        'rpi_submitted_at',
        'rpi_created_at',
        'rpi_updated_at',
        'rpi_deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'rpi_created_at';
    protected $updatedField  = 'rpi_updated_at';
    protected $deletedField  = 'rpi_deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
