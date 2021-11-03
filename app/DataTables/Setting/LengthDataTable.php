<?php

namespace App\DataTables\Setting;

use App\Models\Setting\Length;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class LengthDataTable extends DataTable
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
            ->addColumn('checkbox', function($length){
                return'<div class="dt-checkbox">
                <input type="checkbox" class="" data-id="'.$length->length_id.'" name="id[]" value="'.$length->length_id.'">
                <span class="dt-checkbox-label"></span>
                </div>';
            })

            ->editColumn('name',function($length){
                if ($length->is_default == 1) {
                    return $length->title. '&nbsp; <span class="badge badge-success">'.__('currency.default') .'</span>';
                }else {
                    return $length->title;
                }
            })

            ->addColumn('action', function($length){
                $action = '<div class="btn-group dropdown">
                  <button aria-expanded ="false" data-toggle="dropdown" class="btn dropdown" type="button">
                  <i class="las la-ellipsis-v"></i>
                  </button>
                  <div class="dropdown-menu">
                  <a href="'.route('admin.lengths.edit', [$length->id]).'" class="dropdown-item">
                  <i class="las la-pen-nib" aria-hidden="true"></i>
                  '.__('Edit').'
                  </a>
                  <a href="'.route('admin.lengths.destroy', [$length->id]).'" class="dropdown-item">
                  <i class="las la-trash aria-hidden="true"></i>
                  '.__('Delete').'
                  </a>';



                $action .='</div></div>';
                return $action;

            })
            ->removeColumn('name')
            ->rawColumns(['checkbox','name', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Setting\Length $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Length $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.

     *
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('setting\lengthdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([
                        'language' =>[
                            "paginate" =>[
                                'first' => '<i class="mdi mdi-chevron-double-right"></i>',
                                'last'  => '<i class="mdi mdi-chevron-double-left"></i>',
                            ]


                        ]
                    ])
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
     *    $column = [
    * 'name' => 'id',
    *'data' => 'id',
    *'title' => 'Id',
    *'searchable' => true,
    *'orderable' => true,
    *'render' => 'function(){}',
    *'footer' => 'Id',
    *'exportable' => true,
    *'printable' => true,
    *];   to
     * $column = Column::make('id')
     *   ->title('Id')
     *   ->searchable(true)
     *   ->orderable(true)
     *   ->render('function(){}')
     *   ->footer('Id')
     *   ->exportable(true)
     *   ->printable(true);
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
            Column::make('id')
                    ->title('id'),
            Column::make('title')
                    ->title(__('title')) ,
            Column::make('unit')
                    ->title(__('unit')),
            Column::make('value')
                    ->title(__('value')),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'lengths_' . date('YmdHis');
    }
}
