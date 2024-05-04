<?php

namespace App\Controllers;

use App\Models\PlaceModel;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/login');
    }

    public function dashboard()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/admin/login')->with('error', 'You must be logged in to access the dashboard');
        }

        return view('admin/dashboard');
    }

    public function place_data()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/admin/login')->with('error', 'You must be logged in to access this page');
        }

        $placeModel = new PlaceModel();
        $data['places'] = $placeModel->findAll();

        return view('admin/place_data', $data);
    }
}
