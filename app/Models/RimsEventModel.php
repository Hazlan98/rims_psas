<?php

namespace App\Models;

use CodeIgniter\Model;

class RimsEventModel extends Model
{
    protected $table            = 'rims_event';
    protected $primaryKey       = 're_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        're_name',
        're_type',
        're_start_date',
        're_end_date',
        're_rc_id',
        're_location',
        're_description',
        're_organizer',
        're_status',
        're_max_participants',
        're_registration_deadline',
        're_banner_image',
        're_contact_email',
        're_speakers',
        're_created_at',
        're_updated_at',
        're_deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 're_created_at';
    protected $updatedField  = 're_updated_at';
    protected $deletedField  = 're_deleted_at';

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
