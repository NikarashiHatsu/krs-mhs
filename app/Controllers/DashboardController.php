<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Matakuliah;
use App\Models\User;

class DashboardController extends BaseController
{
    public function index()
    {
        $user = new User();
        $matakuliah = new Matakuliah();
        $data['jumlah_mahasiswa'] = $user->where('role', 'mahasiswa')->countAllResults();
        $data['jumlah_dosen'] = $user->where('role', 'dosen')->countAllResults();
        $data['jumlah_matakuliah'] = $matakuliah->countAll();
        return view('dashboard/index', $data);
    }
}
