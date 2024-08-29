<?php

namespace App\Interfaces;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

interface Entity
{
    function getType(): string;

    function getBuilder(): Builder;

    function getBreadcrumbName(): string;

    function getEntityList(int $id): Collection;

    function getDatatable(): Datatable;

}
