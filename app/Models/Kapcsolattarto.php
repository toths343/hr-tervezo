<?php

namespace App\Models;

use App\Models\Base\Kapcsolattarto as BaseKapcsolattarto;

class Kapcsolattarto extends BaseKapcsolattarto
{
	protected $fillable = [
		'kapcs_id',
		'kapcs_azonosito',
		'kapcs_tipus',
		'kapcs_par_id',
		'kapcs_nev',
		'kapcs_email',
		'kapcs_tel',
		'kapcs_hatkezd',
		'kapcs_hatvege',
		'kapcs_creater',
		'kapcs_modifier'
	];
}
