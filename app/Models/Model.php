<?php

namespace App\Models;

use App\Config\Connect;

class Model
{
    public $con;

    public function con()
    {
        $this->con = new Connect;
        return $this->con;
    }
}