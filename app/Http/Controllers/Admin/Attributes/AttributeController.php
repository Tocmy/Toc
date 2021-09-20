<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use App\Models\Attribute\Attribute;
use App\Models\Attribute\AttributeGroup;
use App\Http\Requests\Attribute\AttributeRequest;
use App\Datatables\Attribute\AttributeDataTable;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AttributeDataTable $attributeDataTable)
    {
        return $attributeDataTable->render('admin.attribute.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributegroups = AttributeGroup::pluck('name', 'id');
        return view('admin.attribute.create', compact('attributegroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $attributes           = new Attribute();
        $attributes->name     = $request->name;
        $attributes->position = $request->position;
        $attributes->attribute_group_id = $request->attribute_group_id;
        $attributes->save();

        return redirect()->route('admin.attribute.index')
                         ->with('success',__('Attribute Success Updated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        $attributegroups = AttributeGroup::pluck('name', 'id');
        return view('admin.attribute.edit', compact('attributegroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        //
    }
}
