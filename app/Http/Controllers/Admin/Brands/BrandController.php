<?php

namespace App\Http\Controllers\Admin\Brands;

use App\Http\Controllers\Controller;
use App\Models\Brand\Brand;
use App\Http\Requests\Brand\BrandRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
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
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        if ($request->hasfile('image')) {
            $Image           = $request->file('image');
            $ImageName       = sha1($Image->getClientOriginalName() .time()). '.' .$Image->getClientOriginalExtension();
            $destinationPath = public_path() .'/images/brand//';
            $request->file('image')->move($destinationPath, $ImageName);
            $image =$request->image;
            $image = str_replace('data:image/jpeg;base64', '', $image);
            $image = str_replace('', '+', $image);
            $imageName = time(). '_' .uniqid() . '.jpeg';
            File::put(public_path(). '/images/brand//'. $imageName, base64_decode($image));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
