<?php

namespace App\DataTables\Banner;

use App\Models\Banner\Banner;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BannerDatatable extends DataTable
{
    /**
     * Build DataTable class.
     * erp/law
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', function($banner){
                return'<div class="dt-checkbox">
                <input type="checkbox" class="" data-id="'.$banner->banner_id.'" name="id[]" value="'.$banner->banner_id.'">
                <span class="dt-checkbox-label"></span>
                </div>';
            })

            ->editColumn('status',function($banner){
                if ($banner->status == 1) {
                    return '<input class="switch swith-pink" type="checkbox" name="" id="pink" checked="" value="" /> ';
                }else {
                    return '<input class="switch swith-pink" type="checkbox" name="" id="pink" value="" />';
                }
            })
            ->editColumn('image', function($banner){
                return ($banner->image != null)?
                '<img height="50px" src="'.asset('storage/uploads/'. $banner->image). ' ">' : 'N/a';
            })

            ->addColumn('action', function($banner){
                $action = '<div class="btn-group dropdown">
                  <button aria-expanded ="false" data-toggle="dropdown" class="btn dropdown" type="button">
                  <i class="las la-ellipsis-v"></i>
                  </button>
                  <div class="dropdown-menu">
                  <a href="'.route('admin.currencies.edit', [$banner->id]).'" class="dropdown-item">
                  <i class="las la-pen-nib" aria-hidden="true"></i>
                  '.__('Edit').'
                  </a>
                  <a href="'.route('admin.currencies.destroy', [$banner->id]).'" class="dropdown-item">
                  <i class="las la-trash aria-hidden="true"></i>
                  '.__('Delete').'
                  </a>';



                $action .='</div></div>';
                return $action;

            })
            ->removeColumn('name')
            ->rawColumns(['checkbox','image','status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Banner\Banner $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Banner $model)
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
                    ->setTableId('banner\bannerdatatable-table')
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
        return 'Banner\Banner_' . date('YmdHis');
    }
}
