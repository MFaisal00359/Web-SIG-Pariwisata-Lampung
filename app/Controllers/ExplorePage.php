<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ExplorePage extends BaseController
{
    public function index()
    {
        return view('explore_place');
    }
}
