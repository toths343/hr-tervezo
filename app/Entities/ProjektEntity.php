<?php
namespace App\Entities;

use App\Abstracts\Entity;
use App\DataTables\ProjektDataTable;
use App\Models\Base\Projekt as ProjektBase;
use App\Models\Projekt as ProjektModel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

class ProjektEntity extends Entity
{
    public function __construct(private readonly ProjektDataTable $projektDataTable, private readonly ?int $id)
    {
    }

    function getType(): string
    {
        return 'projekt';
    }

    function getBuilder(): Builder
    {
        return ProjektModel::query();
    }

    function getBreadcrumbName(): string
    {
        return __('entity.projekts');
    }

    function getEntityList(): Collection
    {
        return $this->getBuilder()->where(ProjektBase::PRJ_ID, $this->id)->orderBy(ProjektBase::PRJ_HATKEZD)->get();
    }

    function getDatatable(): Datatable
    {
        return $this->projektDataTable;
    }

}
