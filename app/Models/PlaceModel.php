<?php

namespace App\Models;

use CodeIgniter\Model;

class PlaceModel extends Model
{
    protected $table = 'places';
    protected $allowedFields = ['name', 'location', 'description', 'photo', 'latitude', 'longitude'];
    protected $useTimestamps = true;
}
