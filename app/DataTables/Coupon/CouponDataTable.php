<?php

namespace App\DataTables\Coupon;

use App\Models\Marketing\Coupon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CouponDataTable extends DataTable
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
            ->addColumn('coupon_id', function ($coupon){
                return '<input type="checkbox" class="", name="post[]" data-id="'.$coupon->coupon_id.' " value=" '.$coupon->coupon_id.'">';
            })
            ->addColumn('status', function($coupon){
                if ($coupon->status ==1) {
                    $status = '<div class="switch d-inline m-r-10">
                    <input class="status" type="checkbox" data-coupon_id="'. $coupon->id .'"  id="switch-'. $coupon->id .'" checked="">
                    <label for="switch-'. $coupon->id .'" class="cr"></label>
                </div>';;
                }else {
                    $status = '<div class="switch d-inline m-r-10">
                            <input class="status" type="checkbox" data-coupon_id="'. $coupon->id .'"  id="switch-'. $coupon->id .'">
                            <label for="switch-'. $coupon->id .'" class="cr"></label>
                        </div>';;
                }
                return $status;
            })
            ->addColumn('action', function ($coupon){
                return '<a href="'. action('Admin\Coupons\CouponController@edit', [$coupon->coupon_id]) .'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Marketing\Coupon $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Coupon $model)
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
                    ->setTableId('coupon\coupondatatable-table')
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
            [
                'name'     => 'checkbox',
                'data'     => 'checkbox',
                'title'    =>  '<input type="checkbox" class="check_all" onclick="check_all">',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,

            ],
            [ 'name'=>'action',
                'data'=>'action',
                'title'=>__('action'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
            ],

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
        return 'Coupon\Coupon_' . date('YmdHis');
    }
}
