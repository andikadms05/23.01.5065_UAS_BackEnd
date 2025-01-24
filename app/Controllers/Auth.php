<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        // Tampilkan halaman login
        return view('login_view');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Dummy autentikasi
        if ($username === 'dimas' && $password === '123') {
            session()->set('isLoggedIn', true);
            return redirect()->to('/mahasiswa');
        }

        // Jika login gagal
        session()->setFlashdata('error', 'Username atau password salah');
        return redirect()->back();
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}
        