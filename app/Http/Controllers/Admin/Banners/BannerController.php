<?php

namespace App\Http\Controllers\Admin\Banners;

use App\DataTables\Banner\BannerDatatable;
use App\Http\Controllers\Controller;
use App\Models\Banner\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\Banner\BannerRequest;

class BannerController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BannerDatatable $bannerDatatable)
    {
        return $bannerDatatable->render('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $banner = Banner::findOrFail($request->id);
        $banner->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $banner = Banner::findOrFail($id);
         $banner->delete();
         return redirect()->route('admin.banner.index')->with('success', __('banner successfully deleted'));

    }


    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
             $entries = Banner::whereIn('id', $request->input('ids'))->get();
             foreach ($entries as $entry){
                 $entry->delete();
             }
        }
    }

    public function restore($id)
    {
        $banner = Banner::onlyTrashed()->firstOrFail($id);
        $banner->restore();
        return redirect()->route('admin.banner.index')->with('success', __('banner successed restore'));
    }

    public function forceDelete($id)
    {
           $banner = Banner::onlyTrashed()->firstOrFail($id);
           $banner->forceDelete();

           return redirect()->route('admin.category.index')->with('success', __('banner.successfully deleted'));
    }
}
