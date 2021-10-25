<?php

namespace App\DataTables\Marketing;

use App\Models\Marketing\Campaign;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CampaignDataTable extends DataTable
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
            ->addColumn('checkbox', function($campaign){
                return'<div class="dt-checkbox">
                <input type="checkbox" class="" data-id="'.$campaign->campaign_id.'" name="id[]" value="'.$campaign->campaign_id.'">
                <span class="dt-checkbox-label"></span>
                </div>';
            })
            ->editColumn('status',function($campaign){
                if ($campaign->status == 1) {
                    return '<input class="switch swith-pink" type="checkbox" id="pink" checked /> ';
                }else {
                    return '<input class="switch swith-pink" type="checkbox" id="pink" />';
                }
            })

            ->addColumn('action', function($campaign){
                $action = '<div class="btn-group dropdown">
                  <button aria-expanded ="false" data-toggle="dropdown" class="btn dropdown" type="button">
                  <i class="las la-ellipsis-v"></i>
                  </button>
                  <div class="dropdown-menu">
                  <a href="'.route('admin.lengths.edit', [$campaign->id]).'" class="dropdown-item">
                  <i class="las la-pen-nib" aria-hidden="true"></i>
                  '.__('Edit').'
                  </a>
                  <a href="'.route('admin.lengths.destroy', [$campaign->id]).'" class="dropdown-item">
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
     * @param \App\Models\Marketing\Campaign $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Campaign $model)
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
                    ->setTableId('marketing\campaigndatatable-table')
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
        return 'Marketing\Campaign_' . date('YmdHis');
    }
}
