<?php

namespace App\Models;

use App\Models\Model;

class Siswa extends Model
{
    public $table = "siswa";
    public $firstQuery = null;
    public $secondQuery = null;
    public $condition = [];
}