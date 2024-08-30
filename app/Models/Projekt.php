<?php

namespace App\Models;

use App\Interfaces\HatalyosModel;
use App\Models\Base\Projekt as BaseProjekt;
use Carbon\Carbon;

class Projekt extends BaseProjekt implements HatalyosModel
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

    public function getUid(): int
    {
        return $this->prj_uid;
    }

    public function getUniqueName(): string
    {
        return $this->prj_nev . ' (' . $this->prj_azonosito . ')';
    }

    public function getHatkezd(): Carbon
    {
        return $this->prj_hatkezd;
    }

    public function getHatvege(): Carbon
    {
        return $this->prj_hatvege;
    }

    public function getHatInterval(): string
    {
        return $this->prj_hatkezd->format('Y.m.d') . ' - ' . $this->prj_hatvege->format('Y.m.d');
    }
}
