<?php

namespace App\Models;

use CodeIgniter\Model;

class Mahasiswa extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['foto', 'name', 'nim', 'angkatan', 'semester', 'username', 'password'];

    protected $validationRules = [
        'foto' => 'permit_empty',
        'username' => 'required',
        'name' => 'required',
        'nim' => 'required',
        'angkatan' => 'required',
        'semester' => 'required',
        'password' => 'permit_empty',
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username Harus Diisi!'
        ],
        'name' => [
            'required' => 'Nama Harus Diisi!'
        ],
        'nim' => [
            'required' => 'NIM Harus Diisi!'
        ],
        'angkatan' => [
            'required' => 'Angkatan Harus Diisi!'
        ],
        'semester' => [
            'required' => 'Semester Harus Diisi!'
        ]
    ];
}
