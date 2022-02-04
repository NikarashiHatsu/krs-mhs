<?php

namespace App\Controllers;

use App\Models\KrsChildren;
use CodeIgniter\RESTful\ResourceController;

class KrsChildrenController extends ResourceController
{
    protected $modelName = KrsChildren::class;

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        try {
            $this->model->insert($this->request->getPost([
                'krs_id',
                'mata_kuliah_id',
            ]));

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambah Mata Kuliah ke KRS.');
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

        return redirect()->back()->with('success', 'Berhasil menghapus Mata Kuliah dari KRS.');
    }
}
