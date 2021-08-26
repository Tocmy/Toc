<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\User\Social;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class SocialLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectTo()
    {
         $redirectTo  = request()->redirectTo;
         if ($redirectTo) {
            return $redirectTo;
         }else{
             return RouteServiceProvider::HOME;
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)
                         ->redirect();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
          $user = Socialite::driver($provider)->user();
          Auth::login($this->findOrCreateUser($provider, $user));
          return redirect()->intended();
    }

    protected function findonCreateUser($provider, $user)
    {
        $providerUser = User::where([
            'email'  => $user->getEmail()
        ])->first();
        if (!is_null($providerUser)) return $providerUser;

        return User::create([
            'email'      => $user->getEmail(),
            'name'       => $user->getName(),
            'provider'   => $provider,
            'provider_id'=> $user->getId(),
            'image'      => $user->getImage(),
            'email_verified_at' => now(),
        ]);
    }
}
