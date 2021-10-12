<?php

namespace App\DataTables\Option;

use App\Models\Option\Option;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\Services\DataTable;

class OptionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'option\optiondatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Option\Option $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Option $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('option\optiondatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Option\Option_' . date('YmdHis');
    }

    public function pdf()
    {
        $data   = $this->getDataForPrint();
        $pdf    = PDF::loadView($this->printPreview, compact('data'));
        return $pdf->download($this->filename(). 'pdf');
    }
}