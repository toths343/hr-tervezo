<?php

namespace App\Models;

use App\Models\Base\Partner as BasePartner;

class Partner extends BasePartner
{
	protected $fillable = [
		'par_id',
		'par_azonosito',
		'par_nev',
		'par_adoszam',
		'par_nyilv_szam',
		'par_cim',
		'par_hatkezd',
		'par_hatvege',
		'par_creater',
		'par_modifier'
	];
}
