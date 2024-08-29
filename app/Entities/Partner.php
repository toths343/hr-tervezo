<?php

namespace App\Entities;

use App\Abstracts\Entity;
use App\Abstracts\IntervalEntity;
use App\DataTables\PartnerDataTable;
use App\Models\Base\Partner as PartnerBase;
use App\Models\Partner as PartnerModel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

class Partner extends Entity
{

    public function __construct(private readonly PartnerDataTable $partnerDataTable)
    {
    }

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

    function getDatatable(): Datatable
    {
        return $this->partnerDataTable;
    }

}
