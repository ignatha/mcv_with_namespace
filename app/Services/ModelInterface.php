<?php

namespace App\Services;

interface ModelInterface
{
    public function findById($id);
    public function get(array $col);
    public function insert();
    public function update();
    public function delete();

    public function call();
}
