<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function create()
    {
        return view('auth.forgot');
    }

    public function store(ForgotPasswordRequest $request)
    {
         $status = Password::sendResetLink(
             $request->only('email')
         );
         return $status == Password::RESET_LINK_SENT
                        ? back()->with('status', __($status))
                        : back()->withErrors(['email' => __($status)]);
    }
}
