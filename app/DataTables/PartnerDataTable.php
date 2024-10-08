<?php

namespace App\DataTables;

use App\Models\Base\Partner as PartnerBase;
use App\Models\Partner;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PartnerDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId(PartnerBase::PAR_UID)
            ->editColumn(PartnerBase::PAR_HATKEZD, function (Partner $model) {
                return $model->getHatInterval();
            })
            ->addColumn('action', function (Partner $model) {
                return view(
                    'datatable.buttons.detail',
                    ['route' => 'entity.index', 'type' => 'partner', 'id' => $model->par_id]
                );
            });
    }

    public function query(Partner $model): QueryBuilder
    {
        $startDate = session()->get('startDate')->format('Y-m-d');
        $endDate = session()->get('endDate')->format('Y-m-d');
        $query = $model->newQuery()
            ->orWhere(function ($query) use ($startDate, $endDate) {
                $query
                    ->where(PartnerBase::PAR_HATKEZD, '<=', $startDate)
                    ->where(PartnerBase::PAR_HATVEGE, '>=', $startDate);
            })
            ->orWhere(function ($query) use ($startDate, $endDate) {
                $query
                    ->whereBetween(PartnerBase::PAR_HATKEZD, [$startDate, $endDate])
                    ->whereBetween(PartnerBase::PAR_HATVEGE, [$startDate, $endDate]);
            })
            ->orWhere(function ($query) use ($startDate, $endDate) {
                $query
                    ->where(PartnerBase::PAR_HATKEZD, '<=', $endDate)
                    ->where(PartnerBase::PAR_HATVEGE, '>=', $startDate);
            });
        return $query;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('partner')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1, 'asc')
            ->parameters([
                'buttons' => ['export'],
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make(PartnerBase::PAR_UID)->title(__('partner.uid'))->className('align-middle'),
            Column::make(PartnerBase::PAR_ID)->title(__('partner.id'))->className('align-middle'),
            Column::make(PartnerBase::PAR_AZONOSITO)->title(__('partner.azonosito'))->className('align-middle'),
            Column::make(PartnerBase::PAR_NEV)->title(__('partner.nev'))->className('align-middle'),
            Column::make(PartnerBase::PAR_ADOSZAM)->title(__('partner.adoszam'))->className('align-middle'),
            Column::make(PartnerBase::PAR_NYILV_SZAM)->title(__('partner.nyilvantartasi_szam'))->className('align-middle'),
            Column::make(PartnerBase::PAR_CIM)->title(__('partner.cim'))->className('align-middle'),
            Column::make(PartnerBase::PAR_HATKEZD)->title(__('partner.hatalyossag'))->className('align-middle'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->title('')
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Partners_' . date('YmdHis');
    }
}
