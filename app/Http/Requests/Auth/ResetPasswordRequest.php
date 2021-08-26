<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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

                    'token'         => 'required',
                    'email'         => 'required|string|email|max:255|unique:users',
                    'password'      => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/ ',
                    

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

}
