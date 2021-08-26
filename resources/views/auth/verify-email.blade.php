@extends('layouts.auth')

@section('title')

@endsection
@section('page-header')

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"></div>
                </div>
                <div class="card-body">
                    {{ __('Thanks for signing up! Before getting started, please verify your email address by cliking
                           on the link we emailed to you? If you didn\'t received the email, we will gladly send you another. ') }}


                   <div class="row">
                       <div class="col-12 col-sm-8 mb-3">
                           {!! Form::open()->post()->route('auth.verification.send') !!}

                           <div class="text-centre">
                               {!! Form::submit(__('Resend Verification Email'))->attrs(['class' =>'btn btn-primary']) !!}
                           </div>

                           {!! Form::close() !!}

                       </div>
                   </div>
                   <div class="row">
                       <div class="col-12 col-sm-4 mb-3">
                           {!! Form::open()->post()->route('auth.logout') !!}
                            <div class="text-center">
                                {!! Form::submit(__('Logout'))->attrs(['class'=>'btn btn-danger']) !!}
                            </div>
                           {!! Form::close() !!}
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

