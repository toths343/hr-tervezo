<?php

namespace App\Models;

use App\Models\Base\Juttata as BaseJuttata;

class Juttata extends BaseJuttata
{
	protected $fillable = [
		'jut_cid',
		'jut_tartozik_fokonyv',
		'jut_tartozik_megnevezes',
		'jut_juttatas',
		'jut_kovetel_fokonyv',
		'jut_kovetel_megnevezes',
		'jut_ktgtip',
		'jut_osztasalap',
		'jut_hatkezd',
		'jut_hatvege',
		'jut_creater',
		'jut_modifier'
	];
}
