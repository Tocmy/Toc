<?php

namespace App\DataTables\Warranty;

use App\Models\Warranty\Warranty;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class WarrantyDataTable extends DataTable
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
            ->addColumn('checkbox', function($voucher){
                return'<div class="dt-checkbox">
                <input type="checkbox" class="" data-id="'.$voucher->voucher_id.'" name="id[]" value="'.$voucher->voucher_id.'">
                <span class="dt-checkbox-label"></span>
                </div>';
            })
            ->editColumn('is_default',function($voucher){
                if ($voucher->is_default == 1) {
                    return'<span class="badge badge-success">'.__('default'). '</span> ';
                }else {
                    return;
                }
            })

            ->addColumn('action', function($voucher){
                $action = '<div class="btn-group dropdown">
                  <button aria-expanded ="false" data-toggle="dropdown" class="btn dropdown" type="button">
                  <i class="las la-ellipsis-v"></i>
                  </button>
                  <div class="dropdown-menu">
                  <a href="'.route('admin.lengths.edit', [$voucher->id]).'" class="dropdown-item">
                  <i class="las la-pen-nib" aria-hidden="true"></i>
                  '.__('Edit').'
                  </a>
                  <a href="'.route('admin.lengths.destroy', [$voucher->id]).'" class="dropdown-item">
                  <i class="las la-trash aria-hidden="true"></i>
                  '.__('Delete').'
                  </a>';



                $action .='</div></div>';
                return $action;

            })
            ->rawColumns(['checkbox','is_default', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Warranty\Warranty $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Warranty $model)
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
                    ->setTableId('warranty\warrantydatatable-table')
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
        return 'Warranty\Warranty_' . date('YmdHis');
    }
}
