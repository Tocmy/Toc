<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

class VerifyEmailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EmailVerificationRequest $request)
    {
          if ($request->user()->hasVerifiedEmail()) {
              return redirect()->intended(RouteServiceProvider::HOME. '?verified=1');
          }
          if ($request->user()->markEmailAsVerified()) {
              event(new Verified($request->user()));
          }
          return redirect()->intended(RouteServiceProvider::HOME .'?verified=1');

    }
}
