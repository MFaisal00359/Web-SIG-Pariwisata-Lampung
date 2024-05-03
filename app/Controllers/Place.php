<?php

namespace App\Controllers;

class Place extends BaseController
{
    public function detail(): string
    {
        return view('place_detail');
    }
}
