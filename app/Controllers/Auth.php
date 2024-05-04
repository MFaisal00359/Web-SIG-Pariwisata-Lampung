<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function showLoginForm()
    {
        return view('admin/login');
    }

    public function authenticate()
    {
        $request = $this->request;

        // Ambil data input
        $username = $request->getPost('username');
        $password = $request->getPost('password');

        // Validasi input
        if (empty($username) || empty($password)) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password');
        }

        $user = $this->userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session = session();
                $session->set('isLoggedIn', true);
                $session->set('userData', $user);

                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->back()->withInput()->with('error', 'Invalid password');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid username');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('isLoggedIn');
        $session->remove('userData');

        return redirect()->to('/admin/login')->with('success', 'You have been logged out');
    }
}
