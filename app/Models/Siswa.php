<?php

namespace App\Models;

use App\Models\Model;

class Siswa extends Model
{

	public function nis() {

		$sekarang = new \DateTime("NOW");

		$con = $this->con()->db();
        $stmt = $con->prepare("SELECT MAX(nis) AS kode_terakhir FROM siswa WHERE Date(created_at) = CURDATE()");
        $con->beginTransaction();
        $stmt->execute();
        $con->commit();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (isset($data['kode_terakhir'])) {
        	$newNumber = explode("D", $data['kode_terakhir']);
        	$newNumber = $sekarang->format("ymd") . "D" . $newNumber[1]+1;
        } else {
        	$newNumber = $sekarang->format("ymd") . "D" . 1;
        }
        return $newNumber;
    }

}