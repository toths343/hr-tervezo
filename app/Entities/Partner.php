<?php

namespace App\Entities;

use App\Interfaces\Entity;
use App\Models\Base\Partner as PartnerBase;
use App\Models\Partner as PartnerModel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Partner implements Entity
{

    function getType(): string
    {
        return 'partner';
    }

    function getBuilder(): Builder
    {
        return PartnerModel::query();
    }

    function getBreadcrumbName(): string
    {
        return __('entity.partners');
    }

    function getEntityList(int $id): Collection
    {
        return $this->getBuilder()->where(PartnerBase::PAR_ID, $id)->orderBy(PartnerBase::PAR_HATKEZD)->get();
    }

}
