<?php

namespace App\DataTables\Address;

use App\Models\Address\State;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StateDataTable extends DataTable
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
            ->addColumn('checkbox', function($state){
                return'<div class="dt-checkbox">
                <input type="checkbox" class="" data-id="'.$state->state_id.'" name="id[]" value="'.$state->state_id.'">
                <span class="dt-checkbox-label"></span>
                </div>';
            })
            ->editColumn('status',function($state){
                if ($state->status == 1) {
                    return '<input class="switch swith-pink" type="checkbox" id="pink" checked /> ';
                }else {
                    return '<input class="switch swith-pink" type="checkbox" id="pink" />';
                }
            })

            ->addColumn('action', function($state){
                $action = '<div class="btn-group dropdown">
                  <button aria-expanded ="false" data-toggle="dropdown" class="btn dropdown" type="button">
                  <i class="las la-ellipsis-v"></i>
                  </button>
                  <div class="dropdown-menu">
                  <a href="'.route('admin.suppliers.edit', [$state->id]).'" class="dropdown-item">
                  <i class="las la-pen-nib" aria-hidden="true"></i>
                  '.__('Edit').'
                  </a>
                  <a href="'.route('admin.suppliers.destroy', [$state->id]).'" class="dropdown-item">
                  <i class="las la-trash aria-hidden="true"></i>
                  '.__('Delete').'
                  </a>';



                $action .='</div></div>';
                return $action;

            })
            ->rawColumns(['check','status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Address\State $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(State $model)
    {
        return State::query()->with('country')->select('state.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('address\statedatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->destroy(true)
                    ->responsive(true)
                    ->serverSide(true)
                    ->processing(true)
                    ->parameters([

                        'lengthMenu' =>[
                            [10,25,50,100,-1],
                            [10, 25,50,100,__('Show all record')]
                        ],

                        'language' =>[
                            'processing'    =>__('Processing'),
                            'lengthMenu'    =>__('Menu'),
                            'zeroRecords'   =>__('ZeroRecords'),
                            'emptyTable'    =>__('EmptyTable'),
                            'info'          =>__('Info'),
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
        return 'Address\State_' . date('YmdHis');
    }
}
