<?php

namespace App\Http\Controllers\Admin\Settings;

use App\DataTables\Setting\WeightDataTable;
use App\Http\Controllers\Controller;
use App\Models\Setting\Weight;
use Illuminate\Http\Request;
use App\Http\Requests\Setting\WeigthRequest;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WeightDataTable $weightDataTable)
    {
        return $weightDataTable->render('admin.weigth.index');
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
    public function store(WeigthRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function show(Weight $weight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function edit(Weight $weight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weight $weight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weight $weight)
    {
        //
    }
}
