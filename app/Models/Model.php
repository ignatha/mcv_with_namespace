<?php

namespace App\Models;

use App\Services\Connect;
use App\Services\ModelInterface;

abstract class Model implements ModelInterface
{
    // public $table;
    // public $firstQuery;
    // public $secondQuery;
    // public $condition;


    public function findById($id)
    {
        $this->firstQuery = "SELECT * FROM `$this->table` WHERE id=?";
        array_push($this->condition, $id);

        return $this;
    }


    public function get(array $col = null){

        if ($col === null) {
            $this->firstQuery = "SELECT * FROM `$this->table`";

            return $this;
        }

        $column = implode(",", array_map( function ($num){ return "`".$num."`"; }, $col ));

        $this->firstQuery = "SELECT $column FROM `$this->table`";

        return $this;
    }

    public function where($col, $condition, $val){

        if (empty($this->secondQuery) || $this->secondQuery == null) {
            $sql = " `$col` "." $condition "."?";
            $this->secondQuery .= " WHERE ".$sql;
            array_push($this->condition, $val);

            return $this;
        }

        $sql = " `$col` "." $condition "."?";
        $this->secondQuery .= " AND ".$sql;
        array_push($this->condition, $val);

        return $this;
    }

    public function insert(){
        return "INSERT";
    }

    public function update(){
        return "UPDATE";
    }

    public function delete(){
        return "DELETE";
    }

    public function getQuery() {
        return $this->firstQuery." ".$this->secondQuery;
    }

    public function getConditions() {
        return $this->firstQuery." ".$this->secondQuery;
    }

    public function call(){
        return "CALL";
    }
}