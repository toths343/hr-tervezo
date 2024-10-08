<?php

namespace App\Entities;

use App\Abstracts\Entity;
use App\DataTables\PartnerDataTable;
use App\Models\Base\Partner as PartnerBase;
use App\Models\Partner;
use App\Models\Partner as PartnerModel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

class PartnerEntity extends Entity
{

    public function __construct(private readonly PartnerDataTable $partnerDataTable, ?int $uid, ?int $id)
    {
        $this->uid = $uid;
        $this->id = $id;
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
        return __('entity.partnerek');
    }

    function getEntityList(): Collection
    {
        return $this->getBuilder()->where(PartnerBase::PAR_ID, $this->id)->orderBy(PartnerBase::PAR_HATKEZD)->get();
    }

    function getDatatable(): Datatable
    {
        return $this->partnerDataTable;
    }

    function getEditorData(): array
    {
        return [
            'partner' => $this->uid ? $this->getBuilder()->find($this->uid) : new Partner(),
        ];
    }
}
