<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Matakuliah;
use Exception;

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

    public function create()
    {
        $status = ($this->request->getPost('status')) ? 1 : 0;
        $data = [
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'status' => $status,
            'sks' => $this->request->getPost('sks'),
            'kategori' => $this->request->getPost('kategori'),
        ];

        if (!$this->matakuliah->validate($data)) {
            return redirect()->to('/dashboard/matakuliah/new')->withInput()->with('errors', $this->matakuliah->errors());
        }

        try {
            $this->matakuliah->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/matakuliah/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/matakuliah/new')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $model = $this->matakuliah;
        $data['data'] = $model->where('id', $id)->first();
        $data['title'] = 'Update Data';
        
        echo view('dashboard/matakuliah/edit', $data);
    }

    public function update($id)
    {
        $status = ($this->request->getPost('status')) ? 1 : 0;
        $data = [
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'status' => $status,
            'sks' => $this->request->getPost('sks'),
            'kategori' => $this->request->getPost('kategori'),
        ];

        if (!$this->matakuliah->validate($data)) {
            return redirect()->to('/dashboard/matakuliah/edit/'. $id)->withInput()->with('errors', $this->matakuliah->errors());
        }

        try {
            $this->matakuliah->protect(false)->update($id, $data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/matakuliah/edit/'. $id)->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/matakuliah/edit/'. $id)->with('success', 'Berhasil mengupdate data');
    }

    public function delete($id){
        try {
            $this->matakuliah->delete($id);
        } catch (Exception $e) {
            return redirect()->to('dashboard/matakuliah')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/dashboard/matakuliah')->with('success', 'Berhasil menghapus data');
    }
}
