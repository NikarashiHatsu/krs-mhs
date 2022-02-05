<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dosen;
use Exception;

class DosenController extends BaseController
{
    private Dosen $Dosen;
    
    public function __construct()
    {
        $this->dosen = new Dosen();
        $this->dosen->asObject();
    }

    public function index()
    {
        $model = $this->dosen;
        $data['datatable'] = true;
        $data['typed_title'] = true;
        $data['dosen'] = $model->where('role', 'dosen')->findAll();
        $data['title'] = 'List Dosen';
		echo view('dashboard/dosen/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Tambah Dosen';
		echo view('dashboard/dosen/create', $data);
    }

    public function create()
    {
        $foto = $this->request->getFile('foto')->store();
        $data = [
            'username' => $this->request->getPost('username'),
            'name' => $this->request->getPost('name'),
            'nip' => $this->request->getPost('nip'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'dosen',
            'foto' => $foto,
        ];

        if (!$this->dosen->validate($data)) {
            return redirect()->to('/dashboard/dosen/new')->withInput()->with('errors', $this->dosen->errors());
        }

        try {
            $this->dosen->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/dosen/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/dosen/new')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $model = $this->dosen;
        $data['data'] = $model->where('id', $id)->first();
        $data['title'] = 'Update Data';
        
        echo view('dashboard/dosen/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'name' => $this->request->getPost('name'),
            'nip' => $this->request->getPost('nip'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
        ];

        if (!empty($_FILES['foto']['name'])) {
            $foto = $this->request->getFile('foto')->store();
            $data['foto'] = $foto;
        }

        if ($this->request->getPost('password') != '') {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        if (!$this->dosen->validate($data)) {
            return redirect()->to('/dashboard/dosen/edit/'. $id)->withInput()->with('errors', $this->dosen->errors());
        }

        try {
            $this->dosen->protect(false)->update($id, $data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/dosen/edit/'. $id)->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/dosen/edit/'. $id)->with('success', 'Berhasil mengupdate data');
    }

    public function delete($id){
        try {
            $this->dosen->delete($id);
        } catch (Exception $e) {
            return redirect()->to('dashboard/dosen')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/dashboard/dosen')->with('success', 'Berhasil menghapus data');
    }
}