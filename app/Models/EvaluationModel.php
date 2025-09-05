<?php

namespace App\Models;

use CodeIgniter\Model;

class EvaluationModel extends Model
{
    protected $table            = 'evaluations';
    protected $primaryKey       = 'ev_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields    = [
        'ev_rpi_id',
        'ev_rj_id',
        'ev_re_id',
        'ev_review_date',
        'ev_total_score',
        'ev_additional_comments',
        'ev_recommendation',
        'ev_publication_status',
        'ev_status',
        'ev_created_at',
        'ev_updated_at',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Auto timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'ev_created_at';
    protected $updatedField  = 'ev_updated_at';
    protected $dateFormat    = 'datetime';

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
