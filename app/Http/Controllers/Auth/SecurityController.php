<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\Security;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use PragmaRX\Google2FAQRCode\Google2FA;


class SecurityController extends Controller
{

    public function show()
    {
          $user = Auth::user();
          $userTwoFactor =$user->Security;
          $google2fa_url = "";
          $secret_key ="";
          if ($userTwoFactor != null) {
              $google2fa =(new Google2FA());
              $google2fa_url = $google2fa->getQRCodeInline(
                  config('app.name'),
                  $user->email,
                  $userTwoFactor->two_factor_secret
              );
              $secret_key = $userTwoFactor->two_factor_secret;

          }
          $data =[
              'user'          =>$user,
              'secret'        =>$secret_key,
              'google2fa_url'  =>$google2fa_url,
          ];

          return view('auth.2fa')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function generateTwoFactorSecret()
    {
        $user = Auth::user();
        $google2fa = (new Google2FA());

        $security = Security::firstOrNew(['user_id' => $user->id]);
        $security -> user_id = $user->id;
        $security -> enable  = 0;
        $security -> two_factor_secret = $google2fa->generateSecretKey();
        $security -> save();
        return  redirect()->with('success', __('Secret key is generate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function enable(Request $request)
    {
        $user =Auth::user();
        $userTwoFactor =$user->Security;
        $google2fa =(new Google2FA());
        $secret = $request->input('secret');
        $valid = $google2fa->verifyKey($userTwoFactor->two_factor_secret, $secret);
        if ($valid) {
            $userTwoFactor->enable = 1;
            $userTwoFactor->save();
            return redirect()->with('success', __('2Fa is enable Successfully'));
        }else{
            return redirect()->with('error', __('Invalid verification Code, Please try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()
                  ->with('error', __('Your Password does not matches with your account password. Please try againt'));
        }

        $user =Auth::user();
        $userTwoFactor =$user->Security;
        $userTwoFactor->enable = 0;
        $userTwoFactor->save();
        return redirect()->with('success', __('Two Factor is now disable'));


    }

    public function verify2fa()
    {
        return redirect(URL()->previous());
    }
}
