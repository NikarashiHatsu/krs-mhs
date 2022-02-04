<?php

namespace App\Controllers;

use App\Models\Krs;
use App\Models\KrsChildren;
use CodeIgniter\RESTful\ResourceController;

class KrsMahasiswaController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $krs = (new Krs)->findAll();

        array_map(function ($kr) {
            $kr->detail = (new KrsChildren)
                ->select('krs_children.id, matakuliahs.kode_mk, matakuliahs.nama_mk, matakuliahs.sks')
                ->join('matakuliahs', 'matakuliahs.id = krs_children.mata_kuliah_id', 'left')
                ->where('krs_id', $kr->id)
                ->findAll();
        }, $krs);

        return view('dashboard/krs_mahasiswa/index', [
            'krs' => $krs,
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
