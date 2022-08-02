<?php

namespace App\Services;

use App\Models\Siswa;

class SiswaServices
{
	
	public function execute($params): void
	{
		//params
		$title = "Halaman Siswa";
		$siswas = $this->getSiswa();

		if (isset($params['edit'])) {
			$nis = $params['edit'];
			$dataSiswa = $this->getSiswa($nis); 
		}

		require_once __DIR__ . '/../views/siswa/indexSiswa.phtml';
	}

	private function getSiswa($where=null)
	{
		$siswa = new Siswa;

		if ($where != null) {
			$result = $siswa->con()->db()->prepare('SELECT * FROM siswa WHERE nis =?');
			$result->execute([$where]);
		} else {
			$result = $siswa->con()->db()->prepare('SELECT * FROM siswa');
			$result->execute();
		}
        $result = $result->fetchAll(\PDO::FETCH_CLASS, 'App\Models\Siswa');
        return $result;
	}

	public function postSiswa($params): void
	{
		$siswa = new Siswa;

		$result = $siswa->con()->db()->prepare('INSERT INTO siswa (nis, nama, alamat) VALUES (?,?,?)');
        $result->execute([$siswa->nis(),$params['nama'], $params['alamat']]);
        
        header("Content-Type: application/json");
		echo json_encode(['message' => 'success']);
	}

	public function updateSiswa($params): void
	{
		$siswa = new Siswa;

		$result = $siswa->con()->db()->prepare('UPDATE siswa SET nama=?, alamat=? WHERE nis=?');
        $result->execute([$params['nama'], $params['alamat'], $params['nis']]);
        
        header("Content-Type: application/json");
		echo json_encode(['message' => 'success']);
	}
}