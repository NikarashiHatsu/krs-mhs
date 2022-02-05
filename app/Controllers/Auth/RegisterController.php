<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Services\Auth\RegisterUser;
use CodeIgniter\Config\Services;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('auth/register', [
            'title' => 'REGISTER',
            'typed_title' => true
        ]);
    }

    public function register()
    {
        $validator = Services::validation();
        $validator->run($this->request->getPost(), 'register');

        if ($validator->getErrors()) {
            return redirect()->back()->with('errors', $validator->getErrors());
        }

        try {
            new RegisterUser($this->request->getPost());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Telah terjadi error: ' . $th->getMessage());
        }

        return redirect()->to('/login')->with('success', 'Berhasil registrasi akun, silahkan login.');
    }
}
