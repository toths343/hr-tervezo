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

    abstract function getEntityList(int $id): Collection;

    abstract function getDatatable(): Datatable;

    function mergeable(int $id): bool
    {
        $lastHatvege = Carbon::createFromDate('1970', 1, 1)->startOfDay();
        foreach ($this->getEntityList($id) as $element) {
            if ($lastHatvege->addDay()->isSameDay($element->getHatkezd())) {
                return true;
            }
            $lastHatvege = $element->getHatvege();
        };
        return false;
    }
}
