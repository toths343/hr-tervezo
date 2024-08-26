<?php

namespace App\Models;

use App\Models\Base\TenyBerBetolte as BaseTenyBerBetolte;

class TenyBerBetolte extends BaseTenyBerBetolte
{
	protected $fillable = [
		'tebb_sorszam',
		'tebb_jogv_id',
		'tebb_von_kezd',
		'tebb_von_vege',
		'tebb_szamf_kezd',
		'tebb_szamf_vege',
		'tebb_munkavallalo',
		'tebb_tartozik_fokonyv',
		'tebb_tartozik_megnevezes',
		'tebb_juttatas',
		'tebb_kovetel_fokonyv',
		'tebb_kovetel_megnevezes',
		'tebb_osszeg',
		'tebb_creater',
		'tebb_modifier'
	];
}
