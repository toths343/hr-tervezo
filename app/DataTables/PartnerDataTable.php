<?php

namespace App\DataTables;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Layout;
use Yajra\DataTables\Services\DataTable;

class PartnerDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))->setRowId('par_uid');
    }

    public function query(Partner $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('partner')
            ->columns($this->getColumns())
            ->parameters([
                'buttons' => ['export'],
            ])
            ->minifiedAjax()
            ->orderBy(1);
    }

    public function getColumns(): array
    {
        return [
            Column::make('par_uid')->title('Uid'),
            Column::make('par_id'),
            Column::make('par_azonosito')->title('Azonosító'),
            Column::make('par_nev')->title('Név'),
            Column::make('par_adoszam'),
            Column::make('par_nyilv_szam'),
            Column::make('par_cim'),
            Column::make('par_hatkezd'),
            Column::make('par_hatvege'),
        ];
    }

    protected function filename(): string
    {
        return 'Partners_' . date('YmdHis');
    }
}
