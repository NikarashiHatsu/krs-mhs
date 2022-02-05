<?php

namespace App\Controllers;

use App\Models\Krs;
use App\Models\KrsMahasiswa;
use CodeIgniter\RESTful\ResourceController;
use Config\Database;

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
        $db = Database::connect();

        array_map(function ($kr) use($db) {
            $kr->detail = $db
                ->query(
                    "SELECT krs_children.id, matakuliahs.kode_mk, matakuliahs.nama_mk, matakuliahs.sks, krs_mahasiswas.mahasiswa_id
                        FROM krs_children
                        LEFT JOIN matakuliahs ON matakuliahs.id = krs_children.mata_kuliah_id
                        LEFT JOIN krs_mahasiswas ON krs_children.id = krs_mahasiswas.krs_id
                        WHERE krs_children.krs_id = ?
                    UNION
                        SELECT krs_children.id, matakuliahs.kode_mk, matakuliahs.nama_mk, matakuliahs.sks, krs_mahasiswas.mahasiswa_id
                        FROM krs_children
                        LEFT JOIN matakuliahs ON matakuliahs.id = krs_children.mata_kuliah_id
                        LEFT JOIN krs_mahasiswas ON krs_children.id = krs_mahasiswas.krs_id
                        WHERE krs_children.krs_id = ?
                            AND krs_mahasiswas.mahasiswa_id = ?
                        ",
                    [$kr->id, $kr->id, session()->user->id]
                )
                ->getResultObject();
        }, $krs);

        if (session()->user->role == 'user') {
            $title = 'Fitur Ini Hanya Bisa Digunakan oleh Mahasiswa';
        } else {
            $title = 'KRS Saya';
        }

        return view('dashboard/krs_mahasiswa/index', [
            'title' => $title,
            'typed_title' => true,
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
        try {
            $krs_selected = $this->request->getPost('krs_child_id');
            $user_id = session()->user->id;

            for ($i = 0; $i < count($krs_selected); $i++) {
                (new KrsMahasiswa)->insert([
                    'krs_id' => $krs_selected[$i],
                    'mahasiswa_id' => $user_id,
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menyimpan KRS pilihan Anda.');
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
