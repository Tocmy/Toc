<?php

namespace App\Http\Controllers\Admin\Pages;

use App\DataTables\Page\PageGroupDataTable;
use App\Http\Controllers\Controller;
use App\Models\Page\PageGroup;
use App\Http\Requests\Page\PageGroupRequest;
use Illuminate\Http\Request;

class PageGroupController extends Controller
{

    public function __construct()
     {
         $this->pageTitle ='Page Group Management';
         $this->pageIcon  ='';
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PageGroupDataTable $pageGroupDataTable)
    {
        return $pageGroupDataTable->render('admin.page.group.index');
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
     * @param  \App\Models\Page\PageGroup  $pageGroup
     * @return \Illuminate\Http\Response
     */
    public function show(PageGroup $pageGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page\PageGroup  $pageGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(PageGroup $pageGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page\PageGroup  $pageGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageGroup $pageGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page\PageGroup  $pageGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageGroup $pageGroup)
    {
        //
    }
}
