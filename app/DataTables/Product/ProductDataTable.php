<?php

namespace App\DataTables\Product;

use App\Models\Product\Product;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->addColumn('checkbox', function ($feature){
                return '<input type="checkbox" class="", name="post[]" data-id="'.$feature->feature_id.' " value=" '.$feature->feature_id.'">';
            })
            ->addColumn('image', function($feature){
                $url = asset('storage/' .$feature->image);
                return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
            })
            ->addColumn('action', function ($feature){
                $action = '<div class="btn-group dropdown">
                  <button aria-expanded ="false" data-toggle="dropdown" class="btn dropdown" type="button">
                  <i class="las la-ellipsis-v"></i>
                  </button>
                  <div class="dropdown-menu">
                  <a href="'.route('admin.settinggroups.edit', [$feature->id]).'" class="dropdown-item">
                  <i class="las la-pen-nib" aria-hidden="true"></i>
                  '.__('Edit').'
                  </a>
                  <a href="'.route('admin.settinggroups.destroy', [$feature->id]).'" class="dropdown-item">
                  <i class="las la-trash aria-hidden="true"></i>
                  '.__('Delete').'
                  </a>';



                $action .='</div></div>';
                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
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
                    ->setTableId('product\productdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->destroy(true)
                    ->responsive(true)
                    ->serverSide(true)
                    ->processing(true)
                    ->parameters([
                        'lengthMenu' => [
                            [10, 25, 50, 100, -1],
                            [10, 25, 50, 100, __('All')],
                        ],

                        'language' => [
                            'processing' => __('Processing'),
                            'lengthMenu' => __('Menu'),
                            'zeroRecords' => __('ZeroRecords'),
                            'emptyTable' => __('EmptyTable'),
                            'info' => __('_START_-_END_ of _TOTAL_ entries'),
                            'infoEmpty' => __('Info Empty'),
                            'infoFiltered' => __('Info Filtered'),
                            'infoPostFix' => '',
                            'search' => '_INPUT_',
                            'searchPlaceholder' => __('search'),
                            'url' => '',
                            'thousands' => ',',
                            'loadingRecords' => __('Loading Record'),

                            'paginate' => [
                                'first' => '<i class="las la-angle-double-left"></i>',
                                'last' => '<i class="las la-angle-double-right"></i>',
                                'next' => '<i class="las la-angle-right"></i>',
                                'previous' => '<i class="las la-angle-left"></i>',
                            ],
                            'aria' => [
                                'sortAscending' => __('Sort Ascending'),
                                'sortDescending' => __('Sort Descending'),
                            ],
                        ],
                        'initComplete' => 'function(){

                                }',
                    ])
                    ->buttons(
                        Button::make([
                            'extend' => 'excel',
                            'className' => 'btn btn-outline',
                            'text' => '<i class="lar la-file-excel"></i>',
                        ]),
                        Button::make([
                            'extend' => 'csv',
                            'className' => 'btn btn-outline',
                            'text' => '<i class="las la-file-csv"></i>',
                        ]),
                        Button::make([
                            'extend' => 'pdf',
                            'className' => 'btn btn-outline',
                            'text' => '<i class="las la-file-pdf"></i>',
                        ]),
                        Button::make([
                            'extend' => 'print',
                            'className' => 'btn btn-outline',
                            'text' => '<i class="las la-print"></i>',
                        ]),
                        Button::make([
                            'extend' => 'reload',
                            'className' => 'btn btn-outline',
                            'text' => '<i class="las la-sync-alt"></i>',
                        ]),
                        Button::make([
                            'text' => '<i class="las la-trash"></i>',
                            'className' => 'btn btn-outline',
                        ]),
                        Button::make([
                            'text' => '<i class="las la-plus"></i>',
                            'className' => 'btn btn-outline',
                            'action' =>
                                'function(){
                                                   window.location.href = " ' .
                                URL::current() .
                                '/create";
                                               }',
                        ])
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

            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
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
        return 'Product\Product_' . date('YmdHis');
    }
}
