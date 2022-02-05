<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mahasiswa;
use Exception;

class MahasiswaController extends BaseController
{
    private Mahasiswa $mahasiswa;
    
    public function __construct()
    {
        $this->mahasiswa = new Mahasiswa();
        $this->mahasiswa->asObject();
    }

    public function index()
    {
        $model = $this->mahasiswa;
        $data['datatable'] = true;
        $data['typed_title'] = true;
        $data['mahasiswa'] = $model->where('role', 'mahasiswa')->findAll();
        $data['title'] = 'List Mahasiswa';
		echo view('dashboard/mahasiswa/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Tambah Mahasiswa';
		echo view('dashboard/mahasiswa/create', $data);
    }

    public function create()
    {
        $foto = $this->request->getFile('foto')->store();
        $data = [
            'username' => $this->request->getPost('username'),
            'name' => $this->request->getPost('name'),
            'nim' => $this->request->getPost('nim'),
            'angkatan' => $this->request->getPost('angkatan'),
            'semester' => $this->request->getPost('semester'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'mahasiswa',
            'foto' => $foto,
        ];

        if (!$this->mahasiswa->validate($data)) {
            return redirect()->to('/dashboard/mahasiswa/new')->withInput()->with('errors', $this->mahasiswa->errors());
        }

        try {
            $this->mahasiswa->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/mahasiswa/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/mahasiswa/new')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $model = $this->mahasiswa;
        $data['data'] = $model->where('id', $id)->first();
        $data['title'] = 'Update Data';
        
        echo view('dashboard/mahasiswa/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'name' => $this->request->getPost('name'),
            'nim' => $this->request->getPost('nim'),
            'angkatan' => $this->request->getPost('angkatan'),
            'semester' => $this->request->getPost('semester'),
        ];

        if (!empty($_FILES['foto']['name'])) {
            $foto = $this->request->getFile('foto')->store();
            $data['foto'] = $foto;
        }

        if ($this->request->getPost('password') != '') {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        if (!$this->mahasiswa->validate($data)) {
            return redirect()->to('/dashboard/mahasiswa/edit/'. $id)->withInput()->with('errors', $this->mahasiswa->errors());
        }

        try {
            $this->mahasiswa->protect(false)->update($id, $data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/mahasiswa/edit/'. $id)->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/mahasiswa/edit/'. $id)->with('success', 'Berhasil mengupdate data');
    }

    public function delete($id){
        try {
            $this->mahasiswa->delete($id);
        } catch (Exception $e) {
            return redirect()->to('dashboard/mahasiswa')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/dashboard/mahasiswa')->with('success', 'Berhasil menghapus data');
    }
}