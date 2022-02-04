<?php

namespace App\Models;

use CodeIgniter\Model;

class Krs extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'krs';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'nama',
        'semester',
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama' => 'required|string',
        'semester' => 'required|integer',
    ];
    protected $validationMessages   = [
        'nama' => [
            'required' => 'Nama harus diisi',
            'string' => 'Nama harus berisi huruf',
        ],
        'semester' => [
            'required' => 'Semester harus diisi',
            'integer' => 'Semester harus berisi angka',
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
