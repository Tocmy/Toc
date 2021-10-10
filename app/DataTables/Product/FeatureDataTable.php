<?php

namespace App\DataTables\Product;

use App\Models\Product\Feature;
use App\Models\Product\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FeatureDataTable extends DataTable
{
    /**
     * Build DataTable class.
     * technoshop
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
     * @param \App\Models\Product\Feature $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Feature $model)
    {
        return $model->newQuery()
                     ->with('product')
                     ->select('feature.*') ;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('product\featuredatatable-table')
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
     *$column = [
    *'name' => 'id',
    *'data' => 'id',
    *'title' => 'Id',
    *'searchable' => true,
    *'orderable' => true,
    *'render' => 'function(){}',
    *'footer' => 'Id',
    *'exportable' => true,
    *'printable' => true,
    *];  to html
    *$column = Column::make('id')
    *    ->title('Id')
    *    ->searchable(true)
    *    ->orderable(true)
    *    ->render('function(){}')
    *    ->footer('Id')
    *    ->exportable(true)
    *    ->printable(true);

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
        return 'Product\Feature_' . date('YmdHis');
    }
}
