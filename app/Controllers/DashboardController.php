<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Krs;
use App\Models\Matakuliah;
use App\Models\User;

class DashboardController extends BaseController
{
    public function index()
    {
        $user = new User();

        return view('dashboard/index', [
            'jumlah_mahasiswa' => $user->where('role', 'mahasiswa')->countAllResults(),
            'jumlah_dosen' => $user->where('role', 'dosen')->countAllResults(),
            'jumlah_matakuliah' => (new Matakuliah())->countAll(),
            'jumlah_krs' => (new Krs())->countAll(),
        ]);
    }
}
