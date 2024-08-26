<?php

namespace App\Models;

use App\Models\Base\PozicioOrabonta as BasePozicioOrabonta;

class PozicioOrabonta extends BasePozicioOrabonta
{
	protected $fillable = [
		'pozb_poz_uid',
		'pozb_prj_uid',
		'pozb_ev',
		'pozb_honap',
		'pozb_ora',
		'pozb_kezd',
		'pozb_vege',
		'pozb_creater',
		'pozb_modifier'
	];
}
