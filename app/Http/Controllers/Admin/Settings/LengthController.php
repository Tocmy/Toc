<?php

namespace App\Http\Controllers\Admin\Settings;

use App\DataTables\Setting\LengthDataTable;
use App\Http\Controllers\Controller;
use App\Models\Setting\Length;
use Illuminate\Http\Request;

class LengthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LengthDataTable $lengthDataTable)
    {
        return $lengthDataTable->render('admin.length.index');
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
     * @param  \App\Models\Setting\Length  $length
     * @return \Illuminate\Http\Response
     */
    public function show(Length $length)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting\Length  $length
     * @return \Illuminate\Http\Response
     */
    public function edit(Length $length)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting\Length  $length
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Length $length)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting\Length  $length
     * @return \Illuminate\Http\Response
     */
    public function destroy(Length $length)
    {
        //
    }
}
