<?php

namespace App\DataTables;

use App\Models\Projekt;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProjektDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId(Projekt::PRJ_UID)
            ->editColumn(Projekt::PRJ_HATKEZD, function (Projekt $model) {
                return $model->getHatInterval();
            })
            ->addColumn('action', function (Projekt $model) {
                return view(
                    'datatable.buttons.detail',
                    ['route' => 'entity.index', 'type' => 'projekt', 'id' => $model->prj_id]
                );
            });
    }

    public function query(Projekt $model): QueryBuilder
    {
        $actDate = session()->get('actDate')->format('Y-m-d');
        return $model->newQuery()
            ->where(Projekt::PRJ_HATKEZD, '<=', $actDate)
            ->where(Projekt::PRJ_HATVEGE, '>', $actDate);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('projekt')
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
            Column::make(Projekt::PRJ_UID)->title(__('projekt.uid'))->className('align-middle'),
            Column::make(Projekt::PRJ_ID)->title(__('projekt.id'))->className('align-middle'),
            Column::make(Projekt::PRJ_AZONOSITO)->title(__('projekt.projekt_azonosito_szama'))->className('align-middle'),
            Column::make(Projekt::PRJ_NEV)->title(__('projekt.projekt_neve'))->className('align-middle'),
            Column::make(Projekt::PRJ_ROVID_NEV)->title(__('projekt.projekt_rovid_neve'))->className('align-middle'),
            Column::make(Projekt::PRJ_HATKEZD)->title(__('projekt.projekt_hatalyossaga'))->className('align-middle'),
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
