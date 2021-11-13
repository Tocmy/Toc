<?php

namespace App\Http\Controllers\Admin\Banners;

use App\DataTables\Banner\BannerGroupDatatable;
use App\Http\Controllers\Controller;
use App\Models\Banner\BannerGroup;
use Illuminate\Http\Request;
use App\Http\Requests\Banner\BannerGroupRequest;

class BannerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BannerGroupDatatable $bannerGroupDatatable)
    {
        return $bannerGroupDatatable->render('admin.banner.group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerGroupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner\BannerGroup  $bannerGroup
     * @return \Illuminate\Http\Response
     */
    public function show(BannerGroup $bannerGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner\BannerGroup  $bannerGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(BannerGroup $bannerGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner\BannerGroup  $bannerGroup
     * @return \Illuminate\Http\Response
     */
    public function update(BannerGroupRequest $request, BannerGroup $bannerGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner\BannerGroup  $bannerGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(BannerGroup $bannerGroup)
    {
        //
    }
}
