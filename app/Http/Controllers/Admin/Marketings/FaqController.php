<?php

namespace App\Http\Controllers\Admin\Marketings;

use App\DataTables\Marketing\FaqDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\FaqRequest;
use App\Models\Marketing\Faq;
use App\Models\Marketing\FaqGroup;
use Illuminate\Http\Request;



class FaqController extends Controller
{

    public function __construct()
    {
         $this->pageTitle='Faq Management';
         $this->pageIcon = '';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FaqDataTable $faqDataTable)
    {
       return $faqDataTable->render('admin.faq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faqgroup = FaqGroup::pluck('name', 'id')->preprend(__('Please Choose'), '');
        return view('admin.faq.create', compact('faqgroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $faqs = new Faq();
        $faqs ->faqgroup_id = $request->faqgroup;
        $faqs->question =$request->question;
        $faqs->answer   =$request->answer;
        $faqs->save();
        return redirect()->route('admin.faq.index')->with('success', __('Faq Success Created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marketing\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marketing\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $faqgroup = FaqGroup::pluck('name', 'id')->preprend(__('Please Choose'), '');
        $faqs     = Faq::findOrFail($faq);
        return view('admin.faq.edit', compact('faq','faqgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marketing\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, Faq $faq)
    {
          $faqs =Faq::findOrFail($faq);
          $faqs ->faqgroup_id = $request->faqgroup;
          $faqs->question =$request->question;
          $faqs->answer   =$request->answer;
          $faqs->save();
          return redirect()->route('admin.faq.index')->with('success', __('Faq Success Updated'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marketing\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faqs = Faq::findorFail($faq);
        $faqs->delete();
        return redirect()->route('admin.faq.index')->with('Success',__('Faq Success Deleted'));
    }

    public function status($id)
    {
        $faqs = Faq::findOrFail($id);
        if ($faqs->status == 1) {
            $faqs->status = 0;
        }else{
            $faqs->status = 1;
        }
        $faqs->save();
        return redirect()->back()->with('Success',__('Status Success Updated'));
    }

    public function updateStatus()
    {
        $faqs = Faq::findOrFail(request('id'));
        $faqs ->status = $faqs->status == 1? 0 : 1;
        $faqs->save();
    }
}
