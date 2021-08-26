@extends('layout.auth')
@section('title')

@endsection
@section('page-header')
<div class="container">
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <i class="mdi mdi-newspaper-variant-outline bg-blue"></i>
            <div class="d-inline">
              <h5>Register</h5>
              <span>
                lorem ipsum dolor sit amet, consectetur adipisicing elit
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{  }}"><i class="mdi mdi-home"></i></a>
              </li>
              <li class="breadcrumb-item">
                <a href="#">Register</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Layouts
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Register Account') }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        {{ __('If you already have an account with us, please login at the <a href="" class="link">login</a> page.') }}
                    </h6>
                </div>
                <div class="card-body">
                    {!! Form::open()->post()->route('auth.register')->errorBag('registerErrorBag') !!}
                    <legend>{{ __('Your Personal Details') }}</legend>
                     {!! Form::text('firstname', __('First Name'))->required() !!}
                     {!! Form::text('lastname', __('Last Name'))->required() !!}
                     {!! Form::email('email', __('Email'))->required() !!}
                     {!! Form::text('telephone', __('Telephone'))->required() !!}

                    <legend>{{ __('Your Password') }}</legend>
                    {!! Form::text('password', __('Password'))->type('password')->required() !!}
                    {!! Form::text('password_confirmation', __('Confirm Password'))->required() !!}


                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="term">
                                <label class="form-check-label" for="term">{{ __('I have read and agree to the <a href="{{ route('') }}" class="link">Privacy Policy</a> ') }}</label>
                             </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="float-right">
                                {!! Form::submit(__('Submit'))->primary() !!}

                             </div>
                        </div>

                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
