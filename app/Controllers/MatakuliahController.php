<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Matakuliah;

class MatakuliahController extends BaseController
{
    private Matakuliah $matakuliah;
    
    public function __construct()
    {
        $this->matakuliah = new Matakuliah();
        $this->matakuliah->asObject();
    }

    public function index()
    {
        $model = $this->matakuliah;
        $data['datatable'] = true;
        $data['matakuliah'] = $model->findAll();
        $data['title'] = 'List Mata Kuliah';
		echo view('dashboard/matakuliah/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Tambah Matakuliah';
		echo view('dashboard/matakuliah/create', $data);
    }
}
