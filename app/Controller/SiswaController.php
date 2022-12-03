<?php

namespace App\Controller;

use App\Models\Siswa;

class SiswaController
{
	
	public function execute($params): void
	{
		$siswa = new Siswa();

		$result = $siswa->get()->where('id','=','1')->where('name','<','prabowo');

		var_dump($result);
	}
}