<?php

namespace App\DataTables\Setting;

use App\Models\Setting\Status;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StatusDataTable extends DataTable
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
            ->addColumn('checkbox', function($status){
                return'<div class="dt-checkbox">
                <input type="checkbox" class="" data-id="'.$status->status_id.'" name="id[]" value="'.$status->status_id.'">
                <span class="dt-checkbox-label"></span>
                </div>';
            })


            ->addColumn('action', function($status){
                $action = '<div class="btn-group dropdown">
                  <button aria-expanded ="false" data-toggle="dropdown" class="btn dropdown" type="button">
                  <i class="las la-ellipsis-v"></i>
                  </button>
                  <div class="dropdown-menu">
                  <a href="'.route('admin.lengths.edit', [$status->id]).'" class="dropdown-item">
                  <i class="las la-pen-nib" aria-hidden="true"></i>
                  '.__('Edit').'
                  </a>
                  <a href="'.route('admin.lengths.destroy', [$status->id]).'" class="dropdown-item">
                  <i class="las la-trash aria-hidden="true"></i>
                  '.__('Delete').'
                  </a>';



                $action .='</div></div>';
                return $action;

            })
            ->rawColumns(['check','is_default', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Setting\Status $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Status $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     * datatable-hr erp
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('setting\statusdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->orderBy(1)
                    ->destroy(true)
                    ->responsive(true)
                    ->serverSide(true)
                    ->processing(true)
                    ->parameters([

                        'lengthMenu' =>[
                            [10,25,50,100,-1],
                            [10, 25,50,100,__('All')]
                        ],

                        'language' =>[
                            'processing'    =>__('Processing'),
                            'lengthMenu'    =>__('Menu'),
                            'zeroRecords'   =>__('ZeroRecords'),
                            'emptyTable'    =>__('EmptyTable'),
                            'info'          =>__('_START_-_END_ of _TOTAL_ entries'),
                            'infoEmpty'      =>__('Info Empty'),
                            'infoFiltered'   =>__('Info Filtered'),
                            'infoPostFix'    =>"",
                            'search'         =>'',
                            'url'            =>"",
                            'thousands'      =>",",
                            'loadingRecords' =>__('Loading Record'),

                            'paginate' =>[
                                'first'    =>'<i class="las la-angle-double-left"></i>',
                                'last'     =>'<i class="las la-angle-double-right"></i>',
                                'next'     =>'<i class="las la-angle-right"></i>',
                                'previous' => '<i class="las la-angle-left"></i>',
                            ],
                            'aria' =>[
                                'sortAscending' =>__('Sort Ascending'),
                                'sortDescending' => __('Sort Descending'),

                            ],
                        ],
                        'initComplete' => 'function(){

                        }',
                    ])
                    ->buttons(

                        Button::make(['extend'=>'excel', 'className' =>'btn btn-outline', 'text'=>'<i class="lar la-file-excel"></i>']),
                        Button::make(['extend'=>'csv',   'className' =>'btn btn-outline', 'text'=>'<i class="las la-file-csv"></i>']),
                        Button::make(['extend'=>'pdf', 'className' =>'btn btn-outline', 'text'=>'<i class="las la-file-pdf"></i>']),
                        Button::make(['extend'=>'print', 'className' =>'btn btn-outline', 'text' =>'<i class="las la-print"></i>']),
                        Button::make(['extend'=>'reload', 'className' => 'btn btn-outline', 'text'=>'<i class="las la-sync-alt"></i>']),
                        Button::make(['text'=>'<i class="las la-trash"></i>', 'className' =>'btn btn-outline' ]),
                        Button::make(['text'=>'<i class="las la-plus"></i>', 'className' =>'btn btn-outline',
                                       'action' => 'function(){
                                           window.location.href = " '. URL::current(). '/create";
                                       }',
                                     ]),


                    );
    }

    /**
     * Get columns.
     * 'defaultContent' => '<div class="dt-checkbox"><input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '"><span class="dt-checkbox-label"></span></div>',
    *'title'          => $this->form->checkbox('', '', false, ['id' => 'dataTablesCheckbox']),
    *'data'           => 'checkbox',
    *'name'           => 'checkbox',
    *'orderable'      => false,
    *'searchable'     => false,
    *'exportable'     => false,
    *'printable'      => true,
    *'width'          => '10px',
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'  => 'checkbox',
                'data'  => 'checkbox',
                'title' => '<input type="checkbox" class="check_all" onclick="check_all()">',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],


            Column::make('name')
                    ->title(__('name')),
            Column::make('comment')
                   ->title(__('comment')),
            Column::computed('action')
                   ->exportable(false)
                   ->printable(false)
                   ->width(60)
                   ->addClass('text-center'),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Setting\Status_' . date('YmdHis');
    }
}
