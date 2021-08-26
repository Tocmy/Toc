<?php

namespace App\Rules;

use App\Models\User\User;
use Illuminate\Contracts\Validation\Rule;
use PragmaRX\Google2FALaravel\Google2FA;
use Illuminate\Support\Facades\Auth;

class TwoFactorCode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Google2FA $google2FA)
    {
        $this->google2FA =$google2FA;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
         $user = Auth::user() ?? User::firstWhere('id', session('@user_id'));
         return $this->google2FA->verifyKey($user->two_factor_secret, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The two-factor authentication code is invalid.';
    }
}
