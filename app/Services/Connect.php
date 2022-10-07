<?php

namespace App\Services;

trait Connect
{
    public function db()
    {
        $host = "localhost";
        $dbname = "mvc";
        $username = "root";
        $password = "";
        $result = new \PDO("mysql:host={$host};dbname={$dbname}", $username, $password);

        return $result;
    }

}
