@extends('layouts.auth')

@section('title')

@endsection
@section('page-header')

@endsection
@section('content')
<main class="d-flex flex-column login-cover" style="background-image: url(images/world.png);" >
    <div class="container py-11 my-auto">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-5 offset-lg-1 mb-4 mb-md-0">
                <!-- Card -->
                <div class="card">
                    <!-- Card Body -->
                    <div class="card-body p-4 p-lg-7">
                        <h2 class="text-center mb-4">{{ __('Sign In') }}</h2>

                        <!-- Sign in Form -->
                        {!! Form::open()->post()->route('auth.login') !!}
                         <!-- Email -->
                        {!! Form::text('email', __('Your Email'))->type('email') !!}
                         <!-- Password -->
                        {!! Form::password('password', __('Enter your password')) !!}



                        <div class="d-flex align-items-center justify-content-between my-4">
                                <!-- Remember -->
                        {!! Form::checkbox('remember', __('Remember Me') ) !!}

                                <!-- End Remember -->

                         <a class="font-weight-semi-bold" href="#forgot" data-toggle="modal" data-target="#forgot" data-remote="forgot">{{ __('Forgot password?') }}</a>
                        </div>
                         {!! Form::submit(__('Sign Up'))->attrs(['class' => 'btn btn-block btn-wide btn-primary text-uppercase']) !!}


                            <!-- Divider with Text -->
                            <div class="spacer" style="margin-top: 20px;">
                                <div class="mask"></div>
                                <span ><i class="mdi  mdi-grease-pencil"></i></span>
                           </div>
                            <!-- End Divider with Text -->

                            <!-- Socialmedia Registration Buttons -->
                            <div class="row gutters-sm mb-4">
                                <div class="col-xs-12">
                                    <div class="social-link">
                                        <a href="#" class=" social-button social-facebook" aria-label="Facebook">
                                            <span >
                                              <i class="fab fa-facebook-f"></i>
                                            </span>
                                          </a>
                                          <a href="#" class=" social-button social-linkedin" aria-label="LinkedIn">
                                            <span >
                                              <i class="fab fa-linkedin-in"></i>
                                            </span>
                                          </a>
                                          <a href="#" class=" social-button social-snapchat" aria-label="SnapChat">
                                            <span >
                                              <i class="fab fa-snapchat-ghost"></i>
                                            </span>
                                          </a>
                                          <a href="#" class=" social-button social-github" aria-label="GitHub">
                                            <span >
                                              <i class="fab fa-github"></i>
                                            </span>
                                          </a>
                                          <a href="#" class=" social-button social-codepen" aria-label="CodePen">
                                            <span >
                                              <i class="fab fa-codepen"></i>
                                            </span>
                                          </a>
                                     </div>
                                    <div class="social-buttons ">

                                    </div>
                                </div>




                            </div>
                            <!-- End Socialmedia Registration Buttons -->

                            <p class="text-center mb-0">
                                {{ __('Don’t have an account?') }}
                                <a class="font-weight-semi-bold" href="{{ route('auth.register') }}">{{ __('Sign up here') }}</a>
                            </p>
                        {!! Form::close() !!}
                        <!-- End Sign in Form -->
                    </div>
                    <!-- End Card Body -->
                </div>
                <!-- End Card -->
            </div>

            <div class="col-md-6 col-lg-5 offset-lg-1 d-none d-sm-block ">
                <h4 >Improve your business<br class="d-none d-md-block"> cards and&nbsp;enhance your&nbsp;sales</h4>
                <p class="font-weight-semi-bold text-primary mb-5">More then 30.000 clients</p>
               <div class="pic-outer">

               <div class="pic-inner">
              <img src="images/user/user2-160x160.jpg" alt="">
             </div>

              </div>
            </div>
        </div>
    </div>

</main>
@endsection

@include('auth.forgot')
