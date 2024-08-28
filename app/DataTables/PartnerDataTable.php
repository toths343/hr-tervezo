<?php

namespace App\DataTables;

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
            ->setRowId('par_uid')
            ->editColumn('par_hatkezd', function (Partner $model) {
                return $model->par_hatkezd->format('Y.m.d') . ' - ' . $model->par_hatvege->format('Y.m.d');
            })
            ->addColumn('action', function (Partner $model) {
                return view('datatable.buttons.detail', ['route' => 'partner.detail', 'id' => $model->par_id]);
            });
    }

    public function query(Partner $model): QueryBuilder
    {
        $actDate = session()->get('actDate')->format('Y-m-d');
        return $model->newQuery()->where(Partner::PAR_HATKEZD, '<=', $actDate)->where(Partner::PAR_HATVEGE, '>', $actDate);
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
            Column::make('par_uid')->title('Uid'),
            Column::make('par_id')->title('Id'),
            Column::make('par_azonosito')->title('Azonosító'),
            Column::make('par_nev')->title('Név'),
            Column::make('par_adoszam')->title('Adószám'),
            Column::make('par_nyilv_szam')->title('Nyilvántartási szám'),
            Column::make('par_cim')->title('Cím'),
            Column::make('par_hatkezd')->title('Hatályosság'),
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
