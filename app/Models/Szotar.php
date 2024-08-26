<?php

namespace App\Models;

use App\Models\Base\Szotar as BaseSzotar;

class Szotar extends BaseSzotar
{
	protected $fillable = [
		'szo_tipus',
		'szo_rnev',
		'szo_hnev',
		'szo_creater',
		'szo_modifier'
	];
}
