<?php

namespace App\Models;

use CodeIgniter\Model;

class Matakuliah extends Model
{
    protected $table      = 'matakuliahs';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_mk', 'nama_mk', 'sks', 'kategori', 'status'];

    protected $validationRules = [
        'kode_mk' => 'required',
        'nama_mk' => 'required',
        'sks' => 'required',
        'kategori' => 'required',
        'status' => 'required',
    ];

    protected $validationMessages = [
        'kode_mk' => [
            'required' => 'Kode MK Harus Diisi!'
        ],
        'nama_mk' => [
            'required' => 'Nama MK Harus Diisi!'
        ],
        'sks' => [
            'required' => 'SKS Harus Diisi!'
        ],
        'kategori' => [
            'required' => 'Kategori Harus Diisi!'
        ],
        'status' => [
            'required' => 'Status Harus Diisi!'
        ],
    ];
}
