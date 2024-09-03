<?php

namespace App\Models;

use App\Events\DatabaseEvent;
use App\Interfaces\HatalyosModel;
use App\Models\Base\Partner as BasePartner;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends BasePartner implements HatalyosModel
{
    use SoftDeletes;

    const DELETED_AT = self::PAR_DEL;

    const CREATED_AT = self::PAR_CREATED;

    const CREATED_BY = self::PAR_CREATER;

    const UPDATED_AT = self::PAR_LASTUPD;

    const UPDATED_BY = self::PAR_MODIFIER;

    public $timestamps = true;

    protected $dispatchesEvents = [
        'updating' => DatabaseEvent::class,
        'saving' => DatabaseEvent::class,
        'creating' => DatabaseEvent::class,
        'deleting' => DatabaseEvent::class,
    ];

    public function getId(): int
    {
        return $this->par_id;
    }

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
        $actDate = session()->get('actDate')->format('Y.m.d');
        return $this->par_hatkezd->format('Y.m.d') <= $actDate && $this->par_hatvege->format('Y.m.d') >= $actDate;
    }

    public static function getNextId(): int
    {
        return (Partner::query()->max(BasePartner::PAR_ID) ?? 0) + 1;
    }
}
