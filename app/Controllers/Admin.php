<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        // Tampilkan halaman login admin
        return view('admin/login');
    }

    public function login()
    {
        // Ambil data input dari form login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Contoh validasi sederhana
        if ($username === 'admin' && $password === 'admin123') {
            // Jika kredensial benar, arahkan ke halaman admin dashboard atau halaman yang diinginkan
            return redirect()->to('dashboard');
        } else {
            // Jika kredensial salah, kembali ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function dashboard()
    {
        // Tampilkan halaman dashboard admin
        return view('admin/dashboard');
    }
}
