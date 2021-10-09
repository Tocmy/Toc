<?php

namespace App\Http\Controllers\Admin\Generals;

use App\DataTables\General\EmailDataTable;
use App\Http\Controllers\Controller;
use App\Models\General\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{

     protected $successResponse =[];
     protected $failResponse    =[];
     protected $response        =[];

     Public function __construct()
     {
           $this->successResponse =[
               'status'   => true,
               'message'  => __(':? send successfully.', ['?' => __('Email')])
           ];
           $this->failResponse = [
            'status'  => false,
            'message' => __(':? can not be sent, please check email configuration or try agian.', ['?' => __('Email')])
           ];

        $this->response = $this->successResponse;

     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmailDataTable $emailDataTable)
    {
        return $emailDataTable->render('admin.email.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendEmail()
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
     * @param  \App\Models\General\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\General\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\General\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\General\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        //
    }
}
