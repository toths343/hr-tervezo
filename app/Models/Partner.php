<?php

namespace App\Models;

use App\Models\Base\Partner as BasePartner;
use Carbon\Carbon;

class Partner extends BasePartner
{
    protected $fillable = [
        'par_id',
        'par_azonosito',
        'par_nev',
        'par_adoszam',
        'par_nyilv_szam',
        'par_cim',
        'par_hatkezd',
        'par_hatvege',
        'par_creater',
        'par_modifier',
    ];

    public function getUniqueName(): string
    {
        return $this->par_nev . ' (' . $this->par_cim . ')';
    }

    public function getHatkezd(): Carbon
    {
        return $this->par_hatkezd;
    }

    public function getHatvege(): Carbon
    {
        return $this->par_hatvege;
    }

    public function getHatInterval(): string
    {
        return $this->par_hatkezd->format('Y.m.d') . ' - ' . $this->par_hatvege->format('Y.m.d');
    }
}
