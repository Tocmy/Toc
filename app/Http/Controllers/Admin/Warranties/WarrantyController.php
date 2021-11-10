<?php

namespace App\Http\Controllers\Admin\Warranties;

use App\DataTables\Warranty\WarrantyDataTable;
use App\Http\Controllers\Controller;
use App\Models\Warranty\Warranty;
use App\Http\Requests\Warranty\WarrantyRequest;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{

    public function __construct()
    {

         $this->pageTitle = 'Warranty Management';
         $this->pageIcon  = '';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WarrantyDataTable $warrantyDataTable)
    {
       return $warrantyDataTable->render('admin.warranty.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::warranty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarrantyRequest $request)
    {
        $warranties = new Warranty();
        $warranties->name = $request->name;

        $warranties->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warranty\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function show(Warranty $warranty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warranty\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function edit(Warranty $warranty)
    {
        $warranties = Warranty::findOrfail($warranty->id);
        return view('admin::warranty.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warranty\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function update(WarrantyRequest $request, Warranty $warranty)
    {
        $warranties = Warranty::find($warranty->id);
        $warranties->name =$request->name;
        $warranties->save();
        return back()->with('success',__('You have successfully update a warranty.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warranty\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warranty $warranty)
    {
        $warranties = Warranty::find($warranty->id);
        $warranties->delete();
        return back()->with('success',__('You have successfully deleted_at a warranty.'));
    }

    //public function setDefault(Request $request)
    //{
        //set address owner's all address is_default = '0'
         //$warranties = Warranty::where('customer_id', $request->customer_id)->get();

        //foreach ($warranties as $w) {
            //if ($w->id != $request->id) {
                //$w->is_default = '0';
            //} //else {
                //$w->is_default = "1";
            //}
            //$w->save();
        //}

        //return Customer::with(array(
            //'addresses' => function ($query) {
                //$query->orderBy('is_default', 'asc');
            //})
            //)->where('id',$request->customer_id)->get();

    //}

    public function restore()
    {
        
    }


}
