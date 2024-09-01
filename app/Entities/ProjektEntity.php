<?php
namespace App\Entities;

use App\Abstracts\Entity;
use App\DataTables\ProjektDataTable;
use App\Models\Base\Projekt as ProjektBase;
use App\Models\Projekt;
use App\Models\Szotar;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

class ProjektEntity extends Entity
{
    public function __construct(private readonly ProjektDataTable $projektDataTable, ?int $uid, ?int $id)
    {
        $this->uid = $uid;
        $this->id = $id;
    }

    function getType(): string
    {
        return 'projekt';
    }

    function getBuilder(): Builder
    {
        return Projekt::query();
    }

    function getBreadcrumbName(): string
    {
        return __('entity.projektek');
    }

    function getEntityList(): Collection
    {
        return $this->getBuilder()->where(ProjektBase::PRJ_ID, $this->id)->orderBy(ProjektBase::PRJ_HATKEZD)->get();
    }

    function getDatatable(): Datatable
    {
        return $this->projektDataTable;
    }

    function getEditorData(): array
    {
        return [
            'projekt' => $this->uid ? $this->getBuilder()->find($this->uid) : new Projekt(),
        ] + ['szotar' => Szotar::getSzotar(['PROJEKT_STATUSZA', 'FELADATVEGZES_MODJA', 'PROJEKT_KATEGORIA', 'PROJEKT_KONZORCIUMBAN'])];
    }
}
