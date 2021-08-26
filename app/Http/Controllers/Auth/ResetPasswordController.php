<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.reset',['request' => $request]);
    }

    public function store(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation','token'),
            function ($user) use ($request){
                $user->forceFill([
                    'password'        =>Hash::make($request->password),
                    'remember_token'  =>Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );
        return $status == Password::PASSWORD_RESET
                       ? redirect()->route('login')->with('status', __($status))
                       : back()->withInput($request->only('email'))
                               ->withErrors(['email' => __($status)]);

    }
}
