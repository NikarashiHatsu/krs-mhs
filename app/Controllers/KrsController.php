<?php

namespace App\Controllers;

use App\Models\Krs;
use App\Models\KrsChildren;
use App\Models\Matakuliah;
use CodeIgniter\RESTful\ResourceController;

class KrsController extends ResourceController
{
    protected $modelName = Krs::class;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('dashboard/krs/index', [
            'title' => 'List KRS',
            'krs' => $this->model
                ->select('krs.id, krs.nama, krs.semester, COUNT(krs_children.krs_id) AS jumlah_mata_kuliah, SUM(matakuliahs.sks) AS jumlah_sks')
                ->join('krs_children', 'krs_children.krs_id = krs.id', 'left')
                ->join('matakuliahs', 'krs_children.mata_kuliah_id = matakuliahs.id', 'left')
                ->groupBy('krs.id')
                ->findAll(),
            'datatable' => true,
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return view('dashboard/krs/show', [
            'title' => 'Detail KRS',
            'krs' => $this->model->find($id),
            'krs_children' => (new KrsChildren)
                ->select('matakuliahs.kode_mk, matakuliahs.nama_mk, matakuliahs.sks, krs_children.id')
                ->join('matakuliahs', 'krs_children.mata_kuliah_id = matakuliahs.id')
                ->where('krs_id', $id)->findAll(),
            'mata_kuliahs' => (new Matakuliah)->asObject()->findAll(),
        ]);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('dashboard/krs/new', [
            'title' => 'Tambah KRS',
        ]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        try {
            $this->model->insert($this->request->getPost([
                'nama',
                'semester',
            ]));

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambah KRS.');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        return view('dashboard/krs/edit', [
            'title' => 'Edit KRS',
            'krs' => $this->model->find($id),
        ]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        try {
            $this->model->update($id, $this->request->getPost([
                'nama',
                'semester',
            ]));

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah tugas.');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        try {
            $this->model->delete($id);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus tugas.');
    }
}
