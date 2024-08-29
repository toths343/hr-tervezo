<?php

namespace App\Interfaces;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

interface Entity
{
    function getType(): string;

    function getBuilder(): Builder;

    function getBreadcrumbName(): string;

    function getEntityList(int $id): Collection;

}
