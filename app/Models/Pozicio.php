<?php

namespace App\Models;

use App\Models\Base\Pozicio as BasePozicio;

class Pozicio extends BasePozicio
{
	protected $fillable = [
		'poz_mkv_id',
		'poz_pozk_uid',
		'poz_nev',
		'poz_szervezet',
		'poz_aktiv',
		'poz_hatkezd',
		'poz_hatvege',
		'poz_creater',
		'poz_modifier'
	];
}
