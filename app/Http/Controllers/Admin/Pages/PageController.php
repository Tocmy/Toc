<?php

namespace App\Http\Controllers\Admin\Pages;

use App\DataTables\Page\PageDataTable;
use App\Http\Controllers\Controller;
use App\Models\Page\Page;
use App\Models\Page\PageGroup;
use App\Models\Setting\Seo;
use App\Http\Requests\Page\PageRequest;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PageDataTable $pageDataTable)
    {
        return $pageDataTable->render('admin.page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(PageRequest $request)
    {
        $pages         = new Page();
        $pages->title  = $request->title;
        if ($request->slug == '') {
            $pages->slug = str_slug($request->title);
        }else {
            $pages->slug = $request->slug;
        }
        $pages->description = $request->description;
        $pages->save();

        $pagegroups = $pages->pagegroup()::pluck('name')->prepend(__('Please select', ''));
        $seos = new Seo();
        $seos->title = $request ->title;
        $seos->description = str_limit($request->description, 155);
        $seos->keyword  =$request->keyword;
        $seos->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {

        return view('admin.page.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        return redirect()->route('admin.page,index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        return redirect()->route('admin.page.index' );
    }

    public function switch (Request $request) {
        $pages=Page::findOrFail($request->id);
        $pages->status=$request-> status=="Enable" ? 1 :0;
        $pages->save();
    }

    public function trashed()
    {
        $pages = Page::onlyTrashed()->orderBy('deleted_at', 'desc')
                  ->get();
                return view('admin.page.trashed', compact('pages'));
    }

    public function restore($id)
    {
         Page::onlyTrashed()->find($id)->restore();
         return redirect()->back()->with('success',__('page success restore'));
    }

    public function forceDelete($id)
    {
        Page::onlyTrashed()->find($id)
             ->forceDelete();
        return redirect()->route('admin.page.index')->with('success', __('Page Permenant deleted'));
    }


}
