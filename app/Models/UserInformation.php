<?php

namespace App\Models;

use CodeIgniter\Model;

class UserInformation extends Model
{
    protected $table            = 'users_information';
    protected $primaryKey       = 'ui_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ui_name',
        'ui_email',
        'ui_address',
        'ui_phone_number',
        'ui_au_id',
        'ui_created_at',
        'ui_updated_at',
        'ui_deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'ui_created_at';
    protected $updatedField  = 'ui_updated_at';
    protected $deletedField  = 'ui_deleted_at';

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
