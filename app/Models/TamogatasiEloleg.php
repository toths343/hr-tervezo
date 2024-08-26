<?php

namespace App\Models;

use App\Models\Base\TamogatasiEloleg as BaseTamogatasiEloleg;

class TamogatasiEloleg extends BaseTamogatasiEloleg
{
	protected $fillable = [
		'tam_sorszam',
		'tam_tipus',
		'tam_prj_id',
		'tam_dkfbeerkezett',
		'tam_dkfbeerkezett_datum',
		'tam_dkfelfogadott',
		'tam_dkfelfogadott_datum',
		'tam_szallitobeerkezett',
		'tam_szallitobeerkezett_datum',
		'tam_szallitoelszamolt',
		'tam_szallitoelszamolt_datum',
		'tam_creater',
		'tam_modifier'
	];
}
