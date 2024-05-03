<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function showLoginForm()
    {
        return view('admin/login');
    }

    public function authenticate()
    {
        $request = $this->request;

        // Validasi input
        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[6]'
        ];

        $errors = [
            'password' => [
                'min_length' => 'Password must be at least 6 characters long.'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password');
        }

        // Lakukan proses autentikasi
        // ...

        // Contoh autentikasi sederhana, Anda dapat menyesuaikan dengan kebutuhan Anda
        $username = $request->getPost('username');
        $password = $request->getPost('password');

        if ($username !== 'admin' || $password !== 'password') {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password');
        }

        // Autentikasi berhasil
        return redirect()->to('/admin/dashboard');
    }
}
