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
            'required' => 'Kode MK Harus Diisi!'
        ],
        'nim' => [
            'required' => 'Nama MK Harus Diisi!'
        ],
        'angkatan' => [
            'required' => 'SKS Harus Diisi!'
        ],
        'semester' => [
            'required' => 'Kategori Harus Diisi!'
        ]
    ];
}
