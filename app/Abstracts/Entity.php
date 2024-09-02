<?php

namespace App\Abstracts;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

abstract class Entity
{
    public ?int $uid;
    public ?int $id;

    abstract function getType(): string;

    abstract function getBuilder(): Builder;

    abstract function getBreadcrumbName(): string;

    abstract function getEntityList(): Collection;

    abstract function getDatatable(): Datatable;

    function mergeable(): bool
    {
        $lastHatvege = Carbon::createFromDate('1970', 1, 1)->startOfDay();
        foreach ($this->getEntityList() as $element) {
            if ($lastHatvege->addDay()->isSameDay($element->getHatkezd())) {
                return true;
            }
            $lastHatvege = $element->getHatvege();
        };
        return false;
    }

    function getMergeableDates(): array
    {
        $mergeableDates = [];
        $lastHatKezd = Carbon::createFromDate('1970', 1, 1)->startOfDay();
        $lastHatvege = Carbon::createFromDate('1970', 1, 1)->startOfDay();
        foreach ($this->getEntityList() as $element) {
            if ($lastHatvege->copy()->addDay()->isSameDay($element->getHatkezd())) {
                $mergeableDates[] = [
                    'startInterval' => [$lastHatKezd, $lastHatvege],
                    'endInterval' => [$element->getHatkezd(), $element->getHatvege()],
                    'name' => $element->getUniqueName(),
                    'uid' => $element->getUid(),
                ];
            }
            $lastHatKezd = $element->getHatKezd();
            $lastHatvege = $element->getHatvege();
        };
        return $mergeableDates;
    }

    function canInsertBeforeFirst(): bool
    {
        if (!$this->getEntityList()->isEmpty() && $this->getEntityList()->first()->getHatkezd()->isAfter(Carbon::createFromFormat('Y-m-d','1970-01-01'))) {
            return true;
        }
        return false;
    }

    function canInsertAfterLast(): bool
    {
        if (!$this->getEntityList()->isEmpty() && $this->getEntityList()->last()->getHatvege()->isBefore(Carbon::createFromFormat('Y-m-d H:i:s','3999-12-31 00:00:00'))) {
            return true;
        }
        return false;
    }

    function getEditorData(): array
    {
        return [];
    }

}
