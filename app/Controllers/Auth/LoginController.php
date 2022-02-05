<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Services\Auth\LogInUser;
use Config\Services;

class LoginController extends BaseController
{
    public function index()
    {
        return view('auth/login', [
            'title' => 'LOGIN',
            'typed_title' => true
        ]);
    }

    public function auth()
    {
        $validator = Services::validation();
        $validator->run($this->request->getPost(), 'login');

        if ($validator->getErrors()) {
            return redirect()->back()->with('errors', $validator->getErrors());
        }

        try {
            new LogInUser($this->request);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Telah terjadi error: ' . $th->getMessage());
        }

        return redirect()->to('/dashboard')->with('success', 'Selamat, anda berhasil melakukan login.');
    }
}
