<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use App\Models\Attribute\AttributeGroup;
use Illuminate\Http\Request;

class AttributeGroupController extends Controller
{

    public function __construct()
     {
         $this->pageTitle ='Attribute Group Management';
         $this->pageIcon  ='';
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Attribute\AttributeGroup  $attributeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeGroup $attributeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute\AttributeGroup  $attributeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeGroup $attributeGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute\AttributeGroup  $attributeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeGroup $attributeGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute\AttributeGroup  $attributeGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeGroup $attributeGroup)
    {
        //
    }
}
