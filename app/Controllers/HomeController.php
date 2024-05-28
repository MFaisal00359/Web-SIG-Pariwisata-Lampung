<?php

namespace App\Controllers;

use App\Models\PlaceModel;

class HomeController extends BaseController
{
    public function index()
    {
        $model = new PlaceModel();
        $data = [
            'places' => $model->paginate(6),
            'pager' => $model->pager
        ];
        echo view('welcome_page', $data);
    }

    public function placeDetail($id)
    {
        $model = new PlaceModel();
        $data['place'] = $model->find($id);
        if (!$data['place']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Place with ID ' . $id . ' not found');
        }
        echo view('place_detail', $data);
    }

    public function explorePlace()
    {
        $model = new PlaceModel();
        $data['places'] = $model->findAll();
        echo view('explore_place', $data);
    }
}
