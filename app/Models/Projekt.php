<?php

namespace App\Models;

use App\Models\Base\Projekt as BaseProjekt;

class Projekt extends BaseProjekt
{
	protected $fillable = [
		'prj_id',
		'prj_kat',
		'prj_azonosito',
		'prj_jelleg',
		'prj_nev',
		'prj_rovid_nev',
		'prj_status',
		'prj_feladat_modja',
		'prj_kapcs_id',
		'prj_tamogatasi_nyilv',
		'prj_tamogatasi_datum',
		'prj_kezdete',
		'prj_vege',
		'prj_tam_eu',
		'prj_tam_hazai',
		'prj_dkf_tam_eu',
		'prj_dkf_tam_hazai',
		'prj_hrterv_kezd',
		'prj_hrterv_vege',
		'prj_forras',
		'prj_munkaszam',
		'prj_konzorciumban',
		'prj_hatkezd',
		'prj_hatvege',
		'prj_creater',
		'prj_modifier'
	];
}
