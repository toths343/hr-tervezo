<?php

namespace App\Models;

use App\Models\Base\VNexonPozicio as BaseVNexonPozicio;

class VNexonPozicio extends BaseVNexonPozicio
{
	protected $fillable = [
		'npoz_uid',
		'npoz_nexon_szemely_id',
		'npoz_nev',
		'npoz_aktiv',
		'npoz_szervezet',
		'npoz_hatkezd',
		'npoz_hatvege'
	];
}
