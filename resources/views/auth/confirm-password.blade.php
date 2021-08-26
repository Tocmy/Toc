@extends('layout.auth')
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
                        <h2 class="text-center mb-4">{{ __('Please enter your password.') }}</h2>

                        <!-- Password Confirm Form -->
                        {!! Form::open()->post()->route('auth.password.confirm') !!}
                        
                        {!! Form::text('password',__('Password'))->type('password')->required() !!}




                        {!! Form::submit(__('Confirm'))->primary() !!}








                        {!! Form::close() !!}
                        <!-- End Sign in Form -->
                    </div>
                    <!-- End Card Body -->
                </div>
                <!-- End Card -->
            </div>


        </div>
    </div>

</main>
@endsection
