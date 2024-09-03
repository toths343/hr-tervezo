<?php

namespace App\Models;

use App\Events\DatabaseEvent;
use App\Interfaces\HatalyosModel;
use App\Models\Base\Projekt as BaseProjekt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projekt extends BaseProjekt implements HatalyosModel
{
    use SoftDeletes;

    const DELETED_AT = self::PRJ_DEL;

    const CREATED_AT = self::PRJ_CREATED;

    const CREATED_BY = self::PRJ_CREATER;

    const UPDATED_AT = self::PRJ_LASTUPD;

    const UPDATED_BY = self::PRJ_MODIFIER;

    public $timestamps = true;

    protected $dispatchesEvents = [
        'updating' => DatabaseEvent::class,
        'saving' => DatabaseEvent::class,
        'creating' => DatabaseEvent::class,
        'deleting' => DatabaseEvent::class,
    ];

    public function getId(): int
    {
        return $this->prj_id;
    }

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

    public function isActive(): bool
    {
        $actDate = session()->get('actDate')->format('Y-m-d');
        return $this->prj_hatkezd <= $actDate && $this->prj_hatvege >= $actDate;
    }

    public static function getNextId(): int
    {
        return (Projekt::query()->max(BaseProjekt::PRJ_ID) ?? 0) + 1;
    }
}
