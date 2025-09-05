<?php

namespace App\Models;

use CodeIgniter\Model;

class RimsNotification extends Model
{
    protected $table            = 'rims_notifications';
    protected $primaryKey       = 'rn_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'rn_id',
        'rn_au_id',
        'rn_title',
        'rn_description',
        'rn_is_read',
        'rn_created_at',
        'rn_updated_at',
        'rn_deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'rn_created_at';
    protected $updatedField  = 'rn_updated_at';
    protected $deletedField  = 'rn_deleted_at';

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
