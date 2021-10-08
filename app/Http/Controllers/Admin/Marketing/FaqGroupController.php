<?php

namespace App\Http\Controllers\Admin\Marketings;

use App\DataTables\Faq\FaqGroupDataTable;
use App\Http\Controllers\Controller;
use App\Models\Marketing\FaqGroup;
use App\Http\Requests\Faq\FaqGroupRequest;
use Illuminate\Http\Request;

class FaqGroupController extends Controller
{

    public function __construct()
    {
         $this->pageTitle='Faq Group Management';
         $this->pageIcon ='';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FaqGroupDataTable $faqGroupDataTable)
    {
        return $faqGroupDataTable->render('admin.faq.group.index');
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
     * @param  \App\Models\Marketing\FaqGroup  $faqGroup
     * @return \Illuminate\Http\Response
     */
    public function show(FaqGroup $faqGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marketing\FaqGroup  $faqGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(FaqGroup $faqGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marketing\FaqGroup  $faqGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FaqGroup $faqGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marketing\FaqGroup  $faqGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaqGroup $faqGroup)
    {
        //
    }
}
