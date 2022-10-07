<?php

namespace App\Models;

use App\Models\Model;

class Siswa extends Model
{

	public function nis() {

		$sekarang = new \DateTime("NOW");

        $stmt = $this->db->prepare("SELECT MAX(nis) AS kode_terakhir FROM siswa WHERE Date(created_at) = CURDATE()");
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (isset($data['kode_terakhir'])) {
        	$nis = explode("D", $data['kode_terakhir']);
            $number = (int) $nis[1] + 1;
            var_dump((int) $nis[1]);
        	$newNumber = (string) $sekarang->format("ymd")."D".$number;
        } else {
        	$newNumber = (string) $sekarang->format("ymd")."D".(int)1;
        }
        return $newNumber;
    }

}