<?php

namespace App\Models;

use CodeIgniter\Model;

class Dosen extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['foto', 'name', 'nip', 'username', 'alamat', 'telepon', 'password'];

    protected $validationRules = [
        'foto' => 'permit_empty',
        'username' => 'required',
        'name' => 'required',
        'nip' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
        'password' => 'permit_empty',
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username Harus Diisi!'
        ],
        'name' => [
            'required' => 'Nama Harus Diisi!'
        ],
        'nip' => [
            'required' => 'NIP Harus Diisi!'
        ],
        'alamat' => [
            'required' => 'Alamat Harus Diisi!'
        ],
        'telepon' => [
            'required' => 'Telepon Harus Diisi!'
        ]
    ];
}
