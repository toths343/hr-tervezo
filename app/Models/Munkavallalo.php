<?php

namespace App\Models;

use App\Models\Base\Munkavallalo as BaseMunkavallalo;

class Munkavallalo extends BaseMunkavallalo
{
	protected $fillable = [
		'mkv_id',
		'mkv_nexon_szemely_id',
		'mkv_nexon_jogv_id',
		'mkv_nev',
		'mkv_hatkezd',
		'mkv_hatvege',
		'mkv_creater',
		'mkv_modifier'
	];
}
