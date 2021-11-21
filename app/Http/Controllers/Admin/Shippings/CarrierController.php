<?php

namespace App\Http\Controllers\Admin\Shippings;

use App\DataTables\Shipping\CarrierDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shipping\CarrierRequest;
use App\Models\Shipping\Carrier;
use Illuminate\Http\Request;

class CarrierController extends Controller
{


     public function __construct()
     {
         $this->pageTitle ='Carrier Management';
         $this->pageIcon  ='';
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CarrierDataTable $carrierDataTable)
    {
        return $carrierDataTable->render('admin.carriers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carriers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarrierRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping\Carrier  $carrier
     * @return \Illuminate\Http\Response
     */
    public function show(Carrier $carrier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping\Carrier  $carrier
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrier $carrier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping\Carrier  $carrier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrier $carrier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping\Carrier  $carrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrier $carrier)
    {
        $carrier =Carrier::findOrFail($carrier->id);
        $carrier->delete();

        return redirect()->back()->with('success', __('Carrier had been deleted succefully'));
    }

    public function deleteSelected(Request $request)
    {
        if (isset($request->ids)) {
            Carrier::whereIn('id', $request->ids)->delete();
            return redirect()->route('admin.carriers.index')->with('success',__('Selected row deleted'));
        }
        return redirect()->route('admin.carriers.index')->with('error', __('Selected one least'));
    }
}
