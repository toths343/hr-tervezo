<?php

namespace App\Entities;

use App\Interfaces\Entity;
use App\Models\Base\Partner as PartnerBase;
use App\Models\Partner as PartnerModel;
use Illuminate\Database\Eloquent\Collection;

class Partner implements Entity
{

    function getType(): string
    {
        return 'partner';
    }

    function getEloquentClass(): string
    {
        return PartnerModel::class;
    }

    function getBreadcrumbName(): string
    {
        return __('entity.partners');
    }

    function getEntityList(int $id): Collection
    {
        return $this->getEloquentClass()::query()->where(PartnerBase::PAR_ID, $id)->orderBy(PartnerBase::PAR_HATKEZD)->get();
    }

}
