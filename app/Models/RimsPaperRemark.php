<?php

namespace App\Models;

use CodeIgniter\Model;

class RimsPaperRemark extends Model
{
    protected $table            = 'rims_paper_remarks';
    protected $primaryKey       = 'rpr_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'rpr_remarks',
        'rpr_rpi_id',
        'rpr_read_status',
        'rpr_reprimand_id',
        'rpr_created_at',
        'rpr_updated_at',
        'rpr_deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'rpr_created_at';
    protected $updatedField  = 'rpr_updated_at';
    protected $deletedField  = 'rpr_deleted_at';

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
