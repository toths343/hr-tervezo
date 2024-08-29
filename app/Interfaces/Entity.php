<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface Entity
{
    function getType(): string;

    function getEloquentClass(): string;

    function getBreadcrumbName(): string;

    function getEntityList(int $id): Collection;

}
