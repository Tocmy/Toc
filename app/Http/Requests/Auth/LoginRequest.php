<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = $this->method();
        if (null !== $this->get('_method', null)) {
            $method = $this->get('_method');
        }
        $this->offsetUnset('_method');
        switch ($method) {
            case 'DELETE':
                $this->rules = [];
                break;
            //index, create,edit, show
            case 'GET':
                $this->rules = [

                ];
                break;
            //store
            case 'POST':
                $this->rules = [

                    'email'         => 'required|string|email',
                    'password'      => 'required|string',

                ];
                break;
            //update
            case 'PUT':
                $this->rules = [

                ];
                break;
            //update
            case 'PATCH':
                $this->rules = [];
                break;

            default:
                // invalid request
                break;
        }

        return $this->rules;
    }

    public function messages()
    {
        return [

        ];
    }
    public function authenticate()
    {
         $this->ensureIsNotRateLimited();
         if(! Auth::attempt($this->only('email', 'password'), $this->filled('remember'))){
              RateLimiter::hit($this->throttleKey());

              throw ValidationException::withMessages([
                    'email' => __('auth.failed'),
              ]);
         }
         RateLimiter::clear($this->throttleKey());

    }

    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
              return;
        }

        event(new Lockout($this));
        $seconds = RateLimiter::availableIn($this->throttleKey());
        throw ValidationException::withMessages([
            'email'  => trans('auth.throttle',[
                'seconds' => $seconds,
                'minutes' => ceil($seconds /60),
            ]),
        ]);
    }

    public function throttleKey()
    {
        return Str::lower($this->input('email')). '|' .$this->ip();
    }

}
