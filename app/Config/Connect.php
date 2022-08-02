<?php

namespace App\Config;

class Connect
{
    public function db()
    {
        $host = "localhost";
        $dbname = "maxxima";
        $username = "root";
        $password = "";
        $result = new \PDO("mysql:host={$host};dbname={$dbname}", $username, $password);

        return $result;
    }

}
