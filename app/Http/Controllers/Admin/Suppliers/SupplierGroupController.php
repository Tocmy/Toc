<?php

namespace App\Http\Controllers\Admin\Suppliers;

use App\DataTables\Supplier\SupplierGroupDataTable;
use App\Http\Controllers\Controller;
use App\Models\Supplier\SupplierGroup;
use Illuminate\Http\Request;

class SupplierGroupController extends Controller
{


    public function __construct()
     {
         $this->pageTitle ='Supplier Group Management';
         $this->pageIcon  ='';
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SupplierGroupDataTable $supplierGroupDataTable)
    {
        return $supplierGroupDataTable->render('admin.suppliers.group.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier\SupplierGroup  $supplierGroup
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierGroup $supplierGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier\SupplierGroup  $supplierGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierGroup $supplierGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier\SupplierGroup  $supplierGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierGroup $supplierGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier\SupplierGroup  $supplierGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierGroup $supplierGroup)
    {
        $supplierGroup =SupplierGroup::findOrFail($supplierGroup->id);
        $supplierGroup->delete();
        return redirect()->back()->with('success', __('Carrier had been deleted succefully'));
    }

    public function deleteSelected(Request $request)
    {
        if (isset($request->ids)) {
            SupplierGroup::whereIn('id', $request->ids)->delete();
            return redirect()->route('admin.suppliers.group.index')->with('success',__('Selected row deleted'));
        }
        return redirect()->route('admin.suppliers.group.index')->with('error', __('Selected one least'));
    }
}
