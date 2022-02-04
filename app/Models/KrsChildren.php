<?php

namespace App\Models;

use CodeIgniter\Model;

class KrsChildren extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'krs_children';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'krs_id',
        'mata_kuliah_id',
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'krs_id' => 'required|integer',
        'mata_kuliah_id' => 'required|integer',
    ];
    protected $validationMessages   = [
        'krs_id' => [
            'required' => 'Krs harus diisi',
            'integer' => 'Krs harus berisi angka',
        ],
        'mata_kuliah_id' => [
            'required' => 'Mata kuliah harus diisi',
            'integer' => 'Mata kuliah harus berisi angka',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];
}
