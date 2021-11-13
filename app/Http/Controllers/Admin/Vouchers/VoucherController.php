<?php

namespace App\Http\Controllers\Admin\Vouchers;

use App\DataTables\Voucher\VoucherDataTable;
use App\Http\Controllers\Controller;
use App\Models\Voucher\Voucher;
use Illuminate\Http\Request;
use App\Http\Requests\Voucher\VoucherRequest;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VoucherDataTable $voucherDataTable)
    {
        return $voucherDataTable->render('admin.voucher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoucherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voucher\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }
    /**
     * Undocumented function
     *l8/multilang route
     * @param Voucher $voucher
     * @return void
     */
    public function changeStatus(Voucher $voucher)
    {
          if ($voucher->status =='Enable') {
                $voucher->update([
                    'status' => 'Disable'
                ]);

          } else {
              $voucher->update([
                  'status' => 'Enable'
              ]);
          }

          return redirect()->back()->with('Success', __('The status of :name was :atrribute successfully!',
                  ['attribute' => __($voucher->status == 'Enable' ? 'enabled' : 'disable'), 'name'=>__('voucher')]
         ));
    }

}
