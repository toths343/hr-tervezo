<?php

namespace App\Models;

use App\Models\Base\PozicioKategorium as BasePozicioKategorium;

class PozicioKategorium extends BasePozicioKategorium
{
	protected $fillable = [
		'pozk_kod',
		'pozk_nev',
		'pozk_tipus',
		'pozk_besorolas',
		'pozk_creater',
		'pozk_modifier'
	];
}
