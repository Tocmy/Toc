@extends('layouts.auth')
@section('title')

@endsection
@section('page-header')

@endsection
@section('content')
<main class="d-flex flex-column login-cover"  style="background-image: url(images/world.png);">
    <div class="container py-11 my-auto">
      <div class="row align-items-center">
        <div class="col-md-6 col-lg-5 offset-lg-3 mb-4 mb-md-0">
          <!-- Card -->
          <div class="card">
            <!-- Card Body -->
            <div class="card-body p-4 p-lg-7">
              <h2 class="text-center mb-4">{{ __('Reset Password') }}</h2>

              <!-- Sign in Form -->
              {!! Form::open()->post()->route('auth.password.update') !!}
              <input type="hidden" name="token" value="{{ $token }}">

              {!! Form::text('email', __('Email'))->placeholder('Your Email')->type('email')->required() !!}
                <!-- Email -->
              {!! Form::text('password', __('Password'))->placeholder(__('Enter Your Password'))->type('password')->required() !!}

                <!-- Password -->
              {!! Form::text('password_confirmed', __('Confirm Password'))->placeholder(__('Please Confirm Your Password'))->type('password')->required() !!}

                <div class="d-flex align-items-center justify-content-between my-4">

              {!! Form::submit(__('Reset Password'))->attrs(['class'=>'btn btn-block btn-wide btn-primary text-uppercase']) !!}








              </div>
              {!! Form::close() !!}
              <!-- End Sign in Form -->
              <div class="row mt-3">
                <div class="col-6 text-left">
                  <a href="{{ route('auth.register') }}" class="text-gray">
                    {{ __('Register') }}
                  </a>
                </div>
                <div class="col-6 text-right">
                  <a href="{{ route('auth.login') }}" class="text-gray">
                    {{ __('Sign In') }}
                  </a>
                </div>
              </div>
            </div>
            <!-- End Card Body -->
            <div class="card-footer">
              If you have any questions or concerns, we're here to help. Contact us via our Help Center.
            </div>
          </div>
          <!-- End Card -->
        </div>


      </div>
    </div>
</main>
@endsection

