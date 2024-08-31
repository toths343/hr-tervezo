<?php

namespace App\Models;

use App\Interfaces\HatalyosModel;
use App\Models\Base\Partner as BasePartner;
use Carbon\Carbon;

class Partner extends BasePartner implements HatalyosModel
{
    const PAR_CREATED = 'par_created';
    const PAR_LASTUPD = 'par_lastupd';

    public function getUid(): int
    {
        return $this->par_uid;
    }

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

    public function isActive(): bool
    {
        $actDate = session()->get('actDate')->format('Y-m-d');
        return $this->par_hatkezd <= $actDate && $this->par_hatvege >= $actDate;
    }
}
