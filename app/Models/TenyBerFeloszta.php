<?php

namespace App\Models;

use App\Models\Base\TenyBerFeloszta as BaseTenyBerFeloszta;

class TenyBerFeloszta extends BaseTenyBerFeloszta
{
	protected $fillable = [
		'teb_tebb_uid',
		'teb_jogv_id',
		'teb_jut_uid',
		'teb_szamf_ev',
		'teb_szamf_honap',
		'teb_von_kezd',
		'teb_von_vege',
		'teb_m_napok',
		'teb_n_napok',
		'teb_m_ora',
		'teb_osszeg',
		'teb_nido_hiany',
		'teb_creater',
		'teb_modifier'
	];
}
