<?php

namespace App\Controllers;

use App\Models\Krs;
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
            'krs' => $this->model->findAll(),
            'datatable' => true,
        ]);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('dashboard/krs/new');
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
