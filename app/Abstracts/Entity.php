<?php

namespace App\Abstracts;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

abstract class Entity
{
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
        $lastHatvege = Carbon::createFromDate('1970', 1, 1)->startOfDay();
        foreach ($this->getEntityList() as $element) {
            if ($lastHatvege->copy()->addDay()->isSameDay($element->getHatkezd())) {
                $mergeableDates[] = [$lastHatvege, $element->getHatkezd()];
            }
            $lastHatvege = $element->getHatvege();
        };
        return $mergeableDates;
    }
}
