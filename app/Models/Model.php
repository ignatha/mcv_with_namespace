<?php

namespace App\Models;

use App\Services\Connect;

class Model
{

    use Connect;

    public function __construct(){

        $this->db = $this->db();
    }
}